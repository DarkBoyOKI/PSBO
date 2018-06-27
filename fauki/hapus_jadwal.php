<?php
    $connection = mysql_connect(“localhost”,”root”,”root”) or die (mysql_error());
    mysql_select_db(“jadwal_kuliah”) or die (mysql_error());
    $id_jadwal = $_GET[‘id_jadwal’];
    mysql_query(“DELETE FROM `jadwal` WHERE `jadwal`.`id_jadwal` = ‘$id_jadwal'”) or die (mysql_error());
    mysql_close($connection);
?>
<p>jadwal kuliah sudah dihapus silahkan lihat <a href=”tampil.php”>disini</a></p>
