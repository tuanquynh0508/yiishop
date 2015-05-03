<?php

use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;
?>
<div class="row" id="bodyFirst">

	<div class="col-sm-3 col-lg-3 col-md-3">
			
				<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" id="categoryMenu">
				<!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
			  <li class="header">Danh mục sản phẩm</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-arrow-circle-o-right"></i> <span>Danh mục 1</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-long-arrow-right"></i> Dashboard v1</a></li>
                <li><a href="#"><i class="fa fa-long-arrow-right"></i> Dashboard v2</a></li>
              </ul>
            </li>            
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->

	</div><!-- /.col-sm-2 -->

	<div class="col-sm-9 col-lg-9 col-md-9">

		
		<nav class="navbar navbar-default" id="pageMenuTop">
			<div class="container-fluid">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Trang chủ</a></li>
						<li><a href="#">Hướng dẫn mua hàng</a></li>
						<li><a href="#">Thanh toán</a></li>
						<li><a href="#">Vận chuyển</a></li>
						<li><a href="#">Đổi hàng</a></li>
						<li><a href="#">Liên hệ</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		


		<div id="carousel-example-generic" class="carousel slide margin-bottom" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
				<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
				<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
				<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
				<li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-1.jpg', ['class' => 'img-rounded']); ?>
					<div class="carousel-caption">
						First Slide
					</div>
				</div>
				<div class="item">
					<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-2.jpg', ['class' => 'img-rounded']); ?>
					<div class="carousel-caption">
						Second Slide
					</div>
				</div>
				<div class="item">
					<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-3.jpg', ['class' => 'img-rounded']); ?>
					<div class="carousel-caption">
						Third Slide
					</div>
				</div>
				<div class="item">
					<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-4.jpg', ['class' => 'img-rounded']); ?>
					<div class="carousel-caption">
						Thu 4 Slide
					</div>
				</div>
				<div class="item">
					<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-5.jpg', ['class' => 'img-rounded']); ?>
					<div class="carousel-caption">
						Thu 5 Slide
					</div>
				</div>
				<div class="item">
					<?php echo Html::img($baseUrl . '/cuahangnhua/slider/a-6.jpg', ['class' => 'img-rounded']); ?>
					<div class="carousel-caption">
						Thu 6 Slide
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				<span class="fa fa-chevron-circle-left fa-2x"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				<span class="fa fa-chevron-circle-right fa-2x"></span>
			</a>
		</div>


		<!-- Custom Tabs -->
		<div class="nav-tabs-justified custom-tab-primary">
			<ul class="nav nav-tabs margin-bottom">
				<li class="active"><a href="#tab_1" data-toggle="tab">Sản phẩm mới</a></li>
				<li><a href="#tab_2" data-toggle="tab">Sản phẩm xem nhiều nhất</a></li>
				<li><a href="#tab_3" data-toggle="tab">Sản phẩm khuyến mãi</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">

					<div class="row">

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
									<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
									<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="pull-right text-red">$24.99</h4>
									<h4><a href="#">Mã SP: XXXX</a></h4>
									<p>Tên sản phẩm sẽ nằm ở đây nha</p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="pull-right text-red">$24.99</h4>
									<h4><a href="#">Mã SP: XXXX</a></h4>
									<p>Tên sản phẩm sẽ nằm ở đây nha</p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="pull-right text-red">$24.99</h4>
									<h4><a href="#">Mã SP: XXXX</a></h4>
									<p>Tên sản phẩm sẽ nằm ở đây nha</p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="pull-right text-red">$24.99</h4>
									<h4><a href="#">Mã SP: XXXX</a></h4>
									<p>Tên sản phẩm sẽ nằm ở đây nha</p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="pull-right text-red">$24.99</h4>
									<h4><a href="#">Mã SP: XXXX</a></h4>
									<p>Tên sản phẩm sẽ nằm ở đây nha</p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->

						<div class="col-sm-3 col-lg-3 col-md-3 product-item">
							<div class="thumbnail">
								<img src="http://img.yiishop.local/md_nopicture.jpg">
								<div class="caption">
									<h4 class="pull-right text-red">$24.99</h4>
									<h4><a href="#">Mã SP: XXXX</a></h4>
									<p>Tên sản phẩm sẽ nằm ở đây nha</p>
								</div>
								<div class="button clearfix">
									<button class="btn btn-default btn-sm pull-left" type="button">
										<i class="fa fa-shopping-cart"></i> Đặt hàng
									</button>
									<button class="btn btn-default btn-sm pull-right" type="button">
										<i class="fa fa-search"></i> Chi tiết
									</button>
								</div>
							</div>
						</div><!-- /.product-item -->


					</div>

				</div><!-- /.tab-pane -->

				<div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
				</div><!-- /.tab-pane -->
			</div><!-- /.tab-content -->
		</div><!-- nav-tabs-custom -->

	</div>

</div><!-- /#bodyFirst -->

<div class="row" id="bodySecond">

	<div class="col-sm-12 col-lg-12 col-md-12">

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title text-bold text-primary"><i class="fa fa-shopping-cart"></i> Danh mục sản phẩm 1</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" type="button"><i class="fa fa-share-square-o"></i> Xem thêm</button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">

				<div class="row">

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="text-center"><a href="#">Tên sản phẩm sẽ nằm ở đây nha</a></h4>
								<p class="text-center"><strong>Giá bán: <span class="text-red">280.000 VND</span></strong></p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

				</div>

			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</div><!-- /.col-sm-12 col-lg-12 col-md-12 -->

	<div class="col-sm-12 col-lg-12 col-md-12">

		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title text-bold text-primary"><i class="fa fa-shopping-cart"></i> Danh mục sản phẩm 1</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" type="button"><i class="fa fa-share-square-o"></i> Xem thêm</button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">

				<div class="row">

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

					<div class="col-sm-3 col-lg-3 col-md-3 product-item">
						<div class="thumbnail">
							<img src="http://img.yiishop.local/md_nopicture.jpg">
							<div class="caption">
								<h4 class="pull-right text-red">$24.99</h4>
								<h4><a href="#">Mã SP: XXXX</a></h4>
								<p>Tên sản phẩm sẽ nằm ở đây nha</p>
							</div>
							<div class="button clearfix">
								<button class="btn btn-default btn-sm pull-left" type="button">
									<i class="fa fa-shopping-cart"></i> Đặt hàng
								</button>
								<button class="btn btn-default btn-sm pull-right" type="button">
									<i class="fa fa-search"></i> Chi tiết
								</button>
							</div>
						</div>
					</div><!-- /.product-item -->

				</div>

			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</div><!-- /.col-sm-12 col-lg-12 col-md-12 -->

</div><!-- /#bodySecond -->

<div class="row" id="infoBoxBottom">
	<div class="col-sm-6 col-lg-6 col-md-6">
		<p><strong>Số 153 phố Khâm Thiên, phường Thổ Quan, quận Đống Đa, Hà Nội</strong></p>
		<p><strong>Điện thoại:</strong> 04-123456789 - <strong>Fax:</strong> 04-123456789</p>
		<p><strong>Enail:</strong> <a href="mailto:sale@dogiadungphongthuy.com">sale@dogiadungphongthuy.com</a></p>
	</div><!-- /."col-sm-5 col-lg-5 col-md-5 -->
	<div class="col-sm-2 col-lg-2 col-md-2">
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
	</div>
	<div class="col-sm-2 col-lg-2 col-md-2">
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
	</div>
	<div class="col-sm-2 col-lg-2 col-md-2">
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
		<p><a href="#"><i class="fa fa-arrow-circle-right"></i> Thỏa thuận dịch vụ</a></p>
	</div>
</div><!-- /#footerPage -->