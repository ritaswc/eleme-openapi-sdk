<?php

use ElemeOpenApi\Config\Config;

define("BASE_DIR", dirname(__FILE__) . "/");
define("ROOT_DIR", dirname(__FILE__) . "/../");
require BASE_DIR . "../vendor/autoload.php";
require ROOT_DIR . "vendor/autoload.php";

//此处需要填写对应的参数
$app_key = "";
$app_secret = "";
$sandbox = true;

$scope = "all";
$callback_url = "";


$config = new Config($app_key, $app_secret, $sandbox);