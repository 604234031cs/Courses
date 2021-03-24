<section>
    <div class="container-fluid">
        <h1 class="mt-4">ประเภทคอร์สหลัก</h1>
        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal">เพิ่มประเภท</button>
            </div>
            <div class="card-body">
                <table class="table" id="courses-list">
                    <thead>
                        <tr class="text-center">
                            <th>
                                #
                            </th>
                            <th>
                                ประเภทคอร์ส
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($main as $get) : ?>
                            <tr class="text-center tr-hover">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $get['name']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('/admin/category/' . $get['id']); ?>" class="btn btn-success">เพิ่มหมวดหมู่</a>
                                    <button onclick="editcategory('<?= $get['id']; ?>','<?= $get['name']; ?>')" class="btn btn-warning" data-toggle="modal" data-target="#modaledit">แก้ไข</button>
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

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทคอร์ส</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/addcategory') ?>" method="post">
                    <div class="form-group">
                        <label for="">ชื่อประเภทคอร์ส</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภท</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/updatecategory') ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="ca_name" id="ca_name" class="form-control">
                        <input type="text" name="id_category" id="id_category" hidden>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>