<?php
require 'function.php';

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'add';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$data = [
    'nim' => '',
    'name' => '',
    'gender' => '',
    'address' => '',
    'email' => '',
    'telp' => '',
    'major' => '',
    'faculty' => '',
    'university' => '',
    'picture' => ''
];

if ($mode === 'edit' && $id) {
    $result = query("SELECT * FROM tb_mahasiswa WHERE id = $id");

    if (!empty($result)) {
        $data = $result[0];
    } else {
        echo "<script>
                alert('Data tidak ditemukan!');
                document.location.href = 'index.php';
              </script>";
        exit;
    }
}

if (isset($_POST["submit"])) {
    if ($mode === 'add') {
        if (add_data($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan!');
            </script>";
        }
    } elseif ($mode === 'edit') {
        if (update_data($_POST, $id) > 0) {
            echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah!');
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
</head>

<body>
    <div class="container-biodata">
        <div class="header">
            <h1 class="biodata-input">Biodata</h1>
        </div>
        <div class="content">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                <table cellpadding="20px" cellspacing="0px">
                    <tr>
                        <td><span id="spn_nim">NIM</span></td>
                        <td><input type="text" name="nim" id="nim" value="<?= $data['nim'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><span id="spn_nama">Nama Lengkap</span></td>
                        <td><input type="text" name="name" id="name" value="<?= $data['name'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><span id="spn_gender">Jenis Kelamin</span></td>
                        <td>
                            <input type="radio" id="perempuan" name="gender" value="Perempuan"
                                <?= $data['gender'] === 'Perempuan' ? 'checked' : '' ?> required>
                            <label for="perempuan">Perempuan</label>
                            <input type="radio" id="laki-laki" name="gender" value="Laki-Laki"
                                <?= $data['gender'] === 'Laki-Laki' ? 'checked' : '' ?> required>
                            <label for="laki-laki">Laki-Laki</label>
                        </td>
                    </tr>
                    <tr>
                        <td><span id="spn_alamat">Alamat</span></td>
                        <td><textarea name="address" id="address" required><?= $data['address'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td><span id="spn_email">Email</span></td>
                        <td><input type="email" name="email" id="email" value="<?= $data['email'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><span id="spn_telp">Nomor Telepon</span></td>
                        <td><input type="text" name="telp" id="telp" value="<?= $data['telp'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><span id="spn_jurusan">Jurusan</span></td>
                        <td><input type="text" name="major" id="major" value="<?= $data['major'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><span id="spn_fakultas">Fakultas</span></td>
                        <td><input type="text" name="faculty" id="faculty" value="<?= $data['faculty'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td><span id="spn_universitas">Universitas</span></td>
                        <td><input type="text" name="university" id="university" value="<?= $data['university'] ?>"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <td><span id="spn_foto">Foto Diri</span></td>
                        <td>
                            <input type="file" name="picture" id="picture" disabled
                                <?= $mode === 'add' ? 'required' : '' ?>>

                            <?php if ($mode === 'edit' && $data['picture']): ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>

                <div class="button-group">
                    <button type="submit" name="submit" class="btn-save">
                        <img src="icon/save.png" alt="Submit" class="button-icon">
                        <?= $mode === 'add' ? 'Tambah' : 'Simpan Perubahan' ?>
                    </button>
                    <button type="button" onclick="window.location.href='index.php';" class="btn-back">
                        <img src="icon/back.png" alt="Kembali" class="back-icon"> Kembali
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>