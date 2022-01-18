<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link rel="stylesheet" href="/css/homepage.css">
</head>

<body>
	<header>

		<nav>
			<div>
				<h1>Mihai Clothing Co.</h1>
			</div>
			<ul>
				<li> <a href="">About</a></li>
				<li><span class="span-link" id="categories-hoverable" href="">Categories</span> </li>
				<li><span id="cart-open">Cart</span></li>
				<li><?php
					$session = session();

					if ($session->get('name') == "") {
						echo '<button id="login-button">Login</button><button  id="register-button">Register</button>
						';
					} else {
						echo '<a title="View Your Profile" href="' . site_url('Home/user') . '"  id="profile-button">' . $session->get('name') . '</a><button  id="logout-button">Logout</button>';
					}
					?></li>
			</ul>
		</nav>
	</header>
	<section class="main">
		<div class="left-image">
		</div>
		<div class="right-text">
			<p>Introducing</p>
			<p>THE OFFICIAL COLLECTION</p>
			<p>A colection of new official wear that is as a result of the new Official Wear partnerships forged between us and Le Suit.</p>
			<a href="">Buy Now</a>
			<a href="">About Us</a>
		</div>
		<div class="categories">
			<a href="">Men</a>
			<a href="">Women</a>
			<a href="">Children</a>
		</div>
	</section>
	<input id="userid" value="<?php $session = session();
								echo ($session->get('userid')); ?>" type="hidden">
	<div class="cart-sidebar">
		<div id="cart-title">
			<p>YOUR CART</p>
			<span id="close" class="iconify close-btn" data-icon="ci:close-small"></span>

			<hr>
		</div>
		<div id="cart-body">
			<?php

			$session = session();

			if ($session->get('name') == "") {
				echo '<div>
				<p>
					You must be logged in to view your cart :(
				</p>
			</div>';
			}
			?>

			<div id="cart-message">
				<p id="display-message">
				</p>
			</div>
		</div>
		<div id="cart-footer">
			<div>
				<p>Estimated Total:</p>
				<span id="total">Ksh 0.00</span>
			</div>
			<div><button id='checkout'>Checkout</button></div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="/Javascript/index.js"></script>

	<script>
		$(document).ready(function() {
			fetchCart()

			$('#login-button').click(function() {
				window.location.replace('<?php echo base_url('Auth/index') ?>')
			})
			$('#logout-button').click(function() {

				$.ajax({
					url: "<?php echo base_url('Auth/logout') ?>",
					method: 'post',
					success: function(response) {
						window.location.reload();
					}
				})
			})
			var id = $('#userid').val();

			function fetchCart() {
				var total_cost = 0
				var n = 0
				var user_data = {
					'userid': $('#userid').val()
				};
				$.ajax({
					url: "<?php echo base_url('Items/fetchCart') ?>",
					method: 'post',
					data: user_data,
					success: function(result) {
						$.each(result, function(key, value) {
							$.each(this, function(key, value) {
								$("#cart-body").append(
									'<div class="cart-item"><div id="cart-image-container"><img id="cart-image" src="' + this.product_image + '"></div><div id="cart-data"><p><b>' + this.product_name + '</b></p><p>Ksh &nbsp' + this.unit_price + '.00</p><button class=" remove" data-id=' + this.product_id + ' id="remove-cart" title="Remove item from Cart">Remove</button></div><hr></div>'
								)
								total_cost = total_cost + parseInt(this.unit_price, 10)
							})
						})
						$('#total').html('');

						$('#total').html('Ksh&nbsp' + total_cost.toLocaleString('en') + '.00');

					}
				})
			}

			function removeItem(product_id) {
				var data = {
					'userid': $('#userid').val(),
					'product_id': product_id
				};
				$.ajax({
					url: "<?php echo base_url('Items/removeItem') ?>",
					method: 'post',
					data: data,
					success: function(result) {
						if (result) {
							console.log(result);
							fetchCart()
						} else {
							console.log('error');
						}

					}
				})
			}

		})
	</script>
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</body>

</html>