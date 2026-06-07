<?php
// File: hasil_pemilihan_data.php
include "../SERVICE/koneksi.php";

$sql = "SELECT SUM(paslon_1) as paslon_1, SUM(paslon_2) as paslon_2, SUM(paslon_3) as paslon_3 FROM hasil";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["paslon_1" => 0, "paslon_2" => 0, "paslon_3" => 0]);
}
?>

