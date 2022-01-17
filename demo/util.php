<?php


function add_relation($user_id, $token)
{
    $map = read_data();
    $map[$user_id] = $token;
    write_data(json_encode($map));
}

function get_token_by_user_id($user_id)
{
    $map = read_data();
    if ($map[$user_id] == null)
        return null;
    return (Object)($map[$user_id]);
}


function read_data()
{
    $file_name = "token_relation.txt";
    $path = BASE_DIR . $file_name;
    if (!file_exists($path)) {
        throw new Exception("open " . $file_name . " error");
    }
    $file_content = file_get_contents($path);
    $map = json_decode($file_content, true);
    return $map;
}

function write_data($content)
{
    $file_name = "token_relation.txt";
    $path = BASE_DIR . $file_name;
    $file = fopen($path, "w");
    fwrite($file, $content);
    fclose($file);
}

function load_page($file_name)
{
    $file_name = "page/" . $file_name;
    $path = BASE_DIR . $file_name;
    if (!file_exists($path)) {
        throw new Exception("open " . $file_name . " error");
    }
    $file_content = file_get_contents($path);
    return $file_content;
}

function create_uuid()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}


function convert_to_message($content)
{
    try {
        $message = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);
    } catch (Exception $e) {
        throw new Exception("convert content to message error.");
    }
    return $message;
}

function check_signature($message, $secret)
{
    $params = $message;
    $signature = $message["signature"];
    unset($params["signature"]);
    if ($signature != get_signature($params, $secret)) {
        return false;
    }
    return true;
}

function get_signature(array $param, $secret)
{
    ksort($param);
    $string = "";
    foreach ($param as $key => $value) {
        $string .= $key . "=" . $value;
    }
    $splice = $string . $secret;
    $md5 = strtoupper(md5($splice));
    return $md5;
}

