<?php

/** @var $this \jhuta\phpmvccore\View; */
$this->title = 'Error'; ?>
<?php

/** @var $exception \Exception */ ?>
<h3><?= $exception->getCode() . ' ' . $exception->getMessage(); ?></h3>