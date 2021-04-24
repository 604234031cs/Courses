
<section>
    <title>หมวดหมู่</title>
    <div class="card">
        <div class="card-header">
            <h1 class="mt-1 ml-4"><?= $name['name']; ?></h1>
            <h4 class="mt-1 ml-4">หมวดหมู่</h4>
        </div>
    </div>
    <div class="container-fluid mt-4">

        <div class="card mb-4">
            <div class="card-header text-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เพิ่มหมวดหมู่</button>
            </div>
            <div class="card-body">
                <table class="table " id="courses-list">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>หมวดหมู่</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($group as $get) : ?>
                            <tr class="text-center tr-hover">
                                <td><?= $i; ?></td>
                                <td><?= $get['name']; ?></td>
                                <td>
                                    <button onclick="editgroup('<?= $get['id'] ?>','<?= $get['name']; ?>')" type="button" class="btn btn-warning" data-toggle="modal" data-target="#editgroup">แก้ไข</button>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary mb-3" onclick="addinput2()">เพิ่ม</button>
                <button class="btn btn-warning mb-3" onclick="clearinput2()">Clare</button>
                <form action="<?= base_url('/addgroup') ?>" method="POST">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>
                                    ชื่อหมวดหมู่
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="text" name="hdnCount" min="0" id="hdnCount" hidden>
                <input type="text" name="id_category" id="" value="<?= $name['id']; ?>" hidden>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editgroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขหมวดหมู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/updategroup'); ?>" method="post">
                    <div class="form-group">
                        <label for="">ประเภทคอร์ส</label>
                        <select name="ca_id" class="form-control">
                            <option value="<?= $name['id']; ?>"><?= $name['name']; ?></option>
                            <?php foreach ($mains as $get) : ?>
                                <?php if ($get['id'] != $name['id']) : ?>
                                    <option value="<?= $get['id'] ?>"><?= $get['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">หมวดหมู่</label>
                        <input type="text" name="gr_name" id="gr_name" class="form-control">
                        <input type="text" name="gr_id" id="gr_id" hidden>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <input type="text" name="" id=""> -->
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>