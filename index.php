<?php 
$token = "1753602376:AAGBywF5TJBBKcQdLMd9Ymhoh0B2JmmYaHI";
$link1 = "https://api.telegram.org/bot".$token;

$updates = file_get_contents('php://input');
$updates = json_decode($updates, TRUE);

$msgID = $updates['message']['chat']['id'];
$name = $updates['message']['chat']['first_name'];
$text = $updates['message']['text'];

switch ($text) {
	case"start":
		sendmsg($msgID, "Welcome $name");
		break;
	case"love you":
	sendmsg($msgID, "Love You Too...");
	sendmsg($msgID, "\xF0\x9F\x98\x98");
	break;
	
}
function sendmsg($msgID, $text)
{
	$url = $GLOBALS[link1].'/sendMessage?chat_id='.$msgID.'&text='.urlencode($text);
	file_get_contents($url);
}
?>