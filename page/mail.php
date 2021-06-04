<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];
    $message = $_POST['pesan'];
    
    if(!empty($email) && !empty($nama) && !empty($subjek) && !empty($pesan)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClassk = 'errordiv';
        }else{
            $toEmail = 'ilhamhanif07@gmail.com';
            $fromEmail = 'support@ilhamhanif.xyz';
            $emailsubjek = 'Pesan website dari '.$nama;
            $htmlContent = '<h2> via Form Kontak Website</h2>
                <h4>nama</h4><p>'.$nama.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>subjek</h4><p>'.$subjek.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            $headers .= 'From: '.$nama.'<'.$fromEmail.'>'. "\r\n";
            
            // Send email
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