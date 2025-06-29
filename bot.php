<?php

$botToken = '7180628582:AAGo33ATvzM955cdPc9Ym_m_P26kDNC_KbE'; // o'zingizning bot tokeningizni shu yerga yozing
$chatId = '7386764583';     // qaysi chatga yuborilsin — o'z chat ID'ingiz
$message = '❤️'; // yuboriladigan xabar
$repeatCount = 1000; // Necha marta yuborishni istaysiz

for ($i = 0; $i < $repeatCount; $i++) {
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

    $options = [
        "http" => [
            "method"  => "POST",
            "header"  => "Content-Type:application/x-www-form-urlencoded",
            "content" => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Javobni tekshirish (ixtiyoriy)
    if ($result === FALSE) {
        echo "Xatolik yuz berdi: $i\n";
    } else {
        echo "Yuborildi: $i\n";
    }

    usleep(500000); // 0.5 soniya kutish (Telegram cheklovlariga tushmaslik uchun)
}

?>