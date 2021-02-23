<section>
    <link rel="stylesheet" href="<?php echo site_url('asset/css/listvdo.css'); ?>">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion" style="background-color:turquoise;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="card">
                            <img src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/kSbQ546LSOiDrock3pNG" width="332" height="187">
                        </div>
                        <div class="mt-2 mx-auto p-4" style="font-size: 20px;color:white;">
                            <?php echo $category['name']; ?>
                        </div>
                        <div class="mx-auto">
                            <meter low="49" high="50" min="0" max="100" value="<?= $calculat; ?>" style="width: 230px;height: 30px;" id="meter"></meter><br>

                        </div>
                        <h3 class="text-center" style="color:white;font-size:30px"><?= $calculat . " %"; ?></h3>
                        <a id="navlink" class="nav-link " href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns" style="color: white;width:33px;height:35px"></i></div>
                            เนื้อหาในคอรส์นี้
                        </a>
                    </div>
                </div>

            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h3 class="mt-5 ml-3">
                        <strong>เนื้อหาในคอร์สนี้</strong>
                    </h3>
                    <?php foreach ($sub as $getsub) : ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong> <?php echo $getsub['name']; ?></strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <?php foreach ($list as $getlist) : ?>
                                        <?php if ($getsub['id'] == $getlist->id_subcourses) : ?>
                                            <tr id="tr" onclick="openlink('<?= $category['id']; ?>',<?= $getlist->id ?>)">
                                                <td></td>
                                                <td>
                                                    <i class="fab fa-youtube"></i> <?= $getlist->name; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="/courses/<?= $category['id']; ?>/lectures/<?= $getlist->id ?>" class="btn" style="background-color:deeppink;color:white;">เริ่ม</a>
                                                </td>
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