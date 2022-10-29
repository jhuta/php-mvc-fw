<?php

namespace app\models;

use jhuta\phpmvccore\UserModel;

class User extends UserModel {
  const STATUS_INACTIVE = 0;
  const STATUS_ACTIVE   = 1;
  const STATUS_DELETED  = 2;

  public string $first_name = '';
  public string $last_name  = '';
  public string $email      = '';
  public int $status        = self::STATUS_INACTIVE;
  public string $password   = '';
  public string $confirm_password = '';

  public static function tableName(): string {
    return 'users';
  }

  // public function primaryKey(): string {
  //   return 'id';
  // }

  public function attributes(): array {
    return ['firstname', 'lastname', 'email', 'password'];
  }

  public function labels(): array {
    return [
      'first_name'      => 'First Name',
      'last_name'       => 'Last Name',
      'email'           => 'Email',
      'password'        => 'Password',
      'confirm_password' => 'Confirm Password',

    ];
  }

  public function rules(): array {
    return [
      'first_name' => [self::RULE_REQUIRED],
      'last_name'  => [self::RULE_REQUIRED],
      'email'      => [
        self::RULE_REQUIRED, self::RULE_EMAIL,
        [self::RULE_UNIQUE, 'class' => self::class] //, 'attribute' => 'email'
      ],
      'password'   => [
        self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]
      ],
      'confirm_password'  => [
        self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']
      ],
    ];
  }

  public function save() {
    $this->status   = self::STATUS_INACTIVE;
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    return parent::save();
  }

  public function getDisplayName(): string {
    return "{$this->first_name} {$this->last_name}";
  }
}