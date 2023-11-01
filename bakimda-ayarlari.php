<?php require_once 'header.php';
require_once '../conn.php';
require_once 'loglar.php'; ?>
    <div class="dashboard-content">
        <div class="dashboard-form">
            <div class="row">

                <!-- Profil -->
                <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30"> <!--sayfanın düzenini ve sütunlarını belirler. Bootstrap-->
                    <div class="dashboard-list-box"> <!--İçerik kutusu-->
                        <h4 class="gray">Bakımda Sayfası Ayarları</h4>
                        <div class="dashboard-list-box-static"><!--Bölümğn içeriği-->
                            <?php

                            $stmt = $conn->prepare("SELECT * FROM bakimda");
                            $stmt->execute();
                            $user = $stmt->fetch();

                            $logoPath = $user[0];
                            if (isset($_POST['guncelle'])) {

                                if (isset($_FILES['logoFile'])) {
                                    $targetDir = "../uploads/";
                                    $targetFile = $targetDir . basename($_FILES['logoFile']['name']);

                                    $tempFile = $_FILES['logoFile']['tmp_name'];

                                    if (move_uploaded_file($tempFile, $targetFile)) { //Eğer dosya başarıyla taşınır ve yüklenirse, bu blok çalışır ve
                                        // $logoPath değişkeni, yeni logo dosyasının yolunu içerir.
                                        $logoPath = $targetFile;
                                    }
                                }

                                $baslik = $_POST['baslik'];
                                $altBaslik = $_POST['altbaslik'];
                                $icerik = $_POST['icerik'];
                                $facebook = $_POST['facebook'];
                                $instagram = $_POST['instagram'];
                                $linkedin = $_POST['linkedin'];
                                $twitter = $_POST['twitter'];

                                $sql = "UPDATE bakimda SET baslik=?, icerik=?, alt_baslik=?, facebook=?, instagram=?, linkedin=?, twitter=?, logo=?";

                                $stmt = $conn->prepare($sql);

                                $stmt->execute([$baslik, $altBaslik, $icerik, $facebook, $instagram, $linkedin, $twitter, $logoPath]);

                                if ($stmt) {
                                    ?>
                                    <script>alert("Bakımda ayarları güncellendi")</script>
                                <?php
                                logla($conn, "Bakımda Ayarları Güncellendi", "Admin bakımda sayfası için ayarları güncelledi");
                                } else {
                                ?>
                                    <script>alert("HATA")</script>
                                    <?php
                                }
                            }
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data"> <!--Logo dosyasını yükler ve logoyu görüntüler.-->

                                <div class="edit-profile-photo">
                                    <img src="images/user-avatar.jpg" alt="">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i>Logo Yükle</span>
                                            <input type="file" class="upload" name="logoFile" />
                                        </div>
                                    </div>
                                </div>


                                <!-- Detaylar -->
                                <!-- "Logo Yolu" başlığı ve bir logo görüntüsünün yan yana olduğu bir etiketi temsil eder.-->
                                <label>Logo Yolu <img style="width: 50px; height: 50px; border-radius: 50%;"
                                    <!--görüntünin genişliğini ve yüksekliğini 50 piksel olarak ayarlar
                                    ve görüntüyü yuvarlak bir şekilde görüntüler.-->
                                    <!--$user[0], logo dosyasının mevcut yolunu temsil eder.-->
                                    src="<?= $user[0]; ?>" alt=""></label>

                                <input name="logoyol" disabled value="<?= $user[0]; ?>" type="text">
                                <!--logo dosyasının yolunu görüntüleyen bir metin girişini (input) temsil eder.-->

                                <label>Bakımda Başlığı</label>
                                <input name="baslik" value="<?= $user[1]; ?>" type="text">

                                <label>Bakımda Alt Başlık </label>
                                <input name="altbaslik" value="<?= $user[3]; ?>" type="text">

                                <label>Bakımda İçerik Yazısı</label>
                                <input name="icerik" value="<?= $user[2]; ?>" type="text">

                                <label>Facebook</label>
                                <input name="facebook" value="<?= $user[4]; ?>" type="text">

                                <label>Instagram</label>
                                <input name="instagram" value="<?= $user[5]; ?>" type="text">

                                <label>Linkedin</label>
                                <input name="linkedin" value="<?= $user[6]; ?>" type="text">

                                <label>Twitter</label>
                                <input name="twitter" value="<?= $user[7]; ?>" type="text">


                                <button name="guncelle" class="button">Değişiklikleri Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Content / End -->
<?php require_once 'footer.php'; ?>