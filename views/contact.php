<?php

use jhuta\phpmvccore\form\Form;
use jhuta\phpmvccore\form\TextareaField;

/** @var $this \jhuta\phpmvccore\View; */
/** @var $model \app\models\ContactForm */


$this->title = 'Contact'; ?>
<h1>Contact</h1>

<div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Contact</h3>
        <p class="mt-1 text-sm text-gray-600">xxxxxxx.</p>
      </div>
    </div>
    <div class="mt-5 md:col-span-2 md:mt-0">

      <?php $form = Form::begin('/contact', 'post') ?>
      <div class="shadow sm:overflow-hidden sm:rounded-md">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
          <?= $form->field($model, 'subject'); ?>
          <?= $form->field($model, 'email'); ?>
          <?= new TextareaField($model, 'body'); ?>
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
          <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Send</button>
        </div>
      </div>
      <?php Form::end() ?>
    </div>
  </div>
</div>
