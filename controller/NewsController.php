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
    	
    // }

    public function index()
    {
    	$category = new Category;
		$categories = $category->getCategory();
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
