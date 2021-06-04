<div class="contact-section">
    <?php if(!empty($statusMsg)){ ?>
            <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
    <?php } ?>
    <h1>Contact Me</h1>
    <div class="border"></div>
    <form action="page/mail.php" method="post" class="contact-form">
        <input type="text" name="nama" id="nama" class="contact-form-text" placeholder="Nama" required oninvalid="this.setCustomValidity('Masukan nama anda terlebih dahulu')" oninput="setCustomValidity('')">
        <input type="email" name="email" id="email" class="contact-form-text" placeholder="Email" required oninvalid="this.setCustomValidity('Masukan email anda terlebih dahulu')" oninput="setCustomValidity('')">
        <input type="text" name="subjek" id="subjek" class="contact-form-text" placeholder="Subjek" required oninvalid="this.setCustomValidity('Masukan subjek terlebih dahulu')" oninput="setCustomValidity('')">
        <textarea name="pesan" id="pesan" cols="30" rows="10" class="contact-form-text" placeholder="Pesan" required oninvalid="this.setCustomValidity('Masukan pesan anda terlebih dahulu')" oninput="setCustomValidity('')"></textarea>
        <input type="submit" name="submit" value="Kirim" class="contact-form-btn">
    </form>
</div>