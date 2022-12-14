<?php

namespace app\controllers;

use app\models\ContactForm;
use jhuta\phpmvccore\Application;
use jhuta\phpmvccore\Controller;
use jhuta\phpmvccore\Request;
use jhuta\phpmvccore\Response;

class SiteController extends Controller {
  public function home() {

    $params = [
      'name' => 'JACKo',
    ];
    return $this->render('home', $params);
  }

  public function contact(Request $request, Response $response) {
    $contact = new ContactForm();
    if ($request->isPost()) {
      $contact->loadData($request->getBody());
      if ($contact->validate() && $contact->send()) {
        Application::$app->session->setFlash('success', 'Thanks for contacting us');
        return $response->redirect('/contact');
      }
    }
    return $this->render('contact', [
      'model' => $contact
    ]);
  }
}
