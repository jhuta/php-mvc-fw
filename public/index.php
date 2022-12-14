<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use jhuta\phpmvccore\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
  'userClass' => \app\models\User::class,
  'db' => [
    'dsn'      => $_ENV['DB_DSN'],
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
  ],
];
$app = new Application(dirname(__DIR__), $config);
$app->on(Application::EVENT_BEFORE_REQUEST, function () {
  echo 'before request';
});

// Home
$app->router->get('/', [SiteController::class, 'home']);
// ...
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);
// Auth
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);

$app->run();


/*
  for view
  $app->router->get('/', 'home');
  for controller
  $app->router->get('/', [Controller::class, 'method']);
  for inside router
  $app->router->post('/contact', function () {
    return 'handling submitted data';
  });
*/
