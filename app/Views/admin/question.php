<section>

    <div class="container-fluid">
        <h1 class="mt-4">คำถาม</h1>
        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#question-add-modal" onclick='openmodal();'>เพิ่มคำถาม</button>
            </div>
            <div class="card-body">
                <table class="table" id="courses-list">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>คำถาม</th>
                            <th style="white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    <tbody><?php $i = 1; ?>
                        <?php foreach ($question as $get) : ?>
                            <tr class="text-center">
                                <td><?= $i++; ?></td>
                                <td><?= $get['q_name'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#option-view-modal" onclick="viewoption('<?= $get['q_id']; ?>','<?= $get['answer']; ?>')">
                                        ตัวเลือก
                                    </button>
                                    <!-- <a href="<?= base_url('/admin/val_question/' . $get['q_id']); ?>" class="btn btn-primary">ตัวเลือก</a> -->
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

<!-- Modal -->
<div class="modal fade" id="question-add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มคำถาม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <button class="btn btn-primary" id="addoption" onclick="addoption()">เพิ่มตัวเลือก</button>
                            <button class="btn btn-secondary" id="claer" onclick="clearinput()">ล้างตัวเลือก</button>
                        </div>
                        <form action="<?= base_url('/addquestion'); ?>" method="post">
                            <div class="form-group">
                                <label for="">คำถาม</label>
                                <input type="text" name="question-add" id="question-add" class="form-control" oninput="validatevalue()" required>
                            </div>

                            <input type="text" id='rows' name="rows" hidden>

                            <table id="option" class="table table-striped">
                                <thead>
                                    <tr class='text-center'>
                                        <!-- <th></th> -->
                                        <th>
                                            ตัวเลือก
                                        </th>
                                        <th></th>
                                        <th>เลือกคำตอบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <!-- <label for="">คำตอบ</label><br> -->
                                <input type="text" value="<?= $id; ?>" name="id_courses" name="id_courses" hidden>
                                <input type="text" class="mt-2" id="answer" name="answer_value" hidden>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success" id="btn-submit">เพิ่มคำถาม</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="option-view-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ตัวเลือก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="table-option">
                    <thead class='text-center'>
                        <tr>
                            <th>ตัวเลือกที่</th>
                            <th>Option Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>