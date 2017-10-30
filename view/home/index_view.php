<div class="row main-left">
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

            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
	            		<?php foreach ($categories as $value): ?>
	            			
					    <div class="row-item row">
		                	<h3>
		                		<a href="#"><?=$value->Ten?></a> |
		                		<?php $loaitin = explode(',', $value->Loaitin);
			                    	foreach ($loaitin as $loai): 
			                    	list($id, $ten, $tenKhongDau) = explode('|', $loai);
			                	?>
		                			<small><a href="?cn=loaitin&m=loaitin&id=<?=$id?>"><i><?=$ten?></i></a>/</small>
		                		<?php endforeach ?>
		                	</h3>
		                	<div class="col-md-12 border-right">
		                		<div class="col-md-3">
			                        <a href="chitiet.html">
			                            <img class="img-responsive" src="public/image/tintuc/<?=$value->image?>" alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-9">
			                        <h3><?=$value->TieuDe?></h3>
			                        <p><?=$value->TomTat?></p>
			                        <a class="btn btn-primary" href="chitiet.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>

							<div class="break"></div>
		                </div>
	            		<?php endforeach ?>
		                <!-- end item -->

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->