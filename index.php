<?php
require 'function.php';
    
$mahasiswa = query("SELECT * FROM tb_mahasiswa");
$jumlahMahasiswa = count($mahasiswa);

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (delete_data($id) > 0) {
        echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus!');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Biodata CRUD">
    <meta name="keyword" content="HTML,CSS,Javascript,PHP">
    <meta name="author" content="Pyari Visvapujita Devi Dasi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

</head>

<body>
    <h1>Data Mahasiswa</h1>
    <p>Kelola data mahasiswa dengan create, read, update, dan delete melalui website ini. Terhitung ada
        <?php echo $jumlahMahasiswa; ?> data mahasiswa saat ini.</p>
    <button class="btn-add" onclick="location.href='add.php'">
        <img src="icon/add.png" alt="Tambah Data" class="button-icon">
        Tambah Data
    </button>


    <div class="table-container">
        <table>
            <thead class="header-table">
                <tr>
                    <th id="no">No</th>
                    <th>Foto</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>Jurusan</th>
                    <th>Fakultas</th>
                    <th>Universitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="body-table">
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $data): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>
                        <img src="uploads/<?= $data['picture'] ?>" alt="Foto Mahasiswa" width="100">
                    </td>
                    <td><?= $data["nim"] ?></td>
                    <td><?= $data["name"] ?></td>
                    <td><?= $data["gender"] ?></td>
                    <td><?= $data["address"] ?></td>
                    <td><?= $data["email"] ?></td>
                    <td><?= $data["telp"] ?></td>
                    <td><?= $data["major"] ?></td>
                    <td><?= $data["faculty"] ?></td>
                    <td><?= $data["university"] ?></td>
                    <td>
                        <div class="btn-container">
                            <a href="add.php?mode=edit&id=<?= $data['id'] ?>">
                                <button class="btn-edit">
                                    <img src="icon/edit.png" alt="Ubah Data" class="edit-icon">
                                </button>
                            </a>
                            <a href="?action=delete&id=<?= $data['id'] ?>"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <button class="btn-delete">
                                    <img src="icon/delete.png" alt="Hapus Data" class="delete-icon">
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>