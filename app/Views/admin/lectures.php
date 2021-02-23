<section>
    <div class="container-fluid">
        <h1 class="mt-4"><?= $courses['name']; ?></h1>
        <h2 class="mt-4">หัวข้อบรรยาย</h2>

        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มหัวข้อบรรยาย</button>
            </div>
            <div class="card-body">
                <table class="table" id="courses-list">
                    <thead>
                        <tr class="text-center">
                            <th>
                                #
                            </th>
                            <th>
                                หัวข้อบรรยาย
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($subcourses as $get) : ?>
                            <tr>
                                <td class="text-center">
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $get['name']; ?>
                                </td>
                                <td class="text-center">
                                    <!-- <a href="" class="btn btn-primary">เพิ่มวิดีโอบรรยาย</a> -->
                                    <a href="/admin/<?= $courses['id']; ?>/<?= $get['id']; ?>" class="btn btn-success">ดูวิดีโอ</a>
                                    <a onclick="editlectures('<?= $get['id']; ?>','<?= $get['name']; ?>')" href="" class="btn btn-warning" data-toggle="modal" data-target="#editlectures">แก้ไข</a>
                                    <!-- <a href="" class="btn btn-danger">ลบ</a> -->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มหัวข้อบรรยาย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary mb-3" onclick="addinput()">เพิ่ม</button>
                <button class="btn btn-warning mb-3" onclick="clearinput()">Clare</button>
                <form action="/addlectures" method="post">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>
                                    หัวข้อบรรยาย
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <!-- <div class="form-group">
                        <label for="">หัวข้อบรรยาย</label>
                        <input type="text" name="add-lectures" id="add-lectures" class="form-control">
                        
                    </div> -->
                    <input type="text" value="<?= $courses['id']; ?>" name="id_courses" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="text" name="hdnCount" min="0" id="hdnCount" hidden>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editlectures" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขหัวข้อบรรยาย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/updatelectures" method="post">
                    <div class="form-group">
                        <label for="">หัวข้อบรรยาย</label>
                        <input type="text" name="edit-lectures" id="edit-lectures" class="form-control">
                        <input type="text" value="<?= $courses['id']; ?>" name="id_courses" hidden>
                        <input type="text" value="" name="id_lectures" id="id_lectures" hidden>
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