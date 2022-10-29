<?php

use jhuta\phpmvccore\Application;

?>
<!-- flash -->
<?php if (Application::$app->session->getFlash('success')) : ?>
<?php echo Application::$app->session->getFlash('success'); ?>
<?php endif; ?>
<!-- /flash -->