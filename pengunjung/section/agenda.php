<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW agenda pengunjung
 */
    $data = $DATABASE->select('SELECT * FROM agenda order by waktu desc limit 5');
?>
<div class="features-row section-bg" id="agenda">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h2>Agenda BKSDA</h2>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                            <?php
                                $i =0;
                                foreach ($data as $card){
                                    if(!$i){
                                       $collapse = '';
                                       $show = 'show';
                                    }else{
                                        $collapse ='class="collapsed"';
                                        $show = '';
                                    }
                                    $i++;
                                    $time = strtotime($card->waktu);
                                    $day = date('d',$time);
                                    $numericDay = $day;
                                    $weekday = date('l',strtotime("Sunday +{$numericDay} days"));
                                    $month = date('F',$time);
                                    $year = date('Y',$time);
                                    $deskripsi = explode(' ',$card->deskripsi);
                                    $deskripsi = array_slice($deskripsi,0,40);
                                    $deskripsi = implode(' ',$deskripsi);

                                    echo "<div class='row'>
                                           <div class='col-2'><time datetime=\"$card->waktu\" class=\"date-as-calendar position-em size1x\">
                                            <span class=\"weekday\">$weekday</span>
                                            <span class=\"day\">$day</span>
                                            <span class=\"month\">$month</span>
                                            <span class=\"year\">$year</span>
                                            </time></div>
                                           <div class='col-10'>
                                                <h3 class='font-weight-bold'>$card->judul</h3>
                                                <p>$deskripsi <a href='/pengunjung/agenda.php?id=$card->id'>Baca selengkapnya..</a></p>
                                           </div>
                                        </div>";
//                                    echo "<div class='card'>
//
//                                <!-- Card header -->
//                                <div class='card-header' role='tab' id='headingOne$i'>
//                                    <a $collapse data-toggle='collapse' data-parent='#accordionEx' href='#collapseOne$i' aria-expanded='true'
//                                       aria-controls='collapseOne1'>
//                                        <h5 class='mb-0'>
//                                            #$i $card->judul
//                                        </h5>
//                                    </a>
//                                </div>
//                                <div id='collapseOne$i' class='collapse $show' role='tabpanel' aria-labelledby='headingOne$i'
//                                     data-parent='#accordionEx'>
//                                    <div class='card-body'>
//                                        $card->deskripsi
//                                    </div>
//                                </div>
//
//                            </div>
//                            <!-- Accordion card -->";
                                }
                            ?>

                        </div>
                        <!-- Accordion wrapper -->
                    </div>
                    <div class="col-6">

                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                    $i=0;
                                    foreach ($data as $c){
                                        if(!$i){
                                            echo "<li data-target=\"#carouselExampleCaptions\" data-slide-to=\"$i\" class=\"active\"></li>";
                                        }else{
                                            echo "<li data-target=\"#carouselExampleCaptions\" data-slide-to=\"$i\"></li>";
                                        }
                                        $i++;
                                    }
                                ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                $i=0;
                                foreach ($data as $c){
                                    if(!$i){
                                        echo "<div class=\"carousel-item active\">
                                    <img src=\"$c->gambar\" class=\"d-block w-100\" alt=\"...\">
                                    <div class=\"carousel-caption d-none d-md-block\" style='background: rgba(0,0,0,0.4)!important'>
                                        <h5>$c->judul</h5>
                                    </div>
                                </div>";
                                    }else{
                                        echo "<div class=\"carousel-item\">
                                    <img src=\"$c->gambar\" class=\"d-block w-100\" alt=\"...\">
                                    <div class=\"carousel-caption d-none d-md-block\" style='background: rgba(0,0,0,0.4)!important'>
                                        <h5>$c->judul</h5>
                                    </div>
                                </div>";
                                    }
                                    $i++;
                                }
                                ?>



                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
<!--                <img class="advanced-feature-img-right wow fadeInRight" src="img/advanced-feature-1.jpg" alt="">-->


            </div>
        </div>
    </div>
</div>