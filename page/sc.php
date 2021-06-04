<h2>Source Code</h2>
<div class="border"></div>

<?php
    $password = 'merdeka2';

    if (empty($_COOKIE['password']) || $_COOKIE['password'] !== $password) {
        require "protect.php";
    }else{
        ?>
            <div class="links">
                <a href="https://github.com/19roots/mywebsite-ilham-hanif">Link here</a>
            </div>
        <?php
    }
    
?>
