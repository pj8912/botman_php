<?php
  require_once 'vendor/autoload.php';

  use BotMan\BotMan\BotMan;
  use BotMan\BotMan\BotManFactory;
  use BotMan\BotMan\Drivers\DriverManager;

  $config = [
    'facebook' => [
      'token' => '***********************************************************************************************************',
      'app_secret' => '*************************',
      'verification'=>'*****',
    ]
 ];


  // DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
  DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

  $botman = BotManFactory::create($config);

 // Give the bot something to listen for.
$botman->hears('Hello', function (BotMan $bot) {
   $bot->reply('Hello too');
});
$botman->hears('who are you?| what is your name?', function (BotMan $bot) {
   $bot->reply('I am Morpheous');
   $bot->reply('My Master JOHN PINTO created me');

});

$botman->hears('I am {name}', function($bot, $name){
  $bot->reply('Hello'.$name);
  $bot->reply('your brother is a genius!!!');
});
$botman->hears('ha ha', function (BotMan $bot) {
   $bot->reply('what\'s funny?');

});
$botman->hears('hmmm..| oohh', function (BotMan $bot) {
   $bot->reply('what?');
   $bot->reply('anything wrong?');

});

$botman->fallback(function($bot) {
   $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

// Start listening
$botman->listen();
