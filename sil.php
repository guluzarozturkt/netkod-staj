<?php
global $conn;
require_once '../conn.php';
require_once 'loglar.php';

if (isset($_GET['mesajid'])) {
    $mesajID = $_GET['mesajid'];
    $sql = "DELETE FROM mesajlar WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$mesajID]);

    if ($stmt) {
        logla($conn, "Mesaj Silindi", "Admin bir mesajı sildi.");
        header("location: message.php");
    }
}

if (isset($_GET['uyeid'])) {
    $uyeID = $_GET['uyeid'];
    $sql = "DELETE FROM uyeler WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uyeID]);

    if ($stmt) {
        logla($conn, "Üye Silindi", "Admin bir üyeyi sildi.");
        //Loglama işlemi, sorun giderme, denetim, güvenlik ve performans iyileştirmesi için kullanılabilir.
        //Loglama bir uygulamanın veya sistemin çalışması sırasında önemli olayları veya bilgileri kaydetme işlemidir.
        header("location: members.php");
    }
}

//Yorumların silinme işlemi
if (isset($_GET['yorumid'])) {
    //Kullanıcının bir yorumu silmesi için yorumun ID'sini URL üzerinden taşıyarak ve bu parametreyi
    // GET yöntemiyle alarak işlem yapılmasını sağlar.

    $yorumID = $_GET['yorumid'];
    $sql = "DELETE FROM yorumlar WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$yorumID]);

    if ($stmt) {
        logla($conn, "Yorum Silindi", "Admin bir yorumu sildi.");
        header("location: comments.php");
    }
}


if (isset($_GET['blogid'])) {
    $blogID = $_GET['blogid'];
    $sql = "DELETE FROM bloglar WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$blogID]);

    if ($stmt) {
        logla($conn, "Blog Silindi", "Admin bir blog sildi.");
        header("location: edit-blog.php");
    }
}


if (isset($_GET['katid'])) {
    $katID = $_GET['katid'];
    $sql = "DELETE FROM kategoriler WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$katID]);

    if ($stmt) {
        logla($conn, "Kategori Silindi", "Admin bir kategoriyi sildi.");
        header("location: edit-cat.php");
    }
}



if (isset($_GET['sliderid'])) {
    $sliderID = $_GET['sliderid'];
    $sql = "DELETE FROM slider WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sliderID]);

    if ($stmt) {
        logla($conn, "Slider Silindi", "Admin bir slider sildi.");
        header("location: edit-slider.php");
    }
}
?>