<?php
require './vendor/autoload.php';
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
    'facebook' => [
        'token' => 'EAAWzMyERZAhUBAFSZCwRO1HWxuc0r4ImBZAFkvPcvymIZAlv8XYxove0rOZCpSseNZCn2ZAAkFvl9a4mYhCPlG0ml9kkG0Vx3ZCrfVrBwBaYnx2fKIq8FaCKEa5YcxiiOpptBUU3GZCLfpkeYGtEQzhfgiQnbsK0PfNRByZBE8KpdFHgZDZD',
        'app_secret' => 'ed899bfb7c041ce2bb66226eea515cc4',
        'verification'=>'123',
    ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Hello yourself.');
});

// Start listening
$botman->listen();