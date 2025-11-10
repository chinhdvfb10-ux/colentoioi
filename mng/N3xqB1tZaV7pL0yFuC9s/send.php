<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $botToken = "7940907522:AAFUFUOgQqddEIlGVXvJj-PEt4jfRCGi8yQ";
$chatId = "-1002723957058";
$text = $_POST['text'] ?? '';

$url = "https://api.telegram.org/bot$botToken/sendMessage";

$data = [
    "chat_id" => $chatId,
    "text" => $text,
    "parse_mode" => "Markdown"
];

$options = [
    "http" => [
        "header"  => "Content-Type: application/x-www-form-urlencoded\r\n",
        "method"  => "POST",
        "content" => http_build_query($data)
    ]
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;
    echo "OK";
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
