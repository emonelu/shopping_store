<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Info</title>
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/homepage.css">

</head>

<body>


    <header>
        <nav>
            <div>
                <a href="#top">Mihai Clothing Co.</a>
            </div>
            <ul>
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

    <div class="main-container">
        <div class="sidetab">
            <span class="tabs" id="info">
                My Info
            </span>
            <span class="tabs" id="wallet">Wallet & Deposit</span>
        </div>
        <div class="content userinfo">
            <div class="header-image">
                <img src="/images/man.png" alt="User Image">
            </div>
            <div id="user-content">
                <div>
                    <label for="first_name">First Name</label>
                    <input id="first_name" type="text">
                    <label for="last_name">Last Name</label>
                    <input id="last_name" type="text">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password">
                    <label for="gender">Gender</label>
                    <select id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span id="update">Update</span>
                </div>

            </div>
        </div>
        <div class="content wallet">
            <div class="header-image">
                <img src="/images/wallet.png" alt="Wallet">
            </div>

            <div id="wallet-content">
                <p>Your Balance: Ksh&nbsp;
                    <span id="balance"></span>.00
                </p>
                <div>
                    <h3>Deposit Methods:</h3>
                    <div>
                        <span id="visa-span" class="iconify methods-icon" data-icon="grommet-icons:visa"></span>
                        <span id="bitcoin-span" class="iconify methods-icon" data-icon="simple-icons:bitcoincash"></span>
                    </div>
                </div>
                <div class="details-entry" id="visa-details">
                    <label for="">Visa Card Number</label>
                    <input placeholder="eg: 40404040 12545" type="text">
                    <label for="">Expiry Date</label>
                    <input type="date">
                    <label for="">CVV</label>
                    <input type="password" placeholder="The 3 numbers behind the card">
                    <label for="">Deposit Amount</label>
                    <input id="deposit_amount" type="number">
                    <button class="credit-btn" id="submit">Credit to Wallet</button>
                </div>
                <div class="details-entry" id="bitcoin-details">
                    <img src="/images/qr-btc.png">
                </div>
            </div>
        </div>
    </div>
    <input id="userid" value="<?php $session = session();
                                echo ($session->get('userid')); ?>" type="hidden">
</body>
<script src="https://code.iconify.design/2/2.1.1/iconify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/Javascript/products.js"></script>
<?php include('Includes/js.php') ?>;

</html>