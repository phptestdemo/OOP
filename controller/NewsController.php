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

    public function insertComment()
    {
        $news = new Category;
        if (isset($_POST['btnCmt'])) {
            $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
            $idTin = isset($_POST['id_tin']) ? trim($_POST['id_tin']) : '';
            $content = isset($_POST['comment']) ? trim($_POST['comment']) : '';
            if (!empty($idUser)) {
                $comment = $news->addComment($idUser, $idTin, $content);
                // var_dump($comment); die();
            } else {
                $_SESSION['err_cmt'] = "Vui lòng đăng nhập để bình luận!";
            }
            header('Location:'.$_SERVER['HTTP_REFERER']);
        }
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
    case 'comment':
        return $new->insertComment();
        break;
    default:
        return $new->index();
        break;
}
