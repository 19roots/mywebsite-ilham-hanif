<?php
session_start();

require "config/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
     
    <div class="container">
        <div class="header">
            <h1 class="title">MyWebsite</h1>
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=profile">Profile</a></li>
                <li><a href="?page=tugas">Tugas</a></li>
                <li><a href="?page=contact">Contact me</a></li>
                <?php                
                if(isset($_SESSION["login"])){
                    echo "<li><a href='?page=pesan'>Data Pesan</a></li>
                    <li><a href='?page=sc'>Source Code</a></li>
                    <li style='padding-left: 35%'><a style='color: red; font-style: italic' href='?page=logout'>Logout</a></li>";
                }else{
                    echo "<li><a href='?page=signup'>Daftar</a></li>
                    <li><a href='?page=login'>Masuk</a></li>";
                }
                ?>
                
            </ul>
        </div>
        <div class="hero"></div>
        <div class="content cf">
            <?php
            @$page = $_GET['page'];
            if (!empty($page)) {
                switch ($page) {
                    case 'home':
                        include "page/home.php";
                        break;

                    case 'profile':
                        include "page/profile.php";
                        break;

                    case 'tugas':
                        include "page/tugas.php";
                        break;

                    case 'contact':
                        include "page/contact.php";
                        break;

                    case 'sc':
                        include "page/sc.php";
                        break;

                    case 'signup':
                        include "page/signup.php";
                        break;

                    case 'login':
                        include "page/login.php";
                        break;

                    case 'pesan':
                        include "page/pesan.php";
                        break;

                    case 'logout':
                        include "page/logout.php";
                        break;

                    default:
                        include "page/home.php";
                        break;
                }
            }else {
                include "page/home.php";
            }

            ?>
        </div>
        <div class="footer-top">
            <h1>Social Media</h1>
            <div class="social-media">
                <a href="https://t.me/ilhamhanif07"><i class="fa fa-telegram fa-lg" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/ilham.hanif.19"><i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/ilhamhanif1707"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="footer">
            <p class="cr">© Copyright Ilham Hanif. All Rights Reserved</p>
            <p class="credits">Designed by <a href="https://www.facebook.com/ilham.hanif.19">Ilham Hanif</a></p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>        
    <script>
        $(document).ready(function(){
            $("#name").on('change', function(){
                $(".data").hide();
                $("#" + $(this).val()).fadeIn(700);
            }).change()
        })
    </script>        
    
</body>
</html>