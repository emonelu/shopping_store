<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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



</body>
</html>