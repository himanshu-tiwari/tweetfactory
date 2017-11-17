<?php

	// requiring and loading TwitterOAuth 
	require "vendor/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	// defining OAuth variables before making connection
	$consumer_key = "jy9LDSiVoSiIuWItD58iW0CcY"; 
	$consumer_secret = "CsiGzqAZAHSZdDvfb9PADW1bapGHAtQgVqdsO948E5bDrpZqNY"; 
	$access_token = "3286571658-FWXErLjqIg1V2YPx4ECGE7YMnIuEDB2x4n1hh80"; 
	$access_token_secret = "2Imt74aq9Hwok5aRt07z9zrynzRYSoyjRlOG9PfyKBs8g";

	// connecting to twitter
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
	$content = $connection->get("account/verify_credentials");

	$verb = $_SERVER['REQUEST_METHOD'];

	if ($verb == 'GET') {
		// GET request for tweets
		$statuses = $connection->get("statuses/user_timeline", ["count" => 10, "exclude_replies" => true, "screen_name" => "realDonaldTrump", "tweet_mode" => "extended"]);
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