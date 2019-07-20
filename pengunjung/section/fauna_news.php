<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW fauna news
 */
    $data = $DATABASE->select('SELECT * FROM fauna');
    $MAX_COL = 4;
?>
<div class="features-row">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="advanced-feature-img-left wow fadeInLeft " src="img/advanced-feature-2.jpg" alt="">
                <div class="wow fadeInRight">
                    <h2>{{ ANIMAL NEWS ...  }}</h2>
                    <div class="row">
                        <?php
                        foreach ($data as $animal){
                            $gambar = $animal->gambar?$animal->gambar:'/pengunjung/img/unknown.jpg';
                            ?>
                            <div class="col-3 text-center p-2">
                                <img class="img-fluid" src="<?=$gambar;?>">
                                <p><?= $animal->nama_fauna;?></p>
                            </div>
                            <?php
                        };
                        ?>
                    </div>

<!--                    <i class="ion-ios-paper-outline" class="wow fadeInRight" data-wow-duration="0.5s"></i>-->
<!--                    <p class="wow fadeInRight" data-wow-duration="0.5s">L{{ Blablabla ...  }}</p> <br>-->
<!--                    <i class="ion-ios-color-filter-outline wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>-->
<!--                    <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">{{ Blablabla ...  }}</p> <br>-->
<!--                    <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>-->
<!--                    <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">{{ Blablabla ...  }}</p>-->
                </div>
            </div>
        </div>
    </div>
</div>
