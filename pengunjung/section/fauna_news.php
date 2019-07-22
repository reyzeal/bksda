<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW fauna news
 */
    $data = $DATABASE->select('SELECT * FROM fauna limit 12');
    $MAX_COL = 4;
?>
<div class="features-row" id="news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <img class="img-fluid" src="img/advanced-feature-2.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="">
                            <h2>Animal News</h2>
                            <div class="row">
                                <?php
                                foreach ($data as $animal){
                                    $gambar = $animal->gambar?$animal->gambar:'/pengunjung/img/unknown.jpg';
                                    ?>
                                    <div class="col-md-3 col-3 text-center p-2" onclick="faunaOverview(<?=$animal->id;?>)">
                                        <img width="100" height="100" src="<?=$gambar;?>" style="object-fit: cover;">
                                        <p><?= $animal->nama_fauna;?></p>
                                    </div>
                                    <?php
                                };
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="faunaOverview" tabindex="-1" role="dialog" aria-labelledby="faunaOverviewTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="faunaOverviewTitle">Fauna Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex justify-content-center p-3">
                    <img class="img-fluid" target="gambar">
                </div>

                <div class="row">
                    <div class="col-3">Nama</div>
                    <div class="col-1">:</div>
                    <div class="col-8" target="nama"></div>
                </div>
                <div class="row">
                    <div class="col-3">Spesies</div>
                    <div class="col-1">:</div>
                    <div class="col-8" target="spesies"></div>
                </div>
                <div class="row">
                    <div class="col-3">Family</div>
                    <div class="col-1">:</div>
                    <div class="col-8" target="family"></div>
                </div>
                <div class="row">
                    <div class="col-3">Kehidupan sosial</div>
                    <div class="col-1">:</div>
                    <div class="col-8" target="kehidupan_sosial"></div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p target="deskripsi" class="p-3"></p>
                    </div>
                </div>

                <h3>Keterangan Konservasi:</h3>
                <div class="row">
                    <div class="col-3">Status</div>
                    <div class="col-1">:</div>
                    <div class="col-8" target="status"></div>
                </div>
                <div class="row">
                    <div class="col-3">Status Konservasi<br>Nasional/Internasional</div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <span target="status_konservasi_nasional"></span>/
                        <span target="status_konservasi_internasional"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function faunaOverview(id) {
        $.ajax({
            url:'/pengunjung/proses/fauna.php?id='+id,
            success:function (msg) {
                var data = JSON.parse(msg);
                $('[target=nama]').html(data.nama_fauna);
                $('[target=spesies]').html(data.spesies);
                $('[target=family]').html(data.family);
                $('[target=status]').html(data.status);
                $('[target=status_konservasi_nasional]').html(data.status_konservasi_nasional);
                $('[target=status_konservasi_internasional]').html(data.status_konservasi_internasional);
                $('[target=kehidupan_sosial]').html(data.kehidupan_sosial);
                $('[target=deskripsi]').html(data.deskripsi);
                $('[target=gambar]').attr('src',data.gambar);
                $('#faunaOverview').modal('show');
            }
        });

    }
</script>