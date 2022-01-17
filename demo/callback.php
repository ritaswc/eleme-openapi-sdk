<?php

use ElemeOpenApi\Config\Config;
use ElemeOpenApi\OAuth\OAuthClient;
use ElemeOpenApi\Api\UserService;

define("BASE_DIR", dirname(__FILE__) . "/");
require BASE_DIR . "util.php";
require BASE_DIR . "init.php";
require ROOT_DIR . "vendor/autoload.php";

$content = file_get_contents("php://input");

$code = $_GET["code"];
$error = $_GET["error"];

//判断错误的情形
if ($error != null) {
    $content = load_page("index.html");
    echo $content;
    return;
}

if ($code == null) {
    $content = load_page("index.html");
    echo $content;
    return;
}

$client = new OAuthClient($config);

try {
    $token = $client->get_token_by_code($code, $callback_url);
} catch (Exception $e) {
    header('location: callback.php?error=get token error&error_description=get token error');
    return;
}

//记录关系

try {
    $user_service = new UserService($token, $config);
    $user = $user_service->get_user();

    add_relation($user->userId, $token);
} catch (Exception $e) {
    header('location: callback.php?error=get user info error&error_description=get user info error');
    return;
}

//输出页面信息

$shop_name = "";
foreach ($user->authorizedShops as $shop) {
    $shop_name .= $shop->name . " ";
}

$content = load_page("index.html");
$content = str_replace("{{ userId }}", $user->userId, $content);
$content = str_replace("{{ shopName }}", $shop_name, $content);
echo $content;
