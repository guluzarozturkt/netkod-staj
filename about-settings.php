<?php require_once 'header.php';//"header.php" dosyasını mevcut sayfada dahil etmeye çalışır.
//"require_once" işlevi, belirtilen dosyanın bir kez dahil edildiğinden ve daha önce
// dahil edilmişse tekrar dahil edilmediğinden emin olur.
require_once '../conn.php';
require_once 'loglar.php'; ?>
    <div class="dashboard-content"><!--sayfanın ana içeriğini tanımlar.-->
        <div class="dashboard-form">
            <div class="row">

                <!-- Profil -->
                <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                    <div class="dashboard-list-box">
                        <h4 class="gray">Hakkımda Ayarları</h4>
                        <div class="dashboard-list-box-static">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM hakkimda");
                            $stmt->execute();
                            $user = $stmt->fetch(); //Bu satır, sorgunun sonucundan gelen verileri alır ve
                            // bu verileri $user değişkenine atar. $user değişkeni, kullanıcının mevcut kişisel
                            // bilgilerini içerir.//

                            if (isset($_POST['kaydet'])) {
                                $benKimim = $_POST['benkimim'];
                                $hangiUlkelereGittim = $_POST['hangiulkeler'];
                                $begendiginUlke = $_POST['begendiginulke'];
                                $ozluSoz = $_POST['ozlusoz'];
                                $ozluSozSahibi = $_POST['ozlusozsahibi'];

                                $sql = "UPDATE hakkimda SET ben_kimim=?, nerelere_gittim=?, en_begendigim_yer=?, ozlu_soz=?, ozlu_soz_sahibi=?";

                                // ? kullandık çünkü dışarıdan gelen verileri güvenli bir şekilde SQL sorgularına entegre
                                // etmek için kullanılır.

                                $stmt = $conn->prepare($sql);
                                //prepare =  PDO bağlantısı üzerinden verilen SQL sorgusunu hazırlama işlemini gerçekleştirir.

                                $stmt->execute([$benKimim, $hangiUlkelereGittim, $begendiginUlke, $ozluSoz, $ozluSozSahibi]);

                                logla($conn, "Hakkımda Güncellendi", "Admin hakkımda sayfasını güncelledi!");
                            }
                            ?>
                            <form action="" method="POST">
                                <label>Ben Kimim?</label>
                                <textarea name="benkimim" id="" cols="30" rows="10"><?= $user[0] ?></textarea><!--metin girişi alanının
                            sütun ve satır sayısını belirtir. Bu, metin girişi alanının ne kadar geniş
                            ve yüksek olduğunu belirler.-->

                                <!--  ?= $user[0] ?   mevcut kullanıcının "Ben Kimim?" bilgisinin bu metin girişi
                                alanında görüntülenmesini sağlar. Kullanıcı bu bilgiyi düzenleyebilir.-->

                                <label>Hangi Ülkelere Gittim</label>
                                <textarea name="hangiulkeler" id="" cols="30" rows="10"><?= $user[1] ?></textarea>

                                <label>En Beğendiğim Ülke</label>
                                <input value="<?= $user[2] ?>" name="begendiginulke" type="text">

                                <label>Özlü Söz</label>
                                <input value="<?= $user[3] ?>" name="ozlusoz" type="text">

                                <label>Özlü Söz Sahibi</label>
                                <input value="<?= $user[4] ?>" name="ozlusozsahibi" type="text">

                                <button name="kaydet" class="button">Değişiklikleri Kaydet</button>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>