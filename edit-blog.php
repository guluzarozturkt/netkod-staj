<?php require_once 'header.php';
require_once '../conn.php';

function kisalt($metin, $uzunluk = 100, $ek = '...')
    //İlk parametre ($metin), kısaltılacak metni temsil eder. İkinci parametre ($uzunluk), metni kaç karaktere
    // kadar kısaltmak istediğinizi belirtir. Üçüncü parametre ($ek), metni kısalttıktan sonra eklemek
    // istediğiniz ekstra bir karakter dizisini belirtir.
{
    if (mb_strlen($metin) <= $uzunluk) {
        //metnin uzunluğunu kontrol eder. Eğer metin belirtilen uzunluktan daha kısa veya eşitse
        // metni değiştirmeden aynı şekilde döndürür.
        return $metin;
    } else {
        return mb_substr($metin, 0, $uzunluk) . $ek;
        //Tersiyse metni belirtilen uzunluğa kadar kısaltır ve $ek parametresi ile belirtilen ek karakter dizisini ekler.
        // Bu kısaltılmış metin sonuç olarak döndürülür.
    }
}

?>
<div class="dashboard-content">
    <style>
        button a {
            color: #fff;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0; /* Dış kenarındaki (margin) boşluğu sıfırlar. Tüm elemanlar arasındaki boşlukları kaldırır.*/
            padding: 0; /* Elemanların içeriği ile kenarları arasındaki boşlukları kaldırır.*/
            background-color: #f0f0f0;
        }

        .blog-list {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .blog-item {
            display: flex;/* yatay veya dikey olarak hizalamak */
            border: 1px solid #ddd;
            margin-bottom: 20px; /*Alt boşluk (margin) ekler ve bu boşluk 20 piksel genişliğindedir.
            her .blog-item öğesinin altında 20 piksel boşluk olur.*/
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .blog-image {
            flex: 1; /*Eşit paylaş alanı genişliği */
        }

        .blog-image img {
            width: 100%; /* tam genişliğini kaplar.Resmin yatay eksendeki boyutunu ekrana sığdırır. */
            height: 100%;
        }

        .blog-content {
            flex: 3;
            /*flex-grow: 2; Genişleme faktörü
            flex-shrink: 0; Daralma faktörü
            flex-basis: 100px; Başlangıç boyutu */
            padding: 20px;
        }

        .blog-content h2 {
            margin: 0;
            font-size: 24px;
        }

        .blog-content p {
            margin-top: 10px;
            font-size: 16px;
        }

        .actions {
            margin-top: 20px;
        }

        .delete-btn,
        .edit-btn {
            padding: 5px 10px;
            border: none;
            background-color: #f44336;
            color: white;
            font-size: 14px;
            cursor: pointer; /*İmleç öğenin üzerine geldiğinde bir el işareti (işaretçi) olarak değiştirilir*/
            margin-right: 10px;
        }

        .edit-btn {
            background-color: #4caf50;
        }
    </style>
    <div class="row">

        <!-- Listeler -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Blogları Düzenle</h4>
                <div class="blog-list">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM bloglar");
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        ?>
                            <!--blog gönderisinin listesini temsil eden bir öğeyi gösteren bir şablonu içerir.
                            Bu şablon, blog gönderilerinin başlıklarını, tarihlerini, kısa özetlerini ve düzenleme/silme
                            seçeneklerini içerir.-->

                        <div class="blog-item"><!--Tüm blog öğelerini gruplar. item =öge -->
                            <div class="blog-image">
                                <img src="<?= $row[5]; ?>" alt="Blog Resmi">
                            </div>
                            <div class="blog-content"><!--Blog gönderisinin içeriğini içeren bir bölüm.
                            Tarih, başlık, özet ve düzenleme/silme seçeneklerini içerir.-->
                                <span class="date">
                                    <?= $row[4] ?>
                                </span>
                                <h2>
                                    <?= $row[1] ?>
                                </h2>
                                <p>
                                    <?php echo kisalt($row[2], 150, '...') ?>
                                </p>
                                <div class="actions"><!--Düzenleme ve silme seçeneklerini içerir.-->
                                    <button class="delete-btn">
                                        <a href="sil.php?blogid=<?= $row[0] ?>">Sil</a>
                                    </button>

                                    <button class="edit-btn"><a
                                            href="duzenle-blog.php?blogid=<?= $row[0] ?>">Düzenle</a></button>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <!-- Diğer bloglar buraya eklenebilir -->
                </div>
            </div>



            <!-- <div class="pagination-container">
                <nav class="pagination">
                    <ul>
                        <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>
</div>


<?php require_once 'footer.php'; ?>