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
                    <h4 class="gray">Sık Sorulan Sorular </h4>
                    <div class="dashboard-list-box-static">

                        <?php
                        if (isset($_POST['ekle'])) {
                            $baslik = $_POST['baslik'];
                            $icerik = $_POST['cevap'];

                            $sql = "INSERT INTO sss (baslik, icerik) VALUES (?,?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik, $icerik]);

                            logla($conn, "Yeni Soru-Cevap Eklendi", "Admin yeni bir Sık Sorulan Soru ekledi!");
                        }
                        ?>

                        <form action="" method="POST">
                            <label>Soru Başlığı</label>
                            <input name="baslik" type="text">

                            <label>Soru Cevabı</label>
                            <textarea name="cevap" id="" cols="30" rows="10"></textarea>


                            <button name="ekle" class="button">Soruyu Ekle</button>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>