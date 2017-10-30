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

    public function getLoaiTin()
    {
    	$idLoaiTin = isset($_GET['id']) ? trim($_GET['id']) : '';
    	$currentPage = isset($_GET['page']) ? trim($_GET['page']) : 1;
    	$category = new Category;
		$categories = $category->getCategory();

		$news = $category->getNewsByIdLoai($idLoaiTin);

        $loaitin = $category->getCategoryById($idLoaiTin);
        $title = $loaitin->Ten;

        $pagination = new pagination(count($news), $currentPage);
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->_nItemOnPage;
        $vitri = ($currentPage - 1) * $limit;

        $news = $category->getNewsByIdLoai($idLoaiTin, $vitri, $limit);
    	require_once 'view/home/loaitin_view.php';
    }

    function log($data = array())
    {
        echo '<pre/>';
        print_r($data);
        die();
    }

}


$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
$new = new News;

switch ($method) {
	case 'index':
		return $new->index();
		break;
	case 'loaitin':
		return $new->getLoaiTin();
		break;
	
	default:
		return $new->index();
		break;
}
