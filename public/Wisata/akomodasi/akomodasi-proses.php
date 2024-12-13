<?php 
include '../koneksi.php';

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'akomodasi-entry.php';
            </script>
        ";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'akomodasi-entry.php';
            </script>
        ";

        return null;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, '../img_categories/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['simpan'])) {
    $akomodasi = $_POST['akomodasi'];
    $harga = $_POST['harga'];
    $fasilitas = $_POST['fasilitas'];
    $photo = upload();

    if(!$photo) {
        return false;
    }
    var_dump($photo, $akomodasi, $harga, $fasilitas);

    $sql = "INSERT INTO tb_akomodasi VALUES(NULL, '$photo', '$akomodasi', '$harga','$fasilitas')";

    if(empty($akomodasi) || empty($harga)|| empty($fasilitas)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'akomodasi-entry.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Akomodasi Berhasil Ditambahkan');
                window.location = 'akomodasi.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'akomodasi-entry.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id         = $_POST['id'];
    $akomodasi = $_POST['akomodasi'];
    $harga      = $_POST['harga'];
    $fasilitas = $_POST['fasilitas'];
    $photoLama = $_POST['photoLama'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../img_categories/' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE tb_akomodasi SET 
            photo = '$photo',
            akomodasi = '$akomodasi',
            harga = '$harga',
            fasilitas = '$fasilitas'
            WHERE id = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Akomodasi Berhasil Diubah');
                window.location = 'akomodasi.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'akomodasi-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_akomodasi WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('../img_categories/' . $photo);
    

    $sql = "DELETE FROM tb_akomodasi WHERE id = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Akomodasi Berhasil Dihapus');
                window.location = 'akomodasi.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Akomodasi Gagal Dihapus');
                window.location = 'Akomodasi.php';
            </script>
        ";
    }
}else {
    header('location: Akomodasi.php');
}
