<section>
    <div class="container-fluid">
        <h1 class="mt-4"><?= $courses['name']; ?></h1>
        <h2 class="mt-4">หัวข้อบรรยาย : <?= $lectures['name']; ?></h2>

        <div class="card mt-4">
            <div class="card-header">
                <form action="/addvideos" method="POST" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="exampleFormControlFile1">อัพโหลดคลิป</label>
                        <input type="file" name="fileupload[]" class="form-control-file" multiple required>
                        <input type="text" name="url" id="url" value="<?= $courses['url']; ?>" hidden>
                        <input type="text" name="id_courses" id="id_courses" value="<?= $courses['id']; ?>" hidden>
                        <input type="text" name="id_lectures" id="id_lectures" value="<?= $lectures['id']; ?>" hidden>
                        <input type="text" name="count" id="count" value="<?= $count; ?>" hidden>
                    </div>
                    <button class="btn btn-success ">อัพโหลด</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table" id="courses-list">
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
                            <tr>
                                <td class="text-center">
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $get['name']; ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editvideo" onclick="editvideo('<?= $get['name']; ?>','<?= $get['id']; ?>')">แก้ไข</button>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#showvideo" onclick="openvideo('<?= site_url('upload/' . $courses['url'] . '/allvdo/' . $get['url']); ?>','<?= $get['name']; ?>')">ดูคลิป</button>
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

<div class="modal fade" id="showvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoname">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closevideo()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video controls id="video" width="100%">
                    <source src="" id="source">
                    </source>
                </video>
                
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="editvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoname">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closevideo()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/updatevideo" method="POST">
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