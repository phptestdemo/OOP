<div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>

                    <?php foreach ($categories as $value): ?>
						
	                    <li href="#" class="list-group-item menu1">
	                    	<?php echo $value->Ten ?>
	                    </li>
	                    <ul>
	                    <?php $loaitin = explode(',', $value->Loaitin);
	                    	foreach ($loaitin as $loai): 
	                    	list($id, $ten, $tenKhongDau) = explode('|', $loai);
	                	?>
	                    	<li class="list-group-item">
	                			<a href="?cn=loaitin&m=loaitin&id=<?=$id?>"><?=$ten?></a>
	                		</li>
	                    <?php endforeach ?>
	                    </ul>
					<?php endforeach ?>
 
                </ul>
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b><?=$title?></b></h4>
                    </div>

                    <?php foreach ($news as $value): ?>
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a href="detail.html">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$value->Hinh?>" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3><?=$value->TieuDe?></h3>
                                <p><?=$value->TomTat?></p>
                                <a class="btn btn-primary" href="detail.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
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
            </div> 

        </div>
