<?php

if(isset($_SESSION["login"])){
    header("Location: ?page=home");
    exit;
}

if(isset($_POST["signup"])) {
    if(add_user($_POST) > 0) {
        echo "<script>alert('Pendaftaran berhasil, silahkan login di menu login atau tunggu 5 detik');
        setTimeout(function(){ document.location.href = '?page=login';}, 5000);
        </script>";
    }else {
        echo mysqli_error($conn);
    }
}
?>
<div class="form-section">
<h1>Daftar</h1>
<div class="border"></div>
<form action="" method="post" class="form">
    <input type="text" name="nama" class="form-text" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Masukan nama anda terlebih dahulu')" oninput="setCustomValidity('')">
    <input type="text" name="username" class="form-text" placeholder="Username" required oninvalid="this.setCustomValidity('Masukan username anda terlebih dahulu')" oninput="setCustomValidity('')">
    <input type="password" name="password" class="form-text" placeholder="Password" required oninvalid="this.setCustomValidity('Masukan password anda terlebih dahulu')" oninput="setCustomValidity('')">
    <input type="submit" name="signup" value="Daftar" class="form-btn">
</form>
</div>