<section>
    <title>คำข้อเข้าใช้</title>
    <div class="card">
        <div class="card-header">
            <h1 class="ml-4">อนุมัติการเข้าใช้</h1>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">

                <table class="table " id="courses-list">
                    <thead>
                        <tr class="text-center" id="list-courses">
                            <th>#</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>username</th>
                            <th>password</th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($list_regis as $get) : ?>
                            <tr class="text-center tr-hover">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td><?= $get['r_name']; ?></td>
                                <td><?= $get['r_lastname']; ?></td>
                                <td><?= $get['r_username']; ?></td>
                                <td><?= $get['r_password']; ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/register/' . $get['id'] . '/1'); ?>" class="btn btn-success"><i class="fas fa-check"></i> อนุุมัติ</a>
                                    <a href="<?= base_url('/admin/register/' . $get['id'] . '/0'); ?>" class="btn btn-danger"><i class="fas fa-times"></i> ไม่อนุมัติ</a>
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