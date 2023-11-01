<?php require_once 'header.php';
require_once '../conn.php';
require_once 'loglar.php'; ?>
<div class="dashboard-content">
    <div class="dashboard-form">
        <div class="row">

            <!-- Profil -->
            <div class="col-lg-6 col-md-6 col-xs-12 padding-right-30">
                <div class="dashboard-list-box">
                    <h4 class="gray">Footer Ayarları</h4> <!--Footer = sitenin alt kısmında bulunan bölümdür-->
                    <div class="dashboard-list-box-static">

                        <?php
                        $stmt = $conn->prepare("SELECT * FROM footer");
                        $stmt->execute();
                        $user = $stmt->fetch();

                        if (isset($_POST['gonder'])) {
                            $tanitim = $_POST['tanitim'];
                            $linkler = $_POST['linkler'];
                            $facebook = $_POST['face'];
                            $instagram = $_POST['insta'];
                            $twitter = $_POST['twit'];
                            $linkedin = $_POST['linkedin'];

                            $sql = "UPDATE footer SET tanitim=?, linkler=?, facebook=?, instagram=?, twitter=?, linkedin=?";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$tanitim, $linkler, $facebook, $instagram, $twitter, $linkedin]);

                            logla($conn, "Footer Güncellendi", "Admin footer bilgilerini güncelledi!");
                        }
                        ?>


                        <form action="" method="POST">
                            <label>Footer Tanıtım</label>
                            <input name="tanitim" value="<?= $user[0] ?>" type="text">

                            <label>Footer Linkler</label>
                            <textarea name="linkler" id="" cols="30" rows="10"><?= $user[1] ?></textarea>

                            <label>Footer Facebook</label>
                            <input name="face" value="<?= $user[2] ?>" type="text">

                            <label>Footer Instagram</label>
                            <input name="insta" value="<?= $user[3] ?>" type="text">

                            <label>Footer Twitter</label>
                            <input name="twit" value="<?= $user[4] ?>" type="text">

                            <label>Footer Linkedin</label>
                            <input name="linkedin" value="<?= $user[5] ?>" type="text">

                            <button name="gonder" class="button">Değişiklikleri Kaydet</button>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!--içerik sonu-->
<?php require_once 'footer.php'; ?>