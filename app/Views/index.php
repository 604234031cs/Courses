<!-- <?php $i = 1; ?> -->
<section>
    <link rel="stylesheet" href="<?php echo site_url('asset/css/index.css'); ?>">
    <div class="container  mt-5">

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ค้นหาคอร์สเรียน" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="row mt-5">
            <?php foreach ($courses as $get) : ?>
                <div class="col col-4" id="col">
                    <a href="/courses/<?php echo $get->id; ?>" style="text-decoration: none;">
                        <div class="card mb-4" style="height:400px;">
                            <img class="card-img-top" src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/5Cr0YJWRBqYw3zpCKImc" alt="Card image" width="332" height="187">
                            <div class="card-body">
                                <div class="ml-5 mr-5">
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
                                    <meter id="disk_d" min="0" low="49" max="100" value=<?= $score; ?> style="width: 100%;height:30px"></meter>
                                </div>
                                <h5 class="card-title mt-3"><?= $get->name; ?></h5>
                                <!-- <p class="card-text">Some example text.</p> -->
                            </div>
                        </div>
                    </a>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</section>