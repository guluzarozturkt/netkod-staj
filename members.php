<?php global $conn;
require_once 'header.php';
require_once '../conn.php'; ?>
<div class="dashboard-content">

    <div class="row">
        <!--members=üyeler-->

        <!-- Listeler -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box">
                <h4 class="gray">Mevcut Üyeler</h4>
                <div class="table-box">
                    <table class="basic-table booking-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>EMAİL</th>
                                <th>ŞİFRE</th>
                                <th>TARİH</th>
                                <th class="textright">ÜYEYLE İLGİLİ İŞLEMLER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM uyeler");
                            $stmt->execute();
                            while ($row = $stmt->fetch()) { //Veritabanı sorgusundan alınan verileri döngü içinde işlemek için
                                // while döngüsü başlatır. Her döngüde bir satır $row değişkenine atanır.

                                echo "<tr>"; //tr = yeni satır

                                echo "<td>" . $row[0] . "</td>";//her sütun (kolon) verisi ayrı ayrı td ye eklenir ve ekrana yazdırılır.
                                // Bu örnekte $row[0], verinin birinci sütununu temsil eder.

                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[2] . "</td>";
                                echo "<td>" . $row[3] . "</td>";
                                echo "<td>" . $row[4] . "</td>";
                                echo "<td>" . $row[5] . "</td>";
                                echo "<td style=\"display:flex; justify-content:center; \">
                                 <a class=\"btn btn-danger\" href=\"sil.php?uyeid=$row[0]\">SİL</a> <!--SİL işlemi için bir bağlantı oluşturur. 
                                 row[0], döngü içindeki verinin birinci sütununu temsil eder ve bu değer sil.php sayfasına aktarılır.-->
                                 
                                 <a style=\"margin: 0px 5px;\" class=\"btn btn-success\" href=\"uyeguncelle.php?uyeid=$row[0]\">GÜNCELLE</a> 
                                  </td>"; /* GÜNCELLE işlemi için bir bağlantı oluşturur. row[0] değeri uyeguncelle php sayfasına aktarılır.*/
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
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