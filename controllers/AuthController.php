<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use jhuta\phpmvccore\Application;
use jhuta\phpmvccore\Controller;
use jhuta\phpmvccore\Middlewares\AuthMiddleware;
use jhuta\phpmvccore\Request;
use jhuta\phpmvccore\Response;

class AuthController extends Controller {

  public function __construct() {
    $this->registerMiddleware(new AuthMiddleware(['profile']));
  }

  public function login(Request $request, Response $response) {
    $loginForm = new LoginForm();
    if ($request->isPost()) {
      $loginForm->loadData($request->getBody());
      if ($loginForm->validate() && $loginForm->login()) {
        return $response->redirect('/');
      }
    }
    $this->setLayout('auth');
    return $this->render('auth/login', [
      'model' => $loginForm,
    ]);
  }

  public function register(Request $request) {
    $user = new User();
    if ($request->isPost()) {
      $user->loadData($request->getBody());
      if ($user->validate() && $user->save()) {
        Application::$app->session->setFlash('success', 'Thanks for registering');
        Application::$app->response->redirect('/');
      }
    }
    $this->setLayout('auth');
    return $this->render('auth/register', [
      'model' => $user,
    ]);
  }

  public function logout(Request $request, Response $response) {
    Application::$app->logout();
    $response->redirect('/');
  }

  public function profile() {
    // Application::$app->router-
    return $this->render('profile');
  }
}
