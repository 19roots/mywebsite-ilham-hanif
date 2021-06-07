<?php
$statusMsg = '';
$msgClass = '';
$fromEmail = 'support@ilhamhanif.xyz';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];

    if(isset($_POST["submit"])) {
        if(add_message($_POST) > 0) {
            $statusMsg = 'Pesan Anda sudah terkirim dengan sukses !';
            $msgClass = 'succdiv';
        }else {
            $statusMsg = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
            $msgClass = 'errordiv';
        }
    }
    
    if(!empty($email) && !empty($nama) && !empty($subjek) && !empty($pesan)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClassk = 'errordiv';
        }else{
            $toEmail = 'ilhamhanif07@gmail.com'; 
            $emailsubjek = 'Pesan website dari '.$nama;
            $htmlContent = '<h2> Pesan Baru </h2>
                <h4>Nama :</h4><p>'.$nama.'</p>
                <h4>Email :</h4><p>'.$email.'</p>
                <h4>Subjek :</h4><p>'.$subjek.'</p>
                <h4>Pesan</h4><p>'.$pesan.'</p>';
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            $headers .= 'From: '.$nama.'<'.$fromEmail.'>'. "\r\n";
            
            if(mail($toEmail,$emailsubjek,$htmlContent,$headers)){
                $statusMsg = 'Pesan Anda sudah terkirim dengan sukses !';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Maaf pesan Anda gagal terkirim, silahkan ulangi lagi.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Harap mengisi semua field data';
        $msgClass = 'errordiv';
    }
}
?>

<div class="form-section">
    <h1>Contact Me</h1>
    <div class="border"></div>
    <form action="" method="post" class="form">
        <?php if(!empty($statusMsg)){ ?>
                <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
        <?php } ?>
        <input type="text" name="nama" class="form-text" placeholder="Nama" required oninvalid="this.setCustomValidity('Masukan nama anda terlebih dahulu')" oninput="setCustomValidity('')">
        <input type="email" name="email" class="form-text" placeholder="Email" required oninvalid="this.setCustomValidity('Masukan email anda terlebih dahulu')" oninput="setCustomValidity('')">
        <input type="text" name="subjek" class="form-text" placeholder="Subjek" required oninvalid="this.setCustomValidity('Masukan subjek terlebih dahulu')" oninput="setCustomValidity('')">
        <textarea name="pesan" cols="30" rows="10" class="form-text" placeholder="Pesan" required oninvalid="this.setCustomValidity('Masukan pesan anda terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
        <input type="submit" name="submit" value="Kirim" class="form-btn">
    </form>
</div>
