<section>
    <link rel="stylesheet" href="<?php echo base_url('/public/asset/css/index.css'); ?>">
    <!-- <div class="container  mt-5"> -->
    <div class="container-fluid  ">
        <div class="container">
            <h3 class="mt-3">ความคืบหน้า</h3>
            <hr>
            <div class="row mt-5">
                <?php foreach ($courses as $get) : ?>

                    <div class="col-lg-4 mb-2">
                        <a href="<?= base_url('/courses/' . $get->id); ?>" style="text-decoration: none; color:black;">
                            <div class="card mb-4 mt-3" style="height:370px">
                                <img class="card-img-top" src="<?= base_url('/public/img/' . $get->img) ?>" alt="Card image">
                                <!-- <div class="card-body"> -->
                                <div class="ml-5 mr-5 mt-1">
                                    <div class="text-center">
                                        <strong>COMPLETE</strong>
                                    </div>
                                    <div class="text-center">
                                        <?php
                                        if ($get->score != null) {
                                            echo $get->score . ' %';
                                            $score = $get->score;
                                        } else {
                                            echo '0.00 %';
                                            $score = 0;
                                        }
                                        ?>
                                    </div>
                                    <div class="mX-1">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped " role="progressbar" style="width: <?= $score; ?>%; background-color:#ff00bf" aria-valuenow="<?= $score; ?>" aria-valuemin="0" aria-valuemax="100.00"><?= $score . '%'; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <p class=" card-text " style="font-size: 15x;"><strong><?= $get->name; ?></strong></p>
                                </div>
                                <!-- </div> -->
                            </div>
                            <button class="btn btn-block btn-color">เรียนต่อ</button>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- </div> -->
</section>