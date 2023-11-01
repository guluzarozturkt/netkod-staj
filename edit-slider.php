<?php require_once 'header.php';
require_once '../conn.php';


?>
<div class="dashboard-content">
    <style>
        button a {
            color: #fff;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .blog-list {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .blog-item {
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .blog-image {
            flex: 1;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
        }

        .blog-content {
            flex: 3;
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
            cursor: pointer;
            margin-right: 10px;
        }

        .edit-btn {
            background-color: #4caf50;
        }
    </style>
    <div class="row">

        <!-- Listeler -->
        <!--slider= slayt, sürükleme vb. hareketidir-->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Slider Düzenle</h4>
                <div class="blog-list">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM slider");
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        ?>
                        <div class="blog-item">
                            <div class="blog-image">
                                <img src="<?= $row[4]; ?>" alt="Blog Resmi">
                            </div>
                            <div class="blog-content">

                                <h2>
                                    <?= $row[2] ?>
                                </h2>
                                <p>
                                    <?php echo $row[3] ?>
                                </p>
                                <div class="actions">
                                    <button class="delete-btn">
                                        <a href="sil.php?sliderid=<?= $row[0] ?>">Sil</a>
                                    </button>

                                    <button class="edit-btn"><a
                                            href="duzenle-slider.php?sliderid=<?= $row[0] ?>">Düzenle</a></button>
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