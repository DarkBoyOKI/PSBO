<html>
<head><title>list jadwal kuliah</title>
</head>
<body>
    <?php
    $server=”localhost”;
    $user=”root”;
    $password=”root”;
    $id_mysql=mysql_connect(“localhost”,”root”,”root”);
    if(! $id_mysql)
    die(mysql_error());
    $db_jadwal_kuliah=mysql_select_db(“jadwal_kuliah”, $id_mysql);
    if(! $db_jadwal_kuliah)
    die(mysql_error());
    $sql = “SELECT id_jadwal, kd_matkul, matkul, kd_dosen, dosen, semester, ruang, jurusan, keterangan FROM jadwal”;
    $hasil = mysql_query($sql, $id_mysql);
    if(! $hasil)
    die(mysql_error());
    $nomor=0;
    print(“<table width=\”120%\” border=\”1\” align=\”center\”>\n”);
    print(“<tr align=\”center\” bgcolor=\”#00ff7f\”>\n”);
    print(“<td width=\”10%\”>id jadwal</td>\n”);
    print(“<td width=\”10%\”>kd matkul</td>\n”);
    print(“<td width=\”15%\”>matkul</td>\n”);
    print(“<td width=\”10%\”>kd dosen</td>\n”);
    print(“<td width=\”10%\”>dosen</td>\n”);
    print(“<td width=\”10%\”>semester</td>\n”);
    print(“<td width=\”10%\”>ruang</td>\n”);
    print(“<td width=\”10%\”>jurusan</td>\n”);
    print(“<td width=\”15%\”>keterangan</td>\n”);
    print(“<td width=\”15%\”>pilihan</td>\n”);
    print(“</tr>\n”);
    while($baris = mysql_fetch_row($hasil))
    {
    $nomor++;
    $id_jadwal=$baris[0];
    $kd_matkul=$baris[1];
    $matkul=$baris[2];
    $kd_dosen=$baris[3];
    $dosen=$baris[4];
    $semester=$baris[5];
    $ruang=$baris[6];
    $jurusan=$baris[7];
    $keterangan=$baris[8];
    print(“<tr align=\”center\” bgcolor=\”#87ceeb\”>\n”);
    print(“<td>$id_jadwal</td>\n”);
    print(“<td>$kd_matkul</td>\n”);
    print(“<td>$matkul</td>\n”);
    print(“<td>$kd_dosen</td>\n”);
    print(“<td>$dosen</td>\n”);
    print(“<td>$semester</td>\n”);
    print(“<td>$ruang</td>\n”);
    print(“<td>$jurusan</td>\n”);
    print(“<td>$keterangan</td>\n”);
    print(“<td><a href=\”hapus_jadwal.php?id_jadwal=$id_jadwal\”>remove</a>|<aindeindex.php\”>add</a></td>\n
    }
    print(“</table>\n”);
    mysql_close($id_mysql);
    ?>
</body>
</html>
