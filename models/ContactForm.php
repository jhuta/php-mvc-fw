<?php

namespace app\models;

use jhuta\phpmvccore\Application;
use jhuta\phpmvccore\Model;

class ContactForm extends Model {
  public string $subject  = '';
  public string $email    = '';
  public string $body     = '';

  public function rules(): array {
    return [
      'subject' => [self::RULE_REQUIRED],
      'email'   => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'body'    => [self::RULE_REQUIRED],
    ];
  }


  public function labels(): array {
    return [
      'subject' => 'Subject',
      'email'   => 'Your email',
      'body'    => 'Body',
    ];
  }

  public function send() {
    return true;
  }

  // public function login() {
  //   $user = User::findOne(['email' => $this->email]);
  //   var_dump($user);
  //   exit;
  //   if (!$user) {
  //     $this->addError('email', 'User does not exist with this email');
  //     return false;
  //   }
  //   if (!password_verify($this->password, $user->password)) {
  //     $this->addError('password', 'Password is incorrect');
  //     return false;
  //   }
  //   return Application::$app->login($user);
  // }
}
