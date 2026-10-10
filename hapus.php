<?php

include "koneksi.php";

$id = (int) $_GET["id"];

$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE ID = $id");

header("Location: index.php");
exit;

?>