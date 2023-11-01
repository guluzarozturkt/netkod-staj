<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">

<head>
    <!--Header = sitenin üst kısmında bulunan bölümdür.-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="BLOG HABER VE DERGİ">

    <title>Blog Uygulaması | Admin</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/moon.png">
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Still dosyaları CSS-->
    <link href="../css/default.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../font/flaticon.php" rel="stylesheet" type="text/css">
    <link href="../css/plugin.css" rel="stylesheet" type="text/css">
    <link href="../css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="../css/icons.css" rel="stylesheet" type="text/css">

    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!--PRELOADER / Önceden Yükleyici -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div id="container-wrapper">
        <!-- Dashboard(Panel) = Web sitesinin admin paneli -->
        <div id="dashboard">

            <!-- Responsive Navigation Trigger = Mobil cihazlarda görüntülenen açılır menünün tetikleyici butonu -->
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i>Menü</a>

            <div class="dashboard-sticky-nav">
                <div class="content-left pull-left">
                    <a href="index.php"><img src="../images/logo.png" alt="logo"></a>
                </div>
                <div class="content-right pull-right">
                    <div class="search-bar">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" placeholder="Şimdi Ara">
                                <a href="#"><span class="search_btn"><i class="fa fa-search"
                                            aria-hidden="true"></i></span></a>
                                <!-- aria-hidden = true = Metin, ekran okuyucular tarafından görmezden gelinir.-->
                            </div>
                        </form>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <!--ata-toggle="dropdown" özelliği, "Açılır Menü"
                            düğmesine tıklandığında ilgili açılır menünün görüntülenmesini sağlar.-->

                            <!-- dta-toggle = bootstrap.
                            Kullanıcının tıkladığında bir açılır menünün görünmesini veya gizlenmesini sağlar-->
                            <div class="profile-sec">
                                <div class="dash-image">
                                    <img src="../images/gülüzar.jpg" alt="">
                                </div>
                                <div class="dash-content">
                                    <h4>Gülüzar</h4>
                                    <span>Admin</span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="sl sl-icon-power"></i>Çıkış Yap</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-item">
                                <i class="sl sl-icon-envelope-open"></i>
                                <span class="notify">3</span>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <!--notification = bildirim-->
                            <h4> 23 Mesaj</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="notification-item">
                                            <div class="notification-image">
                                                <img src="../images/gülüzar.jpg" alt="">
                                            </div>
                                            <div class="notification-content">
                                                <p>Bildirim</p><span class="notification-time">2 saat önce</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="notification-item">
                                            <div class="notification-image">
                                                <img src="../images/gülüzar.jpg" alt="">
                                            </div>
                                            <div class="notification-content">
                                                <p>Bildirim</p><span class="notification-time">2 saat önce</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="notification-item">
                                            <div class="notification-image">
                                                <img src="../images/gülüzar.jpg" alt="">
                                            </div>
                                            <div class="notification-content">
                                                <p>Bildirim</p><span class="notification-time">2 saat önce</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <p class="all-noti"><a href="#">Tüm mesajları gör</a></p>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <div class="dropdown-item">
                                <i class="sl sl-icon-bell"></i>
                                <span class="notify">+99</span>
                            </div>
                        </a>
                        <div class="dropdown-menu notification-menu">
                            <h4> 599 Bildirim</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="notification-item">
                                            <div class="notification-image">
                                                <img src="../images/gülüzar.jpg" alt="">
                                            </div>
                                            <div class="notification-content">
                                                <p>Bildirim</p><span class="notification-time">2 saat
                                                    önce</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="notification-item">
                                            <div class="notification-image">
                                                <img src="../images/gülüzar.jpg" alt="">
                                            </div>
                                            <div class="notification-content">
                                                <p>Bildirim</p><span class="notification-time">2 saat önce</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="notification-item">
                                            <div class="notification-image">
                                                <img src="../images/gülüzar.jpg" alt="">
                                            </div>
                                            <div class="notification-content">
                                                <p>Bildirim</p><span class="notification-time">2 saat önce</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <p class="all-noti"><a href="#">Tüm bildirimleri gör</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">
                    <ul>


                        <li class="active"><a href="index.php"><i class="sl sl-icon-settings"></i>Kontrol Paneli</a>
                        </li>

                        <li><a href="settings.php"><i class="sl sl-icon-settings"></i>Site Ayarları</a>
                        </li>

                        <li><a href="bakimda-ayarlari.php"><i class="sl sl-icon-settings"></i>Bakımda
                                Ayarları</a>
                        </li>
                        <li>
                            <a><i class="sl sl-icon-layers"></i>Blog & Kategori İşlemleri</a>
                            <ul>
                                <li><a href="add-blog.php">Blog Ekle</a></li>

                                <li><a href="edit-blog.php">Blog Düzenle</a></li>

                                <li><a href="edit-cat.php">Kategori Düzenle</a></li>

                            </ul>
                        </li>

                        <li><a href="not-found.php"><i class="sl sl-icon-settings"></i>Bulunamadı
                                Ayarları</a>
                        </li>

                        <li><a href="footer-settings.php"><i class="sl sl-icon-settings"></i>Footer Ayarları</a>
                        </li>

                        <li><a href="about-settings.php"><i class="sl sl-icon-settings"></i>Hakkımda Ayarları</a>
                        </li>

                        <li><a href="message.php"><i class="sl sl-icon-settings"></i>Mesajlar</a>
                        </li>

                        <li>
                            <a><i class="sl sl-icon-layers"></i>Slider İşlemleri</a>
                            <ul>
                                <li><a href="sliders.php">Slider Ekle</a></li>

                                <li><a href="edit-slider.php">Slider Düzenle</a></li>
                            </ul>
                        </li>

                        <li><a href="sss.php"><i class="sl sl-icon-settings"></i>Sık Sorulan Sorular Ayarları</a>
                        </li>

                        <li><a href="members.php"><i class="sl sl-icon-user"></i>Üyeler</a>
                        </li>

                        <li><a href="comments.php"><i class="sl sl-icon-settings"></i>Yorumlar</a>
                        </li>

                        <li><a href="log-listele.php"><i class="sl sl-icon-settings"></i>Tüm Logları Görüntüle</a>
                        </li>
                    </ul>
                </div>
            </div>