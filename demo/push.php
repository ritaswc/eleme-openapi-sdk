<?php

use ElemeOpenApi\Api\OrderService;
use ElemeOpenApi\Config\Config;

define("BASE_DIR", dirname(__FILE__) . "/");
require BASE_DIR . "init.php";
require BASE_DIR . "util.php";
require ROOT_DIR . "vendor/autoload.php";

$content = file_get_contents("php://input");

$response = array("message" => "ok");
if ($content == null) {
    echo json_encode($response);
    return;
}

//转换message
$message = convert_to_message($content);

//校验签名
$result = check_signature($message, $config->get_app_secret());
if ($result == false) {
    throw new Exception("invalid signature");
}

echo json_encode($response);

//接单操作
if ($message["type"] == 10) {
    //获取已经存储的token
    $userId = $message["userId"];
    $token = get_token_by_user_id($userId);
    if ($token == null)
        throw new Exception("获取token错误");

    $order_service = new OrderService($token);
    $order = json_decode($message["message"]);
    $order_service->confirm_order($order->id);
}


