<?php
require_once '../conn.php';
function logla($conn, $ad, $detay)
{
    $sql = "INSERT INTO loglar (ad, detay, tarih) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ad, $detay, date("d.m.Y - H:i:s")]);
}

?>