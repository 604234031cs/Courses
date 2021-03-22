<section>
    <div class="container-fluid">
        <h1 class="mt-4">คำถาม</h1>
        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มคำถาม</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>คำถาม</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody><?php $i = 1; ?>
                        <?php foreach ($question as $get) : ?>
                            <tr class="text-center">
                                <td><?= $i++; ?></td>
                                <td><?= $get['q_name'] ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/val_question/' . $get['q_id']); ?>" class="btn btn-primary">ตัวเลือก</a>
                                    <button class="btn btn-warning">แก้ไข</button>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มคำถาม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" name="id_c" id="id_c" value="<?= $id; ?>" hidden>
                <div class="form-group">
                    <label for="">คำถาม</label>
                    <input type="text" name="" id="" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>