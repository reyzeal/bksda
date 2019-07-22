<?php
//require '../konfigurasi/DB.php';
require 'konfigurasi/DB.php';
$hasil = [];
$total_kematian=0;
$total_penambahan=0;
$tahun = isset($_GET['tahun'])?$_GET['tahun']:null;
if(!$tahun){
    for($i=-12;$i<1;$i++){
        $j = $i+1;
        $year = date("Y",strtotime("$j months"));
        $month = date("m",strtotime("$j months"));
        $awal = date("Y-m-d H:i:s",strtotime("$i months"));
        $akhir = date("Y-m-d H:i:s",strtotime("$j months"));

        $temp = [];
        $temp['date']=[$month,$year];
        $sql = "SELECT sum(jumlah_kematian) as total FROM kematian_fauna WHERE tanggal_kematian BETWEEN '$awal' AND '$akhir'";
        $temp['kematian']=intval($DATABASE->select($sql)[0]->total);
        $sql = "SELECT sum(jumlah_penambahan) as total FROM penambahan_fauna WHERE tanggal_penambahan BETWEEN '$awal' AND '$akhir'";
        $temp['penambahan']=intval($DATABASE->select($sql)[0]->total);
        $total_kematian+=$temp['kematian'];
        $total_penambahan+=$temp['penambahan'];
        $hasil[] = $temp;
    }
}else{
    for($i=0;$i<12;$i++){
        $j = $i+1;
        $year = $tahun;
        $month = $i;
        if($j>12){
            $j = 1;
            $year++;
            $month = $j;
        }
        $awal = date("Y-m-d H:i:s",strtotime("$year-$i-01"));
        $akhir = date("Y-m-d H:i:s",strtotime("$year-$j-01"));
        //echo "$awal - $akhir<br>";
        $temp = [];
        $temp['date']=[$month,$year];
        $sql = "SELECT sum(jumlah_kematian) as total FROM kematian_fauna WHERE tanggal_kematian BETWEEN '$awal' AND '$akhir'";
        $temp['kematian']=intval($DATABASE->select($sql)[0]->total);
        $sql = "SELECT sum(jumlah_penambahan) as total FROM penambahan_fauna WHERE tanggal_penambahan BETWEEN '$awal' AND '$akhir'";
        $temp['penambahan']=intval($DATABASE->select($sql)[0]->total);
        $total_kematian+=$temp['kematian'];
        $total_penambahan+=$temp['penambahan'];
        $hasil[] = $temp;
    }
}


function kematian(){
    global $hasil;
    $string = '';
    if(isset($_GET['tahun']) && $_GET['tahun'] ){
        foreach ($hasil as $x){
            $m = $x['date'][0];
            $y = $x['date'][1];
            $string .= "{ x: new Date($y, $m), y: $x[kematian] },";
        }
    }else{
        foreach ($hasil as $x){
            $m = $x['date'][0]-1;
            $y = $x['date'][1];
            $string .= "{ x: new Date($y, $m), y: $x[kematian] },";
        }
    }
    return $string;
}

function penambahan(){
    global $hasil;
    $string = '';
    if(isset($_GET['tahun']) && $_GET['tahun']){
        foreach ($hasil as $x){
            $m = $x['date'][0];
            $y = $x['date'][1];
            $string .= "{ x: new Date($y, $m), y: $x[penambahan] },";
        }
    }else{
        foreach ($hasil as $x){
            $m = $x['date'][0]-1;
            $y = $x['date'][1];
            $string .= "{ x: new Date($y, $m), y: $x[penambahan] },";
        }
    }

    return $string;
}
//echo penambahan();