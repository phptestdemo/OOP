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

        $title = $category->getCategoryById($idLoaiTin);

        $pagination = new pagination(count($news), $currentPage);
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->_nItemOnPage;
        $vitri = ($currentPage - 1) * $limit;
        $news = $category->getNewsByIdLoai($idLoaiTin, $vitri, $limit);
        require_once 'view/home/loaitin_view.php';
    }

    public function getDetailNews()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $news = new Category();
        $tinTuc = $news->getNewsDetail($id);
        $comments = $news->getComments($id);
        $newsRelated = $news->getNewsRelated($tinTuc->idLoaiTin, $id);
        $newsHot = $news->getNewsHot();
        require_once 'view/home/detail_view.php'; 
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
    case 'detail':
        return $new->getDetailNews();
        break;
    default:
        return $new->index();
        break;
}
