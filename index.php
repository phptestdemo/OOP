<?php

/**
 * @Author: Quang Duc Chung
 * @Date:   2017-10-23 10:25:32
 * @Last Modified by:   chungqd
 * @Last Modified time: 2017-11-08 11:52:02
 */
session_start();
$cn = isset($_GET['cn']) ? trim($_GET['cn']) : 'index';
include 'model/database.php';
include 'model/pager.php';
require_once 'model/slide.php';
require_once 'model/Category.php';

$slide = new Slide;
$slides = $slide->getSlide();


// echo "<pre/>";
// print_r($categories);
// die();

require_once 'view/layout/header.php';
if ($cn == 'index') {
    require_once 'view/layout/slide.php';
}

switch ($cn) {
    case 'index':
        require_once 'controller/NewsController.php';
        break;
    case 'loaitin':
        require_once 'controller/NewsController.php';
        break;
    case 'detail':
        require_once 'controller/NewsController.php';
        break;
    case 'signup':
        require_once 'controller/UserController.php';
        break;
    case 'signin':
        require_once 'controller/UserController.php';
        break;
    case 'logout':
        require_once 'controller/UserController.php';
        break;
    case 'comment':
        require_once 'controller/NewsController.php';
        break;
}


require_once 'view/layout/footer.php';