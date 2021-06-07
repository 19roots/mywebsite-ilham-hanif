<?php
$conn = mysqli_connect("localhost", "root", "TyWW^yZJYd?R", "ilhamhanif");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function add_message($data) {
    global $conn;
    
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $subjek = htmlspecialchars($data["subjek"]);
    $pesan = htmlspecialchars($data["pesan"]);

    $query = "INSERT INTO pesan VALUES ('', '$nama', '$email' , '$subjek', '$pesan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function remove_message($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM pesan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function add_user($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes(($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!')
                </script>";
        return false;
    }

    $query = "INSERT INTO user VALUES ('', '$nama', '$username', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>