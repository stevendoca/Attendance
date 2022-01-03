<?php
// This includes the session file. This file contains code that starts/resumes a session.
// By having it in the header file, it will include on every pages, allowing session capability to be used on every pages across the website.
include_once 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../css/site.css" />
    <title>Attendance - <?php echo $title ?></title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">IT Conference</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="viewrecords.php">View Records</a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <?php
                        if(!isset($_SESSION['id'])){
                    ?>
                    <a class="nav-item nav-link active" href="login.php">Login <span class="sr-only">(current)</span></a>
                    <?php } else { ?>
                    <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</span><span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                    <?php } ?>
                </div>
            </div>
        </nav>
</br>