<?php

if(!isset($_SESSION["login"])){
    header("Location: ?page=login");
    exit;
}



if(isset($_GET["aksi"])){
    if(isset($_GET) == "hapus"){
        $id = $_GET["id"];
        if(remove_message($id) > 0){
            echo "<script>alert('Data berhasil di hapus'); document.location.href = '?page=pesan';</script>";
        }else {
            echo "<script>alert('Data gagal di hapus'); document.location.href = '?page=pesan';</script>";
        }
    }
}

$users = query("SELECT * FROM pesan");

?>
<div class="data-pesan">
<h2>Data Pesan</h2>
<div class="border"></div>
<table style="width: 100%; border: 1px solid black;">
    <tr>
        <th width="10" style="border: 1px solid black ; font-weight: bold">No.</th>
        <th width="50" style="border: 1px solid black ; font-weight: bold">Aksi</th>
        <th width="150" style="border: 1px solid black ; font-weight: bold">Nama</th>
        <th width="150" style="border: 1px solid black ; font-weight: bold">Subjek</th>
        <th width="150" style="border: 1px solid black ; font-weight: bold">Email</th>
        <th width="200" style="border: 1px solid black ; font-weight: bold">Pesan</th>
    </tr>
    <?php $i =1; ?>
    <?php foreach($users as $row):?>
    <tr>
        <td style="text-align: center; border: 1px solid black; vertical-align: middle"><?= $i; ?>.</td>
        <td style="text-align: center; border: 1px solid black; vertical-align: middle">
            <a href="?page=pesan&id=<?= $row["id"]; ?>&aksi=hapus" onclick="return confirm('Yakin untuk dihapus?');">Hapus</a>
        </td>
        <td style="text-align: center; border: 1px solid black; vertical-align: middle"><?= $row["nama"]; ?></td>
        <td style="text-align: center; border: 1px solid black; vertical-align: middle"><?= $row["subjek"]; ?></td>
        <td style="text-align: center; border: 1px solid black; vertical-align: middle"><?= $row["email"]; ?></td>
        <td style="text-align: center; border: 1px solid black; vertical-align: middle"><?= $row["pesan"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</div>
