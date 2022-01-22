<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Mihai Clothing Co</title>
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="stylesheet" href="/css/products.css">
</head>

<body>
    <div id="top"></div>
    <header>

        <nav>
            <div>
                <a href="#top">Mihai Clothing Co.</a>
            </div>
            <ul>
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
    <section id="banner-image">

    </section>
    <section class="content-col">
        <div id="filters">
            <h5>Filters</h5>
            <span id="male">Male Only</span><br>
            <span id="female">Female Only</span><br>
            <span id="kids">Kids Clothing</span><br>
            <span id="reset">Reset</span><br>

        </div>
        <div id="products">
            <h3 id="product-filter-state">All Products</h3>
            <div id="products-table">
            </div>
        </div>

    </section>
    <section class="footer">
        <footer>
            <h1>Mihai Clothing Co</h1>
        </footer>
    </section>
    <input id="userid" value="<?php $session = session();
                                echo ($session->get('userid')); ?>" type="hidden">
    <input type="hidden" id="filter" value="">
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
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/Javascript/index.js"></script>
<script src="/Javascript/products.js"></script>
<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

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

        function fetchAllProducts() {

            $.ajax({
                url: "<?php echo base_url('Items/fetchAllProducts') ?>",
                method: 'POST',
                success: function(response) {
                    $.each(response.products, function(key, value) {

                        $("#products-table").append(
                            "<div class='product-card'><div class='card-image'><img  src='" + value.product_image +
                            "'></div><div class='card-details'><span class='no-hover' id='product-name'>" + value.product_name + "</span><br><br><span class='no-hover' id='product-price'>Ksh &nbsp" + value.unit_price + ".00</span><br><br><span data-id='" + value.product_id + "' id='buy-btn'>Buy Now</span></div></div>"
                        )

                    })
                }
            })
        }
        fetchAllProducts()


        $('#male').click(function(e) {
            modifier = 'male'
            $("#products-table").html('')
            fetchFilteredProducts();

        });
        $('#female').click(function(e) {
            modifier = 'female'
            $("#products-table").html('')
            fetchFilteredProducts();

        });
        $('#kids').click(function(e) {
            modifier = 'kid'
            $("#products-table").html('')
            fetchFilteredProducts();

        });
        $('#reset').click(function(e) {
            $("#products-table").html('')
            fetchAllProducts();

        });

        function fetchFilteredProducts() {
            var data = {
                'gender': modifier
            }
            $.ajax({
                url: "<?php echo base_url('Items/fetchFilteredProducts') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $.each(response.products, function(key, value) {

                        $("#products-table").append(
                            "<div class='product-card'><div class='card-image'><img  src='" + value.product_image +
                            "'></div><div class='card-details'><span class='no-hover' id='product-name'>" + value.product_name + "</span><br><br><span class='no-hover' id='product-price'>Ksh &nbsp" + value.unit_price + ".00</span><br><br><span data-id='" + value.product_id + "' id='buy-btn'>Buy Now</span></div></div>"
                        )

                    })
                }
            })
        }

    })
</script>

</html>