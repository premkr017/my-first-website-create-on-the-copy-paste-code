<?php

include('include/config.php');
session_start();



if (isset($_POST['submit'])) {

    $email = $_POST['email'];

    // CHECK IF EMAIL OR PHONE  ALREADY EXISTS
    $checkSql = "SELECT * FROM news_letter WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        $row = mysqli_fetch_assoc($checkResult);

        if ($row['email'] == $email) {
            $_SESSION['message'] = "Your Email already exists!";
        }

        header("Location: index.php");
        exit;
    }

    $sql = "INSERT INTO news_letter ( email)
                    VALUES ( '$email')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = 'Subscription Successful';
        header('location:index.php');

        exit;
    } else {
        $_SESSION['message'] = 'Subscription Failed';
        header('Location: index.php');
        exit;
    }
}
