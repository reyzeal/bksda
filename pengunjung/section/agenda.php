<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module VIEW agenda pengunjung
 */

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
                        <div class="accordion md-accordion" id="card" role="tablist" aria-multiselectable="true">

                        </div>
                        <!-- Accordion wrapper -->


                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <button class="page-link" href="#" tabindex="-1" id="prevAgenda" onclick="prevAgenda()">Previous</button>
                                </li>
                                <li class="page-item disabled"><a href="" class="page-link">Page <span id="currentPage"></span></a></li>
<!--                                <li class="page-item active">-->
<!--                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
<!--                                </li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                                <li class="page-item">
                                    <button class="page-link" href="#" id="nextAgenda" onclick="nextAgenda()">Next</button>
                                </li>
                            </ul>
                        </nav>
                        
                    </div>
                    <div class="col-6">

                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" id="carousel">
                                <?php

                                ?>
                            </ol>
                            <div class="carousel-inner" id="carouselContent">
                                <?php

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

