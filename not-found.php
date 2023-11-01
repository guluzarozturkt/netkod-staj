<?php require_once 'header.php';
require_once '../conn.php';
require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <!-- Profil -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Bulunamadı Ayarları</h4>
                    <div class="dashboard-list-box-static">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM bulunamadi");
                        $stmt->execute();
                        $user = $stmt->fetch();
                        if (isset($_POST['ekle'])) {
                            $baslik = $_POST['baslik'];
                            $aciklama = $_POST['aciklama'];
                            $sql = "UPDATE bulunamadi SET baslik=?, aciklama=?";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$baslik, $aciklama]);

                            logla($conn, "Bulunamadı Güncellendi", "Admin bulunamadı sayfasını güncelledi!");
                        }
                        ?>
                        <form action="" method="POST">

                            <label>Başlık Bulunamadı</label>
                            <input value="<?= $user[0] ?>" required name="baslik" type="text">
                            <!--required özelliği alanların doldurulması zorunlu olduğunu belirtir. Kullanıcı bu alanları boş bırakamaz.-->

                            <label>Açıklama Bulunamadı</label>
                            <textarea required name="aciklama" id="" cols="30" rows="10"><?= $user[0] ?></textarea>

                            <!--input ve textarea elemanları kullanıcının bu ayarları düzenlemesi için giriş alanlarını içerir.
                            "Başlık bulunamadı" için bir metin girişi ve "Açıklama Bulunamadı" için bir metin alanı vardır.-->

                            <button name="ekle" class="button">Değişiklikleri Kaydet</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>