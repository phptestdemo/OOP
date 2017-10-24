<?php

/**
 * @Author: Quang Duc Chung
 * @Date:   2017-10-23 10:25:32
 * @Last Modified by:   chungqd
 * @Last Modified time: 2017-10-24 11:18:32
 */
session_start();

$cn = isset($_GET['cn']) ? trim($_GET['cn']) : 'index';
include 'model/database.php';
require_once 'model/slide.php';
require_once 'model/Category.php';

$slide = new Slide;
$slides = $slide->getSlide();


// echo "<pre/>";
// print_r($categories);
// die();

require_once 'view/layout/header.php';
require_once 'view/layout/slide.php';

switch ($cn) {
	case 'index':
		require_once 'controller/NewsController.php';
		break;
	
	default:
		// code...
		break;
}


require_once 'view/layout/footer.php';