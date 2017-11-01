<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-9">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?=$tinTuc->TieuDe?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">Start Bootstrap</a>
        </p>

        <!-- Preview Image -->
        <img class="img-responsive" src="public/image/tintuc/<?=$tinTuc ->Hinh?>" alt="">

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$tinTuc->created_at?></p>
        <hr>

        <!-- Post Content -->
        <p class="lead"><?=$tinTuc->TomTat?></p>
        <p><?=$tinTuc->NoiDung?></p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->
        <!-- Comment -->
        <?php foreach ($comments as $cmt): ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?=$cmt->name?>
                        <small><?=$cmt->created_at?></small>
                    </h4>
                    <?=$cmt->NoiDung?>
                </div>
            </div>
        <?php endforeach ?>
        <!-- end Comment -->
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-heading"><b>Tin liên quan</b></div>
            <div class="panel-body">
                    
                <!-- item -->
                <?php foreach ($newsRelated as $value): ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>">
                                <img class="img-responsive" src="public/image/tintuc/<?=$value->Hinh?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>"><b><?=$value->TieuDe?></b></a>
                        </div>
                        <!-- <p><?=$value->TomTat?></p> -->
                        <div class="break"></div>
                    </div>
                <?php endforeach ?>
                <!-- end item -->
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><b>Tin nổi bật</b></div>
            <div class="panel-body">

                <!-- item -->
                <?php foreach ($newsHot as $value): ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>">
                                <img class="img-responsive" src="public/image/tintuc/<?=$value->Hinh?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="?cn=detail&m=detail&id=<?=$value->id?>&name=<?=$value->TieuDeKhongDau?>"><b><?=$value->TieuDe?></b></a>
                        </div>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        <div class="break"></div>
                    </div>
                <?php endforeach ?>
                <!-- end item -->
            </div>
        </div>

    </div>

</div>