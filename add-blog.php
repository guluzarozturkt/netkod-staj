<?php require_once 'header.php';
require_once '../conn.php';
require_once 'loglar.php';
date_default_timezone_set('Europe/Istanbul');
?>
    <div class="dashboard-content">
        <div class="dashboard-form">
            <div class="row">

                <!-- Profil -->
                <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Blog Kategori Ekle</h4>
                        <form action="" method="POST">
                            <label>Kategori İsmi</label>
                            <input required name="kat-isim" type="text">
                            <button name="kat-ekle" class="button">Kategori Ekle Ekle</button>
                        </form> <br>
                        <h4 class="gray">Blog Ekle</h4>
                        <div class="dashboard-list-box-static">


                            <?php

                            if (isset($_POST['kat-ekle'])) {
                                $katIsim = $_POST['kat-isim'];

                                $sql = "INSERT INTO kategoriler (ad, tarih) VALUES (?,?)";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$katIsim, date("d.m.Y - H:i:s")]);

                                //sorgunun içindeki ilk "?" yerine $katIsim değişkeninin değeri yerleştirilir.

                                logla($conn, "Yeni Kategori Eklendi", "Admin yeni bir kategori ekledi!");
                            }


                            $ikonPath = ""; //ikon yolu
                            if (isset($_POST['ekle'])) { // isset = var mı yok mu

                                // Kullanıcının bir resim yüklediği durumu ele alır ve bu resmi sunucuya kaydeder.

                                if (isset($_FILES['resim'])) {

                                    //HTML formunda bir "ekle" adında bir POST değişkeninin gönderilip gönderilmediğini kontrol eder.
                                    // Kullanıcı bir formu doldurup "ekle" düğmesine bastığında bu blok çalışır.

                                    $targetDir = "../uploads/"; // yüklenen dosyanın nereye kaydedileceğini belirler.

                                    $targetFile = $targetDir . basename($_FILES['resim']['name']); //basename işlevi, dosyanın adını
                                    // (yani dosya adı ve uzantısı) alır ve hedef dizin ile birleştirir.

                                    $tempFile = $_FILES['resim']['tmp_name']; //Geçici yüklenen dosyanın yolunu alır.
                                    // Yüklenen dosyalar genellikle sunucunun geçici dizininde saklanır ve
                                    // geçici dosyanın nerede olduğunu gösterir.

                                    if (move_uploaded_file($tempFile, $targetFile)) { //Dosyanın geçici konumdan hedef bir konuma taşındığı
                                        // yerdir dosya yükleme işlemlerinin sonunda kullanılır.
                                        $ikonPath = $targetFile;
                                    }
                                }

                                $baslik = $_POST['baslik'];
                                $icerik = $_POST['icerik'];
                                $etiketler = $_POST['etiket'];
                                $kategori = $_POST['kategori'];

                                $sql = "INSERT INTO bloglar (baslik, icerik, etiketler, tarih, kategori, resim) VALUES (?,?,?,?,?,?)";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$baslik, $icerik, $etiketler, date("d.m.Y - H:i:s"), $kategori, $ikonPath]);
                                logla($conn, "Yeni Blog Eklendi", "Admin yeni bir blog ekledi!");
                            }
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">

                                <!--action="": Formun verileri nereye gönderileceğini belirtir.
                                Boş bir değer ("") kullanıldığında, formun verileri aynı sayfaya gönderilecektir.-->

                                <!--enctype="multipart/form-data": Formun dosya yüklemesi yapacağını ve
                                bu nedenle verilerin çoklu parçalı (multipart) bir yapıda gönderilmesi gerektiğini belirtir.
                                Dosya yükleme işleminin çalışabilmesi için gereklidir.-->

                                <div class="edit-profile-photo">
                                    <img src="images/user-avatar.jpg" alt="">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i>Resim Yükle</span>
                                            <input type="file" class="upload" name="resim" />
                                        </div>
                                    </div>
                                </div>




                                <label>Blog Başlığı</label>
                                <input required name="baslik" type="text">

                                <label>Blog İçeriği</label>
                                <textarea name="icerik" id="" cols="30" required rows="10"></textarea>

                                <label>Blog Etiketler (virgül ile ayırın)</label>
                                <input required name="etiket" type="text">

                                <label>Kategori</label>

                                <select required name="kategori" id=""> <!--Kullanıcılara veritabanından alınan kategoriler arasından
                            bir kategori seçme seçeneği sunar. Seçilen kategori, "kategori" adı altında formun gönderildiği
                            sayfaya gönderilir ve daha sonra kullanılabilir.-->
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM kategoriler");
                                    $stmt->execute();

                                    while ($row = $stmt->fetch()) { //Bu döngü, veritabanından çekilen her bir kategori için bir seçenek oluşturur.
                                        // Her döngü adımında, $row değişkeni, bir kategori kaydını temsil eder.
                                        ?>
                                        <option value="<?= $row[1] ?>">
                                            <?= $row[1] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>




                                <button name="ekle" class="button">Blog Ekle</button>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Content / End -->
<?php require_once 'footer.php'; ?>