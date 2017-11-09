<?php

/**
 * summary
 */
class News
{
    /**
     * summary
     */

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

    public function searchNews()
    {
        $idLoaiTin = isset($_GET['id']) ? trim($_GET['id']) : '';
        $currentPage = isset($_GET['page']) ? trim($_GET['page']) : 1;
        $keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
        $category = new Category;
        $categories = $category->getCategory();
        $new = $category->getNewsByKeyword($keyword);
        $pagination = new pagination(count($new), $currentPage);
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->_nItemOnPage;
        $vitri = ($currentPage - 1) * $limit;
        $news = $category->getNewsByKeyword($keyword, $vitri, $limit);

?>
            <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm thấy <?=count($news)?> cho <i style="color: red"><?=$keyword?></i></b></h4>
                    </div>

                    <?php foreach ($news as $value): ?>
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$value->Hinh?>" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3><a href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>"><?=$value->TieuDe?></a></h3>
                                <p><?=$value->TomTat?></p>
                                <a class="btn btn-primary" href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                    <?php endforeach ?>

                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <?=$paginationHTML?>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
<?php
            
        
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
    case 'search':
        return $new->searchNews();
        break;
    default:
        return $new->index();
        break;
}
