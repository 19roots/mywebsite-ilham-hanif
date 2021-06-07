<?php

if(isset($_SESSION["login"])){
    header("Location: ?page=home");
    exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);
        if($password === $row["password"]){
            $_SESSION["login"] = true;
            header("Location: ?page=home");
            exit;
        }
    }

    $error = true;
}
 ?>

<div class="form-section">
    <h1>Masuk</h1>
    <div class="border"></div>
    <?php if(isset($error)): ?>
        <p style="color: red; font-style: italic; text-align: center;">Username atau password salah!</p>
        <?php endif; ?>
    <form action="" method="post" class="form">
        <input type="text" name="username" class="form-text" placeholder="Username" required oninvalid="this.setCustomValidity('Masukan email anda terlebih dahulu')" oninput="setCustomValidity('')">
        <input type="password" name="password" class="form-text" placeholder="Password" required oninvalid="this.setCustomValidity('Masukan password anda terlebih dahulu')" oninput="setCustomValidity('')">
        <input type="submit" name="login" value="Masuk" class="form-btn">
    </form>
</div>