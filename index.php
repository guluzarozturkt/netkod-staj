<?php require_once './header.php';
require_once '../conn.php'; ?>
<div class="dashboard-content">
    <div class="row">
        <?php
        $stmt = $conn->prepare("SELECT * FROM kategoriler");
        $stmt->execute();
        $kategoriAdet = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT * FROM bloglar");
        $stmt->execute();
        $blogAdet = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT * FROM uyeler");
        $stmt->execute();
        $uyelerAdet = $stmt->rowCount();

        $stmt = $conn->prepare("SELECT * FROM yorumlar");
        $stmt->execute();
        $yorumlarAdet = $stmt->rowCount();

        ?>
        <!-- Item -->
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content">
                    <h4>
                        <?= $kategoriAdet; ?>
                    </h4> <span>Kategoriler</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
                <div class="dashboard-stat-item">

                </div>
            </div>
        </div>

        <!-- Öge -->
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content">
                    <h4>
                        <?= $blogAdet; ?>
                    </h4> <span>Toplam Blog Post</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
                <div class="dashboard-stat-item">

                </div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content">
                    <h4>
                        <?= $uyelerAdet; ?>
                    </h4> <span>Toplam Üyeler</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
                <div class="dashboard-stat-item">

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content">
                    <h4>
                        <?= $yorumlarAdet; ?>
                    </h4> <span>Toplam Yorum</span>
                </div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
                <div class="dashboard-stat-item">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 traffic">
            <div class="dashboard-list-box">
                <h4 class="gray">Son 5 Blog</h4>
                <div class="table-box">
                    <table class="basic-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Başlık</th>
                                <th>İçerik</th>
                                <th>Etiketler</th>
                                <th>Tarih</th>
                                <th>Resim</th>
                                <th>Kategori</th>

                            </tr>
                        </thead>
                        <tbody>
                        <!--son 5 blog gönderisini bir HTML tablosunda görüntüler-->
                        <!--prepare=hazırlamak-->
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM bloglar ORDER BY id DESC LIMIT 5");
                            $stmt->execute();
                            while ($user = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $user[0] . "</td>";
                                echo "<td>" . $user[1] . "</td>";
                                echo "<td>" . $user[2] . "</td>";
                                echo "<td>" . $user[3] . "</td>";
                                echo "<td>" . $user[4] . "</td>";
                                echo "<td>" . $user[5] . "</td>";
                                echo "<td>" . $user[6] . "</td>";

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Son Aktivite -->
        <div class="col-lg-7 col-md-12 col-xs-12 traffic">
            <div class="dashboard-list-box with-icons margin-top-20">
                <h4 class="gray">Son 5 Aktivite</h4>
                <ul>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM loglar ORDER BY id DESC LIMIT 5");
                    $stmt->execute();
                    while ($user = $stmt->fetch()) { ?>
                        <li>
                            <i class="list-box-icon sl sl-icon-star"></i><!--sl sl-icon-star" sınıfı bir
                            yıldız ikonunu temsil eder-->
                            <?= $user[2] ?>

                            <a class="close-list-item"><i class="fa fa-close"></i></a>
                            <!--fa-fa =font awesome-->
                        </li>
                    <?php }
                    ?>

                </ul>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-xs-12 traffic">
            <div class="dashboard-list-box margin-top-20 user-list">
                <h4 class="gray">Son 5 Üye</h4>
                <ul>

                    <?php
                    $stmt = $conn->prepare("SELECT * FROM uyeler ORDER BY id DESC LIMIT 5");
                    $stmt->execute();
                    while ($user = $stmt->fetch()) { ?>
                        <li>
                            <div class="user-list-item">
                                <div class="user-list-image">
                                    <img src="../images/gülüzar.jpg" alt="">
                                </div>
                                <div class="user-list-content">
                                    <h4>
                                        <?= $user[1] . " " . $user[2] ?>
                                    </h4>
                                    <span>
                                        <?php echo $user[5] ?>
                                    </span>
                                </div>

                            </div>
                        </li>
                    <?php }
                    ?>


                </ul>
            </div>
        </div>
    </div>

</div>
<?php require_once './footer.php'; ?>