<?php
require_once '../controller/contactController.php' ;





// session_start();

// $id=$_SESSION['user_id'] ;
// echo $id['id'] ;




$con=new contact ;
session_start();
$id=$_SESSION['user_id'] ;
echo $id['id'];
$contacts=$con->retrieveBlockedContacts($id['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>truecaller</title>
    <link rel="stylesheet" href="bloacked contact.css">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b20b1c14d.js" crossorigin="anonymous"></script>

</head>

<body>



    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">truecaller</h2>
            </div>

            <div class="menu">
                <ul class="mm">
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="myprofile.php">PROFILE</a></li>
                    <li><a href="ero.html">HELP</a></li>
                    <li><a href="index.login.php">LOGOUT </a></li>

                    <li class="dropdown">
                        <button class="dropbtn"><i class="fa fa-cog"></i></button>
                        <div class="dropdown-content">
                            <!-- <a href="favourite contact.html">favourite contact</a> -->
                            <a href="blockedcontacts.php">blocked contact</a>
                        </div>
                </ul>
            </div>
        </div>


        <div class="container">
            <!--  SEARCH FORM -->
            <header class="header">

                <form class="search-bar">
                    <input type="search-name" class="contact-search" name="search-area" placeholder="Search">
                </form>
            </header>




            <!--  CONTACT LIST -->
            <section class="contacts-library">
                <?php foreach($contacts as $row): ?>
                <ul class="contacts-list">

                    <a href="unblock.php">
                        <div class="contact-section">
                            <li class="list__item">
                                <p class="contact-name"><?php 
                                echo $row['contactName'] ;
                                ?></p>
                                </p>
                            </li>

                            <li class="list__item">
                                <i class="fas fa-ban"></i>
                            </li>
                        </div>
                    </a>



                    <hr>
                </ul>
                <?php endforeach; ?>
            </section>
        </div>