<section>
    <link rel="stylesheet" href="<?php echo base_url('public/asset/css/listvdo.css'); ?>">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion" style="background-color:turquoise;">
                <div class="sb-sidenav-menu">
                    <img src="<?= base_url() . '/public/img/' . $category['img']; ?>" height="150">
                    <div class="nav">
                        <!-- <div class="card"> -->

                        <!-- </div> -->
                        <div class="mt-2 mx-auto p-4" style="font-size: 20px;color:white;">
                            <?= $category['name']; ?>

                        </div>
                        <div class="mx-2">
                            <div class="progress mt-2">
                                <div class="progress-bar progress-bar-striped " role="progressbar" style="width: <?= $calculat; ?>%; background-color:#ff00bf" aria-valuenow="<?= $calculat; ?>" aria-valuemin="0" aria-valuemax="100.00"><?= $calculat . '  %'; ?></div>
                            </div>
                            <!-- <meter low="49" high="50" min="0" max="100" value="<?= $calculat; ?>" style="width: 230px;height: 30px;" id="meter"></meter><br> -->

                        </div>
                        <div class="text-center mt-3 ">
                            <strong style="color: white;font-size:2em">COMPLETE</strong>
                        </div>
                        <h3 class="text-center" style="color:white;font-size:30px"><?= $calculat . " %"; ?></h3>
                        <div id="navlink" class="nav-link " href="#">
                            <span style="font-size: 1.5rem;">เนื้อหาในคอร์สนี้</span>
                        </div>
                        <?php if ($calculat >= 50) : ?>
                            <a class="nav-link" href="<?= base_url('/quiz/' . $category['id']); ?>" style="font-size: 1.5rem;"><span>แบบทดสอบ</span></a>
                        <?php endif; ?>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h3 class="mt-3 ml-3">
                        <strong>เนื้อหาในคอร์สนี้</strong>
                        <div class="text-right">
                            <?php if ($docs) : ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    เอกสารประกอบ
                                </button>
                            <?php endif; ?>
                        </div>
                    </h3>
                    <?php foreach ($sub as $getsub) : ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong> <?php echo $getsub['name']; ?></strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <?php $i = 1; ?>
                                    <?php foreach ($docs as $getdoc) : ?>
                                        <?php if ($getsub['id'] == $getdoc->id_subcourses) : ?>
                                            <tr>
                                                <a href="<?= base_url('/upload/' . $category['url'] . '/alldocs/' . $getdoc->url); ?>"><i class="fas fa-download"></i> File<?= $i; ?></a> &nbsp;
                                            </tr>
                                        <?php endif; ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>

                                    <?php foreach ($list as $getlist) : ?>
                                        <?php if ($getsub['id'] == $getlist->id_subcourses) : ?>
                                            <tr id="tr" onclick="openlink('<?= $category['id']; ?>',<?= $getlist->id ?>)">
                                                <td></td>
                                                <td>
                                                    <i class="fab fa-youtube"></i> <?= $getlist->name; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('/courses/' . $category['id'] . '/lectures/' . $getlist->id); ?>" class="btn" style="background-color:deeppink;color:white;">เริ่ม</a>
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>
</section>

<?php if ($docs) : ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เอกสารประกอบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <?php foreach ($sub as $getsub) : ?>
                            <thead>
                                <tr>
                                    <!-- <td></td> -->
                                    <th>
                                        <?php echo $getsub['name']; ?>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <?php foreach ($docs as $getdoc) : ?>
                                <?php if ($getsub['id'] == $getdoc->id_subcourses) : ?>
                                    <tr>
                                        <!-- <td></td> -->
                                        <td>
                                            <i class="fas fa-file-export"></i> <?= $getdoc->name; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('/upload/' . $category['url'] . '/alldocs/' . $getdoc->url); ?>" class="btn" style="background-color:deeppink;color:white;">โหลด</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>