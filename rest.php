<?php

	// requiring and loading TwitterOAuth and validator
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;
	use Respect\Validation\Validator as v;

	// defining OAuth variables before making connection
	$consumer_key = ""; 
	$consumer_secret = ""; 
	$access_token = ""; 
	$access_token_secret = "";
	
	// connecting to twitter
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
	$content = $connection->get("account/verify_credentials");

	$verb = $_SERVER['REQUEST_METHOD'];

	// creating validator
	$validator = v::optional(v::alnum('-')->noWhitespace()->length(1, 15));

	if ($verb == 'GET') {
		if (isset($_GET['screen_name'])) {
			$validator->validate($_GET['screen_name']);
			$screenName = $_GET['screen_name'];

			if ($_GET['screen_name']=="") {
				$screenName = "realDonaldTrump";
			}
		}else{
			$screenName = "realDonaldTrump";
		}

		// GET request for tweets
		$statuses = $connection->get("statuses/user_timeline", ["count" => 10, "exclude_replies" => true, "screen_name" => $screenName, "tweet_mode" => "extended"]);
		// var_dump($statuses[4]);

		// getting db configurations
		require "env/config.php";

		$sql = "";
		$id = 1;
		$array = [];
		
		foreach ($statuses as $status) {
			$text = $status->full_text;
			
			array_push($array, $text);
			// echo $text . "<br>";

			while (strpos($text, "'") || strpos($text, "\"")) {
				$text = str_replace("'", "`", $text);
				$text = str_replace("\"", "``", $text);
			}

			$sql .= "UPDATE `tweets` SET `text`='".$text."' WHERE `id`=".$id.";";
			$id +=1;
		}

		// echo 'sql: '.$sql;

		echo json_encode($array);

		if ($conn->multi_query($sql) !== TRUE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

?>