<!DOCTYPE html>
<html lang="en">
<head>
<title>Mihai Ignat Oficial</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Mihai Ignat Oficial Store">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- font Awesome Cdn -->
	<script src="https://kit.fontawesome.com/e48d166edc.js" crossorigin="anonymous"></script>

	<!-- Bootstrap cdn -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<!-- Owl Carousel File -->
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">

	<!-- CSS File -->
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <h1>This is the homepage</h1>

    <?php

    $session= session();
    $user_details = $session->get('user_details');
    //echo "<pre>"; print_r($user_details); die;
    $firstName = $user_details[0];
    $lastName = $user_details[1];
    $fullName = $firstName .  " ". $lastName;

    echo "Welcome $fullName!"
    ?>
<div class="super_container">
		<!-- Header -->

		<header class="header trans_300">
			<!-- main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="#">mihai ignat <span>Oficial</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="#">Home</a></li>
									<li><a href="#">Shop</a></li>
									<li><a href="#">Promotion</a></li>
									<li><a href="#">Pages</a></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Contacts</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="#"><i class="fa fa-search" arial-hidden="true"></i></a></li>
									<li><a href="e-commerce/registration.php"><i class="fa fa-user" arial-hidden="true"></i></a></li>
									<li class="checkout">
										<a href="#">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span id="checkout_items" class="checkout_items">2</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>






		<!-- Slider -->


		<div class="main_slider" style="background-image:url(/images/slider_1.jpg;)">
			<div class="container fill_hight">
				<div class="row aligh-items-center fill_hight">
					<div class="col">
						<div class="main_slider_content">
							<h6>Spring / Summer Colection 2021</h6>
							<h1>Get up to 30% Off New Arrivers!</h1>
							<div class="red_button shop_now_button"><a href="#">Shop Now</a></div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Banner -->


		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="banner_item align-item-center" style="background-image: url(images/banner_men.jpg);">
							<div class="banner_category">
								<a href="#">Men</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="banner_item align-item-center" style="background-image: url(images/banner_women.jpg);">
							<div class="banner_category">
								<a href="#">Women</a>
							</div>
						</div>
					</div>


					<div class="col-md-3">
						<div class="banner_item align-item-center" style="background-image: url(images/banner_children.jpeg);">
							<div class="banner_category">
								<a href="#">Children</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="banner_item align-item-center" style="background-image: url(images/banner_pets.jpeg);">
							<div class="banner_category">
								<a href="#">Pets</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- New Arrivals -->

		<div class="new_arrivals">
			<div class="container">


				<div class="row">
					<div class="col text-center">
						<div class="selection_title new_arrivals_title">
							<h2>New Arrivals</h2>
						</div>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col text_center">
						<div class="new_arrivals_sorting">
							<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
								<li class="grid_sorting_button button d-flex flex-colum justify-content align-items-center " data-filter="*">Men</li>
								<li class="grid_sorting_button button d-flex flex-colum justify-content align-items-center " data-filter="*">Women</li>
								<li class="grid_sorting_button button d-flex flex-colum justify-content align-items-center " data-filter="*">Children</li>
								<li class="grid_sorting_button button d-flex flex-colum justify-content align-items-center " data-filter="*">Pets</li>
								<li class="grid_sorting_button button d-flex flex-colum justify-content align-items-center " data-filter="*">All</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="product-grid" data-isotope='{"itemSelector": ".priduct-item", "layoutMode": "fitRows"}'>


							<!-- Product 1 -->
							<div class="product-item men">
								<div class="product discount product_filter">
									<div class="product_image">
										<img src="images/product_1.png" alt="">
									</div>

									<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
											<span> Kes 520 </span>
										</div>
										<div class="product_info">
											<h6 class="product_name"><a href="#">Men's Solid Slim Fir Casual Shirt</a></h6>
											<div class="product_price">kes 1000 <span>kes 1200</span></div>
										</div>
										</div>
									<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>

									</div>
							


							

						
					</div>
				</div>
			</div>
		</div>

		<!-- Deal of the week -->



		<!-- Benefit -->


		<!-- Blogs -->


		<!-- Newsletter -->


		<!-- Footer -->


		<!-- Bootstrap JS CDN -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<!-- jquery JS File -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<!-- Isotope JS File -->
		<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
		<!-- Owl Carousel JS File -->
		<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<!-- Javascript File -->
		<script src="js/custom.js"></script>
</body>
</html>