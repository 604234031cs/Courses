<section>
    <div class="container-fluid">
        <h1 class="mt-4"><?= $courses['name']; ?></h1>
        <h2 class="mt-4">เอกสารประกอบ</h2>
        <div class="card mb-4">
            <div class="card-header ">
                <form action="<?= base_url('/adddocs'); ?>" method="post" enctype="multipart/form-data" required>
                    <div class="form-group">
                        <label for="">อัพโหลดเอกสาร</label><br>
                        <input type="file" name="fileupload[]" id="" multiple required>
                        <input type="text" name="url" id="url" value="<?= $courses['url']; ?>" hidden>
                        <input type="text" name="id_courses" id="id_courses" value="<?= $courses['id']; ?>" hidden>
                        <input type="text" name="id_lectures" id="id_lectures" value="<?= $lectures['id']; ?>" hidden>
                        <input type="text" name="count" id="count" value="<?= $count; ?>" hidden>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">
                            อัพโหลด
                        </button>
                    </div>
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
                                เอกสาร
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($docs as $get) : ?>
                            <tr>
                                <td class="text-center"> <?= $i; ?></td>
                                <td><?= $get['name']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editdoc" onclick="editdoc('<?= $get['name']; ?>','<?= $get['id']; ?>')">แก้ไข</button>
                                    <a href="<?= base_url('/upload/' . $courses['url'] . '/alldocs/' . $get['url']); ?>" class="btn btn-secondary">โหลดไฟล์</a>
                                </td>
                                <!-- <button class="btn-btn-warning"></button> -->
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="editdoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="">เอกสาร</label>
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