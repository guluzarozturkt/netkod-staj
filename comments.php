<?php require_once 'header.php';
require_once '../conn.php'; ?>
    <div class="dashboard-content">

        <div class="row">

            <!-- Listeler -->
            <!--kullanıcıların yaptığı yorumları ve ilgili bilgileri bir tablo içinde görüntülemek için kullanılır-->
            <div class="col-lg-12 col-md-12"><!--sayfanın tam genişliğini kullanacak bir bölümü temsil eder.-->
                <div class="dashboard-list-box">
                    <h4 class="gray">Tüm Yorumlar</h4>
                    <div class="table-box">
                        <table class="basic-table booking-table">
                            <thead><!--Tablonun başlığı-->
                            <tr><!--Tablo başlığının bir satırı-->
                                <th>ID</th><!--Sütunlaer-->
                                <th>AD</th>
                                <th>YORUM</th>
                                <th>TARİH</th>
                                <th>BLOG_ID</th>
                                <th class="textright">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM yorumlar");
                            $stmt->execute();
                            while ($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row[0] . "</td>";
                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[2] . "</td>";
                                echo "<td>" . $row[3] . "</td>";
                                echo "<td>" . $row[4] . "</td>";
                                echo "<td>
                                 <a style=\"color:red\" href=\"sil.php?yorumid=$row[0]\">SİL</a> 
                                  </td>";
                                echo "</tr>";
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Bir sayfa numaralandırma (pagination)-->
                <div class="pagination-container">
                    <nav class="pagination">
                        <ul>
                            <li><a href="#" class="current-page">1</a></li>
                            <li><a href="#">2</a></li><!--bir sonraki sayfa numarasını temsil eder.
                        2 sayfa numarasını içerir ve bir bağlantıdır.-->
                            <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                            <!--Bir sonraki sayfaya gitmek için bir ok simgesi-->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'footer.php'; ?>