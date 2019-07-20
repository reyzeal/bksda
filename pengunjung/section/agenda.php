<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW agenda pengunjung
 */
    $data = $DATABASE->select('SELECT * FROM agenda order by waktu desc limit 5');
?>
<div class="features-row section-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="advanced-feature-img-right wow fadeInRight" src="img/advanced-feature-1.jpg" alt="">
                <div class="wow fadeInLeft">
                    <h2>{{ AGENDA Blablabla ...  }}</h2>
                    <?php foreach ($data as $agenda){
                        echo "
                            <article>
                                <h3>$agenda->judul</h3>
                                <p>$agenda->deskripsi</p>
                                <p>$agenda->waktu</p>
                            </article>
                        ";
                    }?>

                </div>
            </div>
        </div>
    </div>
</div>