<title>วิดีโอ</title>
<section>

    <div class="card">
        <div class="card-header">
            <h1 class="mt-1 ml-4"><?= $courses['name']; ?></h1>
            <h4 class="mt-1 ml-4">หัวข้อบรรยาย : <?= $lectures['name']; ?></h4>
        </div>

    </div>
    <div class="container-fluid mt-4">

        <div class="card mb-4">
            <div class="card-header">
                <form action="<?= base_url('/addvideos') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">อัพโหลดคลิป</label>
                        <input type="file" name="fileupload" class="form-control-file" required>
                        <!-- <input type="text" name="url" id="url" value="<?= $courses['url']; ?>" > -->
                        <input type="text" name="id_courses" id="id_courses" value="<?= $courses['id']; ?>" hidden>
                        <input type="text" name="id_lectures" id="id_lectures" value="<?= $lectures['id']; ?>" hidden>
                        <input type="text" name="count" id="count" value="<?= $count; ?>" hidden>
                    </div>
                    <button class="btn btn-success ">อัพโหลด</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table  " id="courses-list">
                    <thead>
                        <tr class="text-center">
                            <th>
                                #
                            </th>
                            <th>
                                คลิป
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($videos as $get) : ?>
                            <tr class="tr-hover text-center">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $get['name']; ?>
                                </td>
                                <td class="text-center">
                                    <input type="text" name="" id="base-url" value="<?= base_url(); ?>" hidden>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editvideo" onclick="editvideo('<?= $get['name']; ?>','<?= $get['id']; ?>')">แก้ไข</button>

                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#showvideo<?= $get['id'] ?>" onclick="openvideo('<?= $get['name_key']; ?>','<?= $get['name']; ?>')">ดูคลิป</button>
                                    <div class="modal fade" id="showvideo<?= $get['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="videoname">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closevideo()">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <span id="key"></span>
                                                <div class="modal-body">
                                                    <!-- <video controls id="video" width="100%" src=""> -->
                                                    <!-- <source src="" id="source">
                    </source> -->
                                                    <!-- </video> -->
                                                    <iframe src="https://www.youtube.com/embed/<?= $get['name_key']; ?>?modestbranding=1&rel=0" frameborder="0" width="100%" height="500px"></iframe>

                                                    <!-- <div id="player"></div> -->

                                                </div>
                                                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <button class="btn btn-danger">ลบ</button> -->
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="editvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoname">แก้ไข</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closevideo()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/updatevideo') ?>" method="POST">
                    <div class="form-group">
                        <label for="">คลิป</label>
                        <input type="text" name="id_courses" value="<?= $courses['id']; ?>" hidden>
                        <input type="text" name="id_lectures" value="<?= $lectures['id']; ?>" hidden>
                        <input type="text" name="edit-video" id="video-name" class="form-control">
                        <input type="text" name="edit-id" id="video-id" class="form-control" hidden>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>