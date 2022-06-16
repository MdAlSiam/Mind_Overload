<?php

    include 'inc/connect.php';

    $email = $_GET['email'];
    $hash = $_GET['hash'];

    $status = "select status from user_info where email='$email'";
    $run = mysqli_query($con, $status);
    $res = mysqli_fetch_assoc ($run);


    if ($res['status'] == $hash) {
        $update = "update user_info set status='verified' where email='$email'";
        $run = mysqli_query($con, $update);
        echo "<script>alert('your email verification has been successful!!!')</script>";
        echo "<script>window.open('login.php', '_self')</script>";
    }

    ?>
