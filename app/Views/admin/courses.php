<section>
    <title>คอร์สเรียน</title>
    <div class="card" style="border:none;">
        <div class="card-hader">
            <h1 class="mt-2 ml-4">คอร์สเรียน</h1>
        </div>
    </div>
    <div class="container-fluid mt-3">

        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มคอร์สเรียน</button>
            </div>
            <div class="card-body ">
                <table class="table " id="courses-list">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>คอร์สเรียน</th>
                            <th>ประเภท</th>
                            <th>หมวดหมู่</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i = 1; ?>
                        <?php foreach ($category as $get) : ?>
                            <tr class="tr-hover  ">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $get['name']; ?>
                                </td>
                                <td><?= $get['ca_name']; ?></td>
                                <td><?= $get['gr_name']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('/admin/lectures/' . $get['id']) ?>" class="btn btn-success ">หัวข้อ</a>
                                    <a onclick="edit('<?= $get['name']; ?>','<?= $get['id']; ?>','<?= $get['ca_name']; ?>','<?= $get['ca_id']; ?>','<?= $get['gr_name']; ?>','<?= $get['gr_id']; ?>','<?= $get['img']; ?>')" href="" class="btn btn-warning " data-toggle="modal" data-target="#editcourses">แก้ไข</a>
                                    <a href="<?= base_url('/admin/question/' . $get['id']); ?>" class="btn btn-primary">คำถาม</a>
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
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มคอร์สเรียน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/addcourses') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">ประเภอคอร์สหลัก</label>
                        <select class="form-control" onchange="autoselect(this.value)" id="main">
                            <?php foreach ($main_c as $get) : ?>
                                <option value="<?= $get['id']; ?>"><?= $get['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">หมวดหมู่</label>
                        <select name="group" id="group" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">ชื่อคอร์ส</label>
                        <input type="text" name="add-courses" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">ภาพหน้าปก</label>
                        <input type="file" name="file_img" class="form-control" required>
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

<div class="modal fade" id="editcourses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/updatecourses') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="file_check" id="file_check" value="" hidden>
                        <img src="" alt="Not file" id="show-img" class="img-thumbnail" width="100%">
                    </div>
                    <div class="form-group">
                        <input type="file" name="_img" id="" onchange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <label for="">ประเภอคอร์สหลัก</label>
                        <option value=""></option>
                        <select class="form-control" onchange="autoselect2(this.value)" id="main2">
                            <option value="" id="option"></option>
                            <?php foreach ($main_c as $get) : ?>
                                <option value="<?= $get['id']; ?>"><?= $get['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">หมวดหมู่</label>
                        <span id="option2-value"></span>
                        <span id="option2-html"></span>
                        <select name="group_e" id="group_e" class="form-control" required>

                            <option value="" id="option2"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">ชื่อคอร์ส</label>
                        <input type="text" name="edit_name" id="edit_name" class="form-control">
                        <input type="text" name="edit_id" id="edit_id" class="form-control" hidden>
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