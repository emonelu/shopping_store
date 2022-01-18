<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="/css/user.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <header>
        <div id="logo">
            <a href="<?php echo site_url('Home') ?>">Mihai Clothing</a>
        </div>
    </header>
    <input id="userid" value="<?php
                                $session = session();
                                echo $session->get('userid');
                                ?>" type="hidden">
    <div class="tabbed-content">
        <div id="tabs">
            <span class="tabs-active" id="checkout">Checkout</span>
            <span id="info">My Information</span>
            <span id="history">History</span>
            <span id="deposit">Deposit Methods</span>
        </div>
        <div class="tabs-content show" id="checkout-tab">
            <div class="empty hide">
                <p>There are no Items in your Cart😅</p>
            </div>
            <div class="items">
                <table class="w3-table-all w3-card-4" id="checkout-items">
                    <tr>
                        <th>Order No</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                    <div class="calc amount-available">
                    </div>
                    <div class="calc total">
                    </div>
                    <div class="calc balance">
                    </div>
                    <button class="checkout-btn" id="checkout-btn">Checkout</button>
            </div>

        </div>
        <div class="tabs-content hide" id="info-tab">
            <p>info</p>
        </div>
        <div class="tabs-content hide" id="history-tab">
            <p>history</p>
        </div>
        <div class="tabs-content hide" id="deposit-tab">
            <p>deposits</p>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/Javascript/index.js"></script>
<?php include('jq.php') ?>

</html>