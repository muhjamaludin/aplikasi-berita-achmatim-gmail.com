<?php
include("koneksi.php");
//berita utama
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Index Berita</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> | 
        <a href="arsip_berita.php">Arsip Berita</a> | 
        <a href="input_berita.php">Input Berita</a>
        <br/><br/>

        <h2>Halaman Depan ~ Lima Berita Terbaru</h2>
        <?php
            $query = "SELECT A.id_berita, B.nm_kategori, A.judul, A.headline, A.pengirim, A.tanggal 
                FROM berita A, kategori B WHERE A.id_kategori=B.id_kategori ORDER BY A.id_berita DESC LIMIT 0,5";
            $sql = mysqli_query($koneksi_db, $query);
            while ($hasil = mysqli_fetch_array($sql)){
                $id_berita = $hasil['id_berita'];
                $kategori = stripslashes ($hasil['nm_kategori']);
                $judul = stripslashes ($hasil['judul']);
                $headline = nl2br(stripcslashes($hasil['headline'])); 
                $pengirim = stripslashes ($hasil['pengirim']);
                $tanggal = stripslashes ($hasil['tanggal']);

                //tampilkan berita
                echo "<font size=4><a href='berita_lengkap.php'?id=$id_berita'>$judul</a></font><br>";
                echo "<small>Berita dikirimkan oleh <b>$pengirim</b> pada tanggal
                    <b>$tanggal</b> dalam kategori <b>$kategori</b></small>";
                echo "<p>$headline</p>";
                echo "<hr>";
            }
        ?>
    </body>
</html>