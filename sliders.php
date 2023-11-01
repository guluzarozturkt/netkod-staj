<?php global $conn;
require_once 'header.php';
require_once '../conn.php';
require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <!-- Profil -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Slider Ayarları</h4>
                    <div class="dashboard-list-box-static">
                        <?php
                        $resimPath = "";
                        if (isset($_POST['ekle'])) {

                            if (isset($_FILES['resim'])) {
                                $targetDir = "../uploads/";
                                $targetFile = $targetDir . basename($_FILES['resim']['name']);

                                $tempFile = $_FILES['resim']['tmp_name'];

                                if (move_uploaded_file($tempFile, $targetFile)) {
                                    $resimPath = $targetFile;
                                }

                            }

                            $etiket = $_POST["etiket"];
                            $baslik = $_POST["baslik"];
                            $aciklama = $_POST["aciklama"];

                            $sql = "INSERT INTO slider (etiket, baslik, aciklama, resim) VALUES (?,?,?,?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$etiket, $baslik, $aciklama, $resimPath]);

                            logla($conn, "Yeni Slider Eklendi", "Admin yeni bir slider ekledi!");
                        }

                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <img src="images/user-avatar.jpg" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i>Resim Yükle</span>
                                        <input name="resim" type="file" class="upload" />
                                    </div>
                                </div>
                            </div>
                            <!-- Detaylar -->

                            <label>Etiketler</label>
                            <input name="etiket" type="text">

                            <label>Slider Başlık</label>
                            <input name="baslik" type="text">


                            <label>Slider Açıklama</label>
                            <input name="aciklama" type="text">





                            <button name="ekle" class="button">Yeni Slider Ekle</button>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>