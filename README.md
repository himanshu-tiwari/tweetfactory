# tweetfactory

A collection of the latest tweets of the one and only President Trump.

For setting up the project, import the db using the factory.sql file and alter the configuration details in the config file:
$server = "127.0.0.1";
$username = "root";
$password = "";
$db = "factory";

Along with the following details of your twitter account, in the rest.php file:
$consumer_key = ""; 
$consumer_secret = ""; 
$access_token = ""; 
$access_token_secret = "";

The project uses twitteroauth library (https://github.com/abraham/twitteroauth) and composer.

No frontend or backend framework has been used due to the small size of the project. The UI/UX can of course be improved.

The tweets can be refreshed without reloading the page.

Have fun reading!

A few screenshots:

![Alt text](assets/screenshots/1.PNG?raw=true "Optional Title")

![Alt text](assets/screenshots/2.PNG?raw=true "Optional Title")

![Alt text](assets/screenshots/3.PNG?raw=true "Optional Title")

![Alt text](assets/screenshots/4.PNG?raw=true "Optional Title")