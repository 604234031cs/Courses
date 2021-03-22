<section>
    <div class="container-fluid">
        <h1 class="mt-4">ตัวเลือก</h1>

        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success">เพิ่มตัวเลือก</button>
            </div>
            <div class="card-header">
                <?= $question['q_name']; ?>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>ตัวเลือก</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($val_question as $show) : ?>
                            <tr class="text-center">
                                <td><?= $i; ?></td>
                                <td><?= $show['sl_name'] ?></td>
                                <td>
                                    <button class="btn btn-warning">แก้ไข</button>
                                    <button class="btn btn-danger">ลบ</button>
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