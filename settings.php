<?php
global $conn;
require_once '../conn.php';
require_once 'header.php';
require_once 'loglar.php';
?>
<div class="dashboard-content">
    <div class="dashboard">
        <div class="row">

            <!-- Profil -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Site Ayarları</h4>

                    <div class="dashboard-list-box-static">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM ayarlar");
                        $stmt->execute();
                        //SQL sorgusunu çalıştırır ve sonucu $user değişkenine atar. Mevcut ayarları veritabanından çeker.
                        $user = $stmt->fetch();// SQL sorgusu ile çekilen verileri almak için kullanılan bir PDO (PHP Data Objects) yöntemidir.
                        //$stmt->fetch();: Bir önceki SELECT sorgusundan dönen sonuç kümesindeki bir satırı alır ve bu satırı $user adlı bir diziyeatar.
                        //fetch(): Sonuç kümesindeki bir sonraki satırı döndürür. Her seferinde çağrıldığında sonraki satıra ilerler.

                        if (isset($_POST['kaydet'])) {
                            //Gönderildiğini ve formdaki kaydet adlı bir düğmenin tıklanıp tıklanmadığını kontrol eder.
                            // Kullanıcı formu göndermek istediğinde bu kod bloğu çalışır.

                            $logoPath = $user[4];
                            $ikonPath = $user[2];
                            //mevcut logo ve ikon yollarını saklar-->

                            if (isset($_FILES['logoFile'])) {
                                //logoFile" adlı dosya yüklemesi alanının formda seçilip seçilmediğini kontrol eder.
                                // Kullanıcı bir logo dosyası yüklemek istediğinde bu koşul doğru olur.
                                $targetDir = "../uploads/";
                                $targetFile = $targetDir . basename($_FILES['logoFile']['name']);

                                $tempFile = $_FILES['logoFile']['tmp_name'];
                                //Yüklenen geçici dosyanın geçici konumunu alır.

                                if (move_uploaded_file($tempFile, $targetFile)) {
                                    $logoPath = $targetFile;
                                    //yüklenen dosyayı geçici konumdan hedef konuma taşır.
                                    // Kullanıcının yüklediği logo dosyasını belirtilen hedef dizine kaydeder.
                                }
                            }

                            if (isset($_FILES['ikonFile'])) {
                                $targetDir = "../uploads/";
                                $targetFile = $targetDir . basename($_FILES['ikonFile']['name']);

                                $tempFile = $_FILES['ikonFile']['tmp_name'];

                                if (move_uploaded_file($tempFile, $targetFile)) {
                                    $ikonPath = $targetFile;
                                }
                            }

                            $baslik = $_POST['baslik'];
                            $aciklama = $_POST['aciklama'];
                            $kelimeler = $_POST['kelimeler'];
                            $bakim = $_POST['bakim'];


                            $sql = "UPDATE ayarlar SET baslik=?, aciklama=?, kelimeler=?, bakim=?, logo=?, ikon=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik, $aciklama, $kelimeler, $bakim, $logoPath, $ikonPath]);

                            if ($stmt) { ?>
                                <script> alert("Başarıyla güncellendi!"); </script> <!--alert = yukarıda gözüken hata, uyarı mesajı-->

                                <?php
                                logla($conn, "Site Ayarları Güncellendi", "Admin site ayarlarını güncelledi");
                            } else {
                                ?>
                                <script> alert("HATA!"); </script>
                                <?php
                            }

                        }


                        ?>
                        <form action="settings.php" method="POST" enctype="multipart/form-data">

                            <!-- Avatar -->

                            <div class="edit-profile-photo">
                                <img src="images/user-avatar.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i>İkon Yükle</span>
                                        <input type="file" name="ikonFile" class="upload" />
                                    </div>
                                </div>
                            </div>

                            <div class="edit-profile-photo">
                                <img src="images/user-avatar.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i>Logo Yükle</span>
                                        <input type="file" name="logoFile" class="upload" />
                                    </div>
                                </div>
                            </div>


                            <!-- Details -->

                            <label>Logo Yolu <img style="width: 50px; height: 50px; border-radius: 50%;"
                                    src="<?= $user[4]; ?>" alt=""></label>

                            <input name="logoyol" disabled value="<?= $user[4]; ?>" type="text">


                            <label>İkon Yolu <img style="width: 50px; height: 50px; border-radius: 50%;"
                                    src="<?= $user[2]; ?>" alt=""></label>
                            <input name="ikonyol" disabled value="<?= $user[2]; ?>" type="text">

                            <label>Site Başlığı</label>
                            <input name="baslik" value="<?= $user[0]; ?>" type="text">

                            <label>Site Açıklama</label>
                            <input name="aciklama" value="<?= $user[1]; ?>" type="text">

                            <label>Site Kelimeler</label>
                            <input name="kelimeler" value="<?= $user[3]; ?>" type="text">

                            <label>Site Bakım</label>
                            <select name="bakim" id="">
                                <?php
                                if ($user[5] == 0) {
                                    ?>
                                    <option value="1">Bakımda</option>
                                    <option selected value="0">Bakımda Değil</option>
                                    <?php
                                } else {
                                    ?>
                                    <option selected value="1">Bakımda</option>
                                    <option value="0">Bakımda Değil</option>
                                    <?php
                                }
                                ?>

                            </select>

                            <button name="kaydet" class="button">Değişiklikleri Kaydet</button>

                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

<!-- Content / End -->
<?php require_once 'footer.php'; ?>