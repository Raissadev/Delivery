<?php
   session_start();

    require('MySql.php');
    require('config.php');

    require('deliveryController.php');
    require('deliveryModel.php');


    $deliveryController = new deliveryController();

    $deliveryController->index();

?>