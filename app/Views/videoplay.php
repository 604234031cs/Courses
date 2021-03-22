<section>
    <link rel="stylesheet" href="<?php echo site_url('public/asset/css/videoplay.css'); ?>">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion" style="background-color:turquoise;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="card">
                            <!-- <img src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/kSbQ546LSOiDrock3pNG" width="332" height="187"> -->
                        </div>
                        <div class="mt-2 mx-auto p-4" style="font-size: 20px;color:white;">
                            <?php echo  $category['name']; ?>
                        </div>
                        <div class="mx-5">
                            <span id="with" style="display: none;"><?= $calculat; ?></span>
                            <div class="progress">
                                <div id="progree" class="progress-bar progress-bar-striped " role="progressbar" style="background-color:#ff00bf;" aria-valuenow="<?= $calculat; ?>" aria-valuemin="0" aria-valuemax="100"><?= $calculat . '  %'; ?></div>
                            </div>
                            <!-- <meter low="49" high="50" min="0" max="100" value="<?= $calculat; ?>" style="width: 230px;height: 30px;" id="meter"></meter><br> -->

                        </div>
                        <div class="text-center mt-2 ">
                            <strong style="color: white;font-size:2em">COMPLETE</strong>
                        </div>
                        <h3 class="text-center" style="color:white;font-size:30px" id="calculate"><?= $calculat . " %"; ?></h3>
                    </div>
                    <?php foreach ($sub as $getsub) : ?>
                        <div class="card ml-1 mr-1 mb-3">
                            <div class="card-header">
                                <strong> <?php echo $getsub['name']; ?></strong>

                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <?php foreach ($list as $getlist) : ?>
                                        <?php if ($getsub['id'] == $getlist->id_subcourses) : ?>
                                            <tr id="tr" onclick="playvdo('<?= $getlist->name_key; ?>','<?= $getlist->name; ?>','<?= $getlist->id; ?>')">
                                                <td>
                                                    <?= $getlist->id; ?>
                                                    <i class="fab fa-youtube"></i> <?= $getlist->name; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid ">
                    <span id="id_user" style="display: none;"><?= $_SESSION['id']; ?></span>
                    <span id="id_video" style="display: none;"><?= $courses['id']; ?></span>
                    <span id="id_category" style="display: none;"><?= $category['id'] ?></span>
                    <h3 class="mt-3 ml-3">
                        <i class="fab fa-youtube"></i> <strong id="videoname"> <?php echo $courses['name']; ?></strong>
                        <input type="text" class="hidden">
                    </h3>
                    <div class="card ">
                        <input type="text" hidden id="key" value="<?= $courses['name_key']; ?>">
                        <div class="mainvideo mt-2 ">
                            <video src="<?= base_url('/videos/' . $courses['name_key']); ?>" id="video" onended="endVideo()" onplay="playvideo()" onpause="updatetime(this)" controls="controls" controlsList="nodownload">
                                <!-- <source src="<?= base_url('/videos/' . "key_1"); ?>" type="video/mp4" id="source"> -->
                            </video>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="main2">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <?php foreach ($sub as $getsub) : ?>
                                    <div class="card ml-1 mr-1 mb-3">
                                        <div class="card-header">
                                            <strong> <?php echo $getsub['name']; ?></strong>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <?php foreach ($list as $getlist) : ?>
                                                    <?php if ($getsub['id'] == $getlist->id_subcourses) : ?>
                                                        <tr id="tr" onclick="playvdo('<?= $getlist->name_key; ?>','<?= $getlist->name; ?>','<?= $getlist->id; ?>')">
                                                            <td>
                                                                <i class="fab fa-youtube"></i> <?= $getlist->name; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>



</section>