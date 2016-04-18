<?php

define ('PARSE_SDK_DIR', '../parse/src/Parse/');
require_once ('../parse/autoload.php');

session_start();

use Parse\ParseClient;

$app_id = 'iXEz7UeeOPe9Zw29O87RXvm7yVhq5Cef9tsIVwx4';
$rest_key = 'UJW7BoAhqxqg7zGbD4FnvVpkMxLNLWvmrsRrsupZ';
$master_key ='NgQXTNymW0rXvo7oS73VKp9IHCP58OjUCy2uFmIy';

ParseClient::initialize($app_id, $rest_key, $master_key);