<?php

	// requiring and loading TwitterOAuth and validator
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;
	use Respect\Validation\Validator as v;

	// defining OAuth variables before making connection
	$consumer_key = "CJ66vrGb2w8ujtn6Fu9WFJPIb"; 
	$consumer_secret = "8fQe7qTb24EJkNR1t6bcA4ucynaQQLT76ISNG1yeJ7i10qEGGW"; 
	$access_token = "3286571658-FWXErLjqIg1V2YPx4ECGE7YMnIuEDB2x4n1hh80"; 
	$access_token_secret = "2Imt74aq9Hwok5aRt07z9zrynzRYSoyjRlOG9PfyKBs8g";
	
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
		// var_dump($statuses[0]->entities->user_mentions[1]->name);

		// getting db configurations
		require "env/config.php";

		$sql = "";
		$id = 1;
		$array['text'] = [];		
		
		foreach ($statuses as $status) {
			// echo $status->entities->user_mentions[1]->name;
			$text = $status->full_text;
			
			array_push($array['text'], $text);
			// echo $text . "<br>";

			while (strpos($text, "'") || strpos($text, "\"")) {
				$text = str_replace("'", "`", $text);
				$text = str_replace("\"", "``", $text);
			}

			$sql .= "UPDATE `tweets` SET `text`='".$text."' WHERE `id`=".$id.";";
			$id +=1;
		}

		// echo 'sql: '.$sql;
		// var_dump($array);
		$array['name'] = [];
		array_push($array['name'], $statuses = $connection->get("users/show", ["screen_name" => $screenName])->name);
		echo json_encode($array);

		if ($conn->multi_query($sql) !== TRUE) {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

?>