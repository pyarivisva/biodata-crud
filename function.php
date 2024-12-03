<?php 
require 'connection.php';

// Select
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Insert
function add_data($data) {
    global $conn;

    $nim = isset($data['nim']) ? htmlspecialchars($data['nim']) : '';
    $name = isset($data['name']) ? htmlspecialchars($data['name']) : '';
    $gender = isset($data['gender']) ? htmlspecialchars($data['gender']) : '';
    $address = isset($data['address']) ? htmlspecialchars($data['address']) : '';
    $email = isset($data['email']) ? htmlspecialchars($data['email']) : '';
    $telp = isset($data['telp']) ? htmlspecialchars($data['telp']) : '';
    $major = isset($data['major']) ? htmlspecialchars($data['major']) : '';
    $faculty = isset($data['faculty']) ? htmlspecialchars($data['faculty']) : '';
    $university = isset($data['university']) ? htmlspecialchars($data['university']) : '';
    $picture = 'user.jpg';

    $query = "INSERT INTO tb_mahasiswa (nim, name, gender, address, email, telp, major, faculty, university, picture) 
              VALUES ('$nim', '$name', '$gender', '$address', '$email', '$telp', '$major', '$faculty', '$university', '$picture')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Update
function update_data($data, $id) {
    global $conn;

    if (!$id || !is_numeric($id)) {
        return false; 
    }

    $nim = isset($data['nim']) ? htmlspecialchars($data['nim']) : '';
    $name = isset($data['name']) ? htmlspecialchars($data['name']) : '';
    $gender = isset($data['gender']) ? htmlspecialchars($data['gender']) : '';
    $address = isset($data['address']) ? htmlspecialchars($data['address']) : '';
    $email = isset($data['email']) ? htmlspecialchars($data['email']) : '';
    $telp = isset($data['telp']) ? htmlspecialchars($data['telp']) : '';
    $major = isset($data['major']) ? htmlspecialchars($data['major']) : '';
    $faculty = isset($data['faculty']) ? htmlspecialchars($data['faculty']) : '';
    $university = isset($data['university']) ? htmlspecialchars($data['university']) : '';
    $picture = isset($data['picture']) ? $data['picture'] : 'user.jpg';

    // Ambil gambar yang sudah ada (tidak ada perubahan gambar)
    $query = "UPDATE tb_mahasiswa SET 
              nim = '$nim', 
              name = '$name', 
              gender = '$gender', 
              address = '$address', 
              email = '$email', 
              telp = '$telp', 
              major = '$major', 
              faculty = '$faculty', 
              university = '$university',
              picture = '$picture'
              WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Delete
function delete_data($id) {
    global $conn;

    $result = mysqli_query($conn, "SELECT picture FROM tb_mahasiswa WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
    if ($data['picture']) {
        unlink('uploads/' . $data['picture']);
    }

    $query = "DELETE FROM tb_mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Search
function searching ($search){
    global $conn;

    $query_search = "SELECT * FROM tb_mahasiswa WHERE nim LIKE '%$search%' OR name LIKE '%$search%' OR 
                    gender LIKE '%$search%' OR address LIKE '%$search%' OR email LIKE '%$search%' OR 
                    telp LIKE '%$search%' OR major LIKE '%$search%' OR faculty LIKE '%$search%' OR 
                    university LIKE '%$search%'";

    $searching = mysqli_query($conn, $query_search);
    return $searching;
}
?>