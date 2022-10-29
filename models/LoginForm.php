<?php

namespace app\models;

use jhuta\phpmvccore\Application;
use jhuta\phpmvccore\Model;

class LoginForm extends Model {
  public string $email    = '';
  public string $password = '';

  public function rules(): array {
    return [
      'email'     => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password'  => [self::RULE_REQUIRED],
    ];
  }

  public function login() {
    $user = User::findOne(['email' => $this->email]);
    // var_dump(password_hash('jack2525', PASSWORD_DEFAULT));
    // var_dump($user);
    // exit;
    if (!$user) {
      $this->addError('email', 'User does not exist with this email');
      return false;
    }
    if (!password_verify($this->password, $user->password)) {
      $this->addError('password', 'Password is incorrect');
      return false;
    }
    return Application::$app->login($user);
  }

  public function labels(): array {
    return [
      'email'    => 'Your email',
      'password' => 'Password',
    ];
  }
}
