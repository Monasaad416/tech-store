<?php require_once("inc/header.php"); ?>
<?php

use Techstore\Classes\Cart;

$cart = new Cart;
$cart_items = $cart->all_in_cart();
?>

<!-- Cart -->

<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cart_container">
					<div class="cart_title">Shopping Cart</div>
					<?php if ($cart_items) : ?>
						<div class="cart_items">
							<ul class="cart_list">
								<?php foreach ($cart_items as $id => $cartData) : ?>
									<li class="cart_item clearfix">
										<div class="cart_item_image"><img src="<?= URL . 'uploads/' . $cartData['img'] ?>" alt="<?= $cartData['qty']; ?>"></div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											<div class="cart_item_name cart_info_col">
												<div class="cart_item_title">Name</div>
												<div class="cart_item_text"><?= $cartData['name']; ?></div>
											</div>
											<div class="cart_item_quantity cart_info_col">
												<div class="cart_item_title">Quantity</div>
												<div class="cart_item_text"><?= $cartData['qty']; ?></div>
											</div>
											<div class="cart_item_price cart_info_col">
												<div class="cart_item_title">Price</div>
												<div class="cart_item_text">$<?= $cartData['price']; ?></div>
											</div>
											<div class="cart_item_total cart_info_col">
												<div class="cart_item_title">Total</div>
												<div class="cart_item_text">$<?= $cartData['price'] * $cartData['qty']; ?></div>
											</div>
											<div class="cart_item_action cart_info_col">
												<div class="cart_item_title">Remove</div>
												<div class="cart_item_text">
													<a href="<?= URL ?>handlers/remove_cart.php?id=<?= $id ?>">
														<i class="fas fa-trash"></i>
													</a>
												</div>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">$<?= $cart->total(); ?></div>
							</div>
						</div>
					<?php else : ?>
						<h3 class="text-capitalize text-center text-danger font-weight-bold my-5">no items in the cart</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="contact_form">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_form_container">
					<?php if ($cart_items) : ?>
						<div class="contact_form_title">Fill in your info</div>
						<?php if ($session->has_session("errors")) : ?>
							<div class="alert alert-danger">
								<?php foreach ($session->get_session("errors") as $err) : ?>
									<p><?= $err; ?></p>

								<?php endforeach; $session->remove_session("errors");?>
							</div>

						<?php endif; ?>

						<form method="POST" action="<?= URL; ?>handlers/add_order.php" id="order_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="name" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name">
								<input type="email" name="email" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email">
								<input type="text" name="phone" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" name="address" class="text_field contact_form_message" rows="4" placeholder="Your address"></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" name="submit" value="submit" class="button contact_submit_button">Submit Order</button>
							</div>
						</form>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
	<div class="panel"></div>
</div>

<?php require_once("inc/footer.php"); ?>