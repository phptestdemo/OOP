<?php

/**
 * summary
 */
class News
{
    /**
     * summary
     */
    // public function __construct()
    // {
    // 	require_once 'model/slide.php';
    // 	$slide = new Slide;
    // 	echo "<pre>";
    // 	print_r($slide->getSlide());
    // 	die();
    // }

    public function index()
    {
    	
    	require_once 'view/home/index_view.php';
    }

}


$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
$new = new News;

switch ($method) {
	case 'index':
		return $new->index();
		break;
	
	default:
		return $new->index();
		break;
}
