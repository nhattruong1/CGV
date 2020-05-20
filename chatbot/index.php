<?php
require './vendor/autoload.php';
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Facebook\FacebookDriver;

$config = [
    'facebook' => [
        'token' => 'EAAWzMyERZAhUBAFSZCwRO1HWxuc0r4ImBZAFkvPcvymIZAlv8XYxove0rOZCpSseNZCn2ZAAkFvl9a4mYhCPlG0ml9kkG0Vx3ZCrfVrBwBaYnx2fKIq8FaCKEa5YcxiiOpptBUU3GZCLfpkeYGtEQzhfgiQnbsK0PfNRByZBE8KpdFHgZDZD',
        'app_secret' => 'ed899bfb7c041ce2bb66226eea515cc4',
        'verification'=>'123',
    ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(FacebookDriver::class);

// Create an instance
$botMan = BotManFactory::create($config);

// Give the bot something to listen for.
$botMan->hears('xin chào', function (BotMan $bot) {
    $bot->reply('Xin chào, nếu bạn muốn xem danh sách phim đang chiếu vui lòng nhắn "Lịch chiếu Phim"');
});
$botMan->hears('Lịch chiếu Phim', function (BotMan $bot) {
    $a = 'Chưa có gì đâu bro';
    $bot->reply($a);
});
// Start listening
$botMan->listen();