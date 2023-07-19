<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3R SHOES CARE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="icon" href="images/logo/nike.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="image/LOGO.jpeg">
</head>

<body>

    <section id="header">
        <a href="index.php"><img src="image/LOGO.jpeg" class="logo"></a>

        <div>

            <ul id="navbar">
                <li><a class="<?php echo ($activePage == 'home') ? 'active' : ''; ?>" href="index.php">Home</a></li>
                <li><a class="<?php echo ($activePage == 'service') ? 'active' : ''; ?>" href="service.php">Service</a>
                </li>
                <li><a class="<?php echo ($activePage == 'gallery') ? 'active' : ''; ?>" href="gallery.php">Gallery</a>
                </li>
                <li><a class="<?php echo ($activePage == 'about') ? 'active' : ''; ?>" href="about.php">About</a></li>
                <li><a class="<?php echo ($activePage == 'contact') ? 'active' : ''; ?>" href="contact.php">Contact</a>
                </li>
                <li><a class="<?php echo ($activePage == 'profile') ? 'active' : ''; ?>" href="profile.php">My
                        Profile</a></li>
                <a href="#" id="close"> <i class="far fa-times"></i></a>
                <li><a class="<?php echo ($activePage == 'login') ? 'active' : ''; ?>" href="login.php">Login</a>
                </li>
            </ul>

        </div>
        <div id="mobile">
            <i id="bar" class=" far fa-bars"></i>
        </div>
    </section>