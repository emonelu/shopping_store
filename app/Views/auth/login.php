<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <div class="login-wrapper">
            <div class="left"></div>
            <div class="right">
                <p><b>Mi-Ig</b>&nbspOfficial</p>
                <p>Login to your Account</p>
                <span class="message">Email and Password combination is wrong</span>
                <label for="email">Email:</label>
                <input id="email" type="email" ">
                <label for=" password">Password</label>
                <input id="password" type="password">
                <button id="login">Login</button>
                <a href="<?= site_url('Auth/register') ?>">Register</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login').click(function() { //Sasa hapa..when Login is clicked, this code is executed...


                var creds = { //nitafetch what the user has typed in input tabs..kama input tab ya email iko na id ya email...nazifetch then naweka kwa hio Object inaitwa creds
                    'email': $('#email').val(),
                    'password': $('#password').val()
                }

                //sasa hapa naverify kama all fields zilikua filled na user ndio nisipate errors za SQL 
                if (creds.email == "" || creds.password == "") {
                    $('.message').html('Fields cannot be empty')
                    $('.message').css('display', 'flex')

                }

                //finally natumia ajax kusend data to the php backend 
                $.ajax({

                    //so structure ya an ajax call basically hukaa hivi
                    method: "post", //undefine method iatumika..post ama GET
                    url: "<?php echo base_url('Auth/login') ?>", //Pali data itatumwa...
                    data: creds, //the data itself...zile login details yaani
                    success: function(response) { //sasa response ni oobject inasendiwa back na server...sasa kwangu server itasend back 1 kama login ilikua successful...but 2 and 3 ni error codes 
                        if (response == 1) {
                            window.location.replace('<?php echo base_url('Home') ?>')
                            //so hapa kama login ilikua successful then itaredirect to homepage
                        } else {

                            //if not then kuna some error messages zitakua shown
                            if (response == 2 || response == 3) {
                                $('.message').html('')
                                $('.message').html('Password and Email combination is wrong')
                                $('.message').css('display', 'flex');
                                setTimeout(function() {
                                    $('.message').css('display', 'none')
                                }, 3000)


                            }

                        }
                    }
                });
            })
        })
    </script>
</body>


</html>