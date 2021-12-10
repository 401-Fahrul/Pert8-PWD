<?php
include 'koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>Kode MK</th>
        <th>NAMA MK</th>
        <th>Nilai</th>
    </tr>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "SELECT mahasiswa.nim, mahasiswa.nama, khs.kodeMK, matakuliah.namaMK, khs.nilai FROM mahasiswa INNER JOIN khs ON mahasiswa.nim = khs.NIM JOIN matakuliah ON matakuliah.kode = khs.kodeMK WHERE mahasiswa.nim like'%" . $cari . "%'";
        $tampil = mysqli_query($con, $sql);
    } else {
        $sql = "SELECT mahasiswa.nim, mahasiswa.nama, khs.kodeMK, matakuliah.namaMK, khs.nilai FROM mahasiswa INNER JOIN khs ON mahasiswa.nim = khs.NIM JOIN matakuliah ON matakuliah.kode = khs.kodeMK";
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1;
    while ($r = mysqli_query($tampil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['namaMK']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>