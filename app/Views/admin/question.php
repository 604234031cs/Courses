<section>

    <div class="container-fluid">
        <h1 class="mt-4">คำถาม</h1>
        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success">เพิ่มคำถาม</button>
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