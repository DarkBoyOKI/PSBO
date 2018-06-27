<html>
<head><title>Program Aplikasi jadwal kuliah</title></head>

<body>
    <form name=”jadwal_kuliah” action=”” method=”post”>
        <table border=”1″ align=”center” bgcolor=”lightgreen”>
            <tr>
            <td colspan=”3″ align=”center”><h2 align=”center”>Form Input Jadwal kuliah</h2></td>
            </tr>
            <tr>
            <td>id jadwal</td>
            <td><input name=”id_jadwal” type=”hidden”></td>
            </tr>
            <tr>
            <td>kode mata kuliah</td>
            <td>mata kuliah</td>
            </tr>
            <tr>
            <td><input name=”textkd_matkul” type=”text” size=”6″ maxlength=”6″></td>
            <td><input name=”textmatkul” type=”text” size=”50″ maxlength=”50″></td>
            </tr>
            <tr>
            <td>kode dosen</td>
            <td>dosen</td>
            </tr>
            <tr>
            <td><input name=”textkd_dosen” type=”text” size=”6″ maxlength=”6″></td>
            <td><input name=”textdosen” type=”text” size=”50″ maxlength=”50″></td>
            </tr>
            <tr>
            <td>semester</td>
            <td>ruang</td>
            </tr>
            <tr>
            <td><input name=”radiosemester” type=”radio” value=”ganjil”>ganjil
            <input name=”radiosemester” type=”radio” value=”genap”>genap</td>
            <td><input name=”textruang” type=”text” size=”14″ maxlength=”14″></td>
            </tr>
            <tr>
            <td>jurusan</td>
            <td>keterangan</td>
            </tr>
            <tr>
            <td><input name=”textjurusan” type=”text” size=”50″ maxlength=”50″></td>
            <td><input name=”textketerangan” type=”text” size=”50″ maxlength=”50″></td>
            </tr>
            <tr>
            <td colspan=”3″ align=”center”>
            <input name=”buttonsave” type=”submit” value=”save”>
            <input name=”buttoncancel” type=”reset” value=”cancel”>
            </td>
            </tr>
        </table>
    </form>
    <?php
    if($_POST[“buttonsave”]==”save”)
    {
    $textkd_matkul = $_POST[‘textkd_matkul’];
    $textmatkul = $_POST[‘textmatkul’];
    $textkd_dosen = $_POST[‘textkd_dosen’];
    $textdosen = $_POST[‘textdosen’];
    $radiosemester = $_POST[‘radiosemester’];
    $textruang = $_POST[‘textruang’];
    $textjurusan = $_POST[‘textjurusan’];
    $textketerangan = $_POST[‘textketerangan’];
    $server=”localhost”;
    $user=”root”;
    $password=”root”;
    $id_mysql=mysql_connect(“localhost”,”root”,”root”);
    $db_jadwal_kuliah=mysql_select_db(“jadwal_kuliah”, $id_mysql);
    $sql = “INSERT INTO `jadwal_kuliah`.`jadwal` (`kd_matkul`, `matkul`, `kd_dosen`, `dosen`, `semester`, `ruang`, `jurusan`, `keterangan`) VALUES (‘$textkd_matkul’, ‘$textmatkul’, ‘$textkd_dosen’, ‘$textdosen’, ‘$radiosemester’, ‘$textruang’, ‘$textjurusan’, ‘$textketerangan’)”;
    $hasil = mysql_query($sql, $id_mysql);
    if(empty($hasil))
    print(“jadwal kuliah dengan mata kuliah = ‘$textmatkul’ dan dosen = ‘$textdosen’ belum ada di database”);
    else
    print(“jadwal kuliah dengan mata kuliah = ‘$textmatkul’ dan dosen = ‘$textdosen’ sukses disave di database”);
    mysql_close($id_mysql);
    }
    ?>
</body>
<p>untuk list jadwal bisa dilihat di <a href=”tampil.php”>sini</a></p>
</html>
