<section>
    <link rel="stylesheet" href="<?php echo base_url('/public/asset/css/index.css'); ?>">
    <div class="container  mt-5">
        <div class="container-fluid">
            <div class="container">
                <h3 class="mt-3">ความคืบหน้า</h3>
                <hr>
                <div class="row">
                    <?php foreach ($courses as $get) : ?>

                        <div class="col col-lg-4">
                            <a href="<?= base_url('/courses/' . $get->id); ?>" style="text-decoration: none; color:black;">
                                <div class="card mb-4 " style="height:370px">
                                    <img class="card-img-top" src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/5Cr0YJWRBqYw3zpCKImc" alt="Card image" width="321" height="121">
                                    <div class="card-body">
                                        <div class="ml-5 mr-5">
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
                                            <div class="progress mt-2">
                                                <div class="progress-bar progress-bar-striped " role="progressbar" style="width: <?= $score; ?>%; background-color:#ff00bf" aria-valuenow="<?= $score; ?>" aria-valuemin="0" aria-valuemax="100"><?= $score . '  %'; ?></div>
                                            </div>
                                        </div>
                                        <p class="mt-3" style="font-size: 15x;"><strong><?= $get->name; ?></strong></p>
                                    </div>
                                    <button class="btn btn-block btn-color">เรียนต่อ</button>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</section>