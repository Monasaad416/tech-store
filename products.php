<?php require_once("inc/header.php"); ?>
<?php

use Techstore\Classes\Models\Product;

$p = new Product;
$prods = $p->select_all();

?>

<!-- Home -->

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= URL; ?>assets/images/shop_background.jpg"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">All Products</h2>
	</div>
</div>

<!-- Shop -->

<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

				<!-- Shop Sidebar -->
				<div class="shop_sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">Categories</div>
						<ul class="sidebar_categories">
							<?php foreach ($cats as $cat) : ?>
								<li><a href="category.php?id=<?= $cat['id']; ?>"><?= $cat['name']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

				</div>

			</div>

			<div class="col-lg-9">

				<!-- Shop Content -->
				<div class="container-fluid">
					<div class="row">
						<?php foreach ($prods as $prod) : ?>
							<div class="col-md-3 mb-3">
								<div class="card-img-top">
									<img class=src="<?= URL . "uploads/" . $prod['img']; ?>" width="85%" alt="<?= $prod['name']; ?>">
									<div class="card-body">
										<h4>$<?= $prod['price']; ?></h4>
										<a href="<?= URL; ?>product.php?id=<?= $prod['id']; ?>" tabindex="0">
											<?= $prod['name']; ?>
										</a>

									</div>
								</div>

							</div>
						<?php endforeach; ?>
					</div>

				</div>

				<!-- Shop Page Navigation -->

				<div class="shop_page_nav d-flex flex-row">
					<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
					<ul class="page_nav d-flex flex-row">
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">21</a></li>
					</ul>
					<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
				</div>

			</div>

		</div>
	</div>
</div>
</div>

<?php require_once("inc/footer.php"); ?>