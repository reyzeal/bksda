<?php
require '../konfigurasi/DB.php';
$agenda_page = isset($_GET['agenda_page'])?$_GET['agenda_page']*3:1;
$data = $DATABASE->select("SELECT * FROM agenda order by waktu desc limit $agenda_page,3");
$agenda_page_total = ceil(($DATABASE->select("SELECT count(*) as total FROM agenda")[0]->total)/3);

$i =0;
$result = [];
$carde = [];
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

    $carde[] = "<div class='row'>
           <div class='col-2'><time datetime='$card->waktu' class='date-as-calendar position-em size1x'>
            <span class='weekday'>$weekday</span>
            <span class='day'>$day</span>
            <span class='month'>$month</span>
            <span class='year'>$year</span>
            </time></div>
           <div class='col-10'>
                <h3 class='font-weight-bold'>$card->judul</h3>
                <p>$deskripsi <a href='../pengunjung/agenda.php?id=$card->id'>Baca selengkapnya..</a></p>
           </div>
        </div>";



}
$carousel = [];
$i=0;
    foreach ($data as $c){
        if(!$i){
            $carousel[]="<li data-target='#carouselExampleCaptions' data-slide-to='$i' class='active'></li>";
        }else{
            $carousel[]="<li data-target='#carouselExampleCaptions' data-slide-to='$i'></li>";
        }
        $i++;
    }
$carouselContent = [];
    $i=0;
    foreach ($data as $c){
        if(!$i){
            $carouselContent[]="<div class='carousel-item active'>
                                    <img src='$c->gambar' class='d-block w-100' alt='...'>
                                    <div class='carousel-caption d-none d-md-block' style='background: rgba(0,0,0,0.4)!important'>
                                        <h5>$c->judul</h5>
                                    </div>
                                </div>";
        }else{
            $carouselContent[]="<div class='carousel-item'>
                                    <img src='$c->gambar' class='d-block w-100' alt='...'>
                                    <div class='carousel-caption d-none d-md-block' style='background: rgba(0,0,0,0.4)!important'>
                                        <h5>$c->judul</h5>
                                    </div>
                                </div>";
        }
        $i++;
    }
    header('Content-Type: application/json');
    echo json_encode([
        'card' => $carde,
        'carousel' => $carousel,
        'carouselContent' => $carouselContent,
        'max' => $agenda_page_total
    ]);