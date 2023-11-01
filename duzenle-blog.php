<?php
ob_start();
require_once '../conn.php';
date_default_timezone_set('Europe/Istanbul');
require_once 'loglar.php';
?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <!-- Profil -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">

                    <h4 class="gray">Blog Düzenle</h4>
                    <div class="dashboard-list-box-static">


                        <?php
                        if (isset($_GET['blogid'])) {
                            $id = $_GET['blogid'];
                            $stmt = $conn->prepare("SELECT * FROM bloglar WHERE id=?");
                            $stmt->execute([$id]);

                            $user = $stmt->fetch();
                        } else {
                            header('location: index.php');
                        }

                        $ikonPath = $user[5];
                        if (isset($_POST['ekle'])) {
                            $id = $_GET['blogid'];
                            if (isset($_FILES['resim'])) {
                                $targetDir = "../uploads/";
                                $targetFile = $targetDir . basename($_FILES['resim']['name']);

                                $tempFile = $_FILES['resim']['tmp_name'];

                                if (move_uploaded_file($tempFile, $targetFile)) {
                                    $ikonPath = $targetFile;
                                }
                            }

                            $baslik = $_POST['baslik'];
                            $icerik = $_POST['icerik'];
                            $etiketler = $_POST['etiket'];
                            $kategori = $_POST['kategori'];

                            $sql = "UPDATE bloglar SET baslik=?, icerik=?, etiketler=?, tarih=?, resim=?, kategori=? WHERE id=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik, $icerik, $etiketler, date("d.m.Y - H:i:s"), $ikonPath, $kategori, $id]);

                            logla($conn, "Blog Güncellendi", "Admin bir blog güncelledi!");
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">

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
                            <input required name="baslik" type="text" value="<?= $user[1] ?>">

                            <label>Blog İçeriği</label>
                            <textarea name="icerik" id="" cols="30" required rows="10"><?= $user[2] ?></textarea>

                            <label>Blog Etiketler (virgül ile ayırın)</label>
                            <input required name="etiket" type="text" value="<?= $user[3] ?>">

                            <label>Kategori</label>

                            <select required name="kategori" id="">
                                <?php
                                $katID = $user[6];
                                $stmt = $conn->prepare("SELECT * FROM kategoriler");
                                $stmt->execute();

                                while ($row = $stmt->fetch()) {
                                    if ($katID == $row[1]) {
                                        ?>
                                        <option selected value="<?= $row[1] ?>">
                                            <?= $row[1] ?>
                                        </option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?= $row[1] ?>">
                                            <?= $row[1] ?>
                                        </option>
                                        <?php
                                    }

                                }
                                ?>
                            </select>




                            <button name="ekle" class="button">Blog Güncelle</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>