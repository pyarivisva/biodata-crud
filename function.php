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
    $picture = upload_file(); 

    if (!$picture) {
        return false;
    }

    $query = "INSERT INTO tb_mahasiswa (nim, name, gender, address, email, telp, major, faculty, university, picture) 
              VALUES ('$nim', '$name', '$gender', '$address', '$email', '$telp', '$major', '$faculty', '$university', '$picture')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Upload gambar
function upload_file() {
    $uploadDir = 'uploads/';  // disimpen di folder uploads
    
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileName = $_FILES['picture']['name'];
    
    if (move_uploaded_file($fileTmpName, $uploadDir . $fileName)) {
        return $fileName; 
    } else {
        echo "<script>alert('Gagal mengunggah file!');</script>";
        return false;
    }
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
    
    $picture = upload_file(); 
    if (!$picture) {
        return false;  
    }

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

    if (mysqli_query($conn, $query)) {
        return mysqli_affected_rows($conn);
    } else {
        echo "Error: " . mysqli_error($conn); 
        return false;
    }
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
?>