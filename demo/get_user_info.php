<?php

use ElemeOpenApi\OAuth\OAuthClient;
use ElemeOpenApi\Api\UserService;

define("BASE_DIR", dirname(__FILE__) . "/");
require BASE_DIR . "util.php";
require BASE_DIR . "entity/Response.php";
require BASE_DIR . "init.php";
require ROOT_DIR . "vendor/autoload.php";

$content = json_decode(file_get_contents("php://input"), true);

$user_id = $content["userId"];
$shop_id = $content["shopId"];

//查找有没有token记录
$token = get_token_by_user_id($user_id);

//无token记录，返回授权链接
if ($token == null) {
    $client = new OAuthClient($config);

    $response = new Response();
    $response->result = array("userId" => null, "OAuthUrl" => $client->get_auth_url(create_uuid(), $scope, $callback_url), "shopName" => null);

    echo json_encode($response);
    return;
}

//有token记录，返回商户信息
try {
    $user_service = new UserService($token, $config);
    $user = $user_service->get_user();
} catch (Exception $e) {
    $response = new Response();
    $response->error = "get user info error";

    echo json_encode($response);
    return;
}

$shop_name = "";
foreach ($user->authorizedShops as $shop) {
    if ($shop->id == $shop_id) {
        $shop_name = $shop->name;
    }
}

$response = new Response();
$response->result = array("userId" => $user->userId, "OAuthUrl" => null, "shopName" => $shop_name);
echo json_encode($response);
return;
