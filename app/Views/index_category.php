<section>
    <main>
        <div class="container mt-5">
            <h3 class="mb-4">หมวดหมู่ : <span id="group-name"><?= $group['name']; ?></span> </h3>
            <span></span>
            <span id='group-id' style="display:none;"><?= $group['id']; ?></span>
            <div class="row">
                <div class="col col-4">
                    <div class="form-group">
                        <select class="form-control" id="category_sel" onchange="autoselect(this.value)">
                            <option value="" disabled selected>ประเภทคอร์ส</option>
                            <option value="">ทั้งหมด</option>
                            <?php foreach ($category as $show) : ?>
                                <option value="<?= $show['id'] ?>"><?= $show['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="form-group">
                        <select class="form-control" id="group_sel" onchange="changevalue(this.value)">
                            <option value="">หมวดหมู่</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-5" id="row_c">
                <?php if ($courses) : ?>
                    <?php foreach ($courses  as $list) : ?>

                        <div class="col col-3">
                            <a href="<?= base_url('/courses/' . $list['id']) ?>" style="text-decoration: none; color:black;">
                                <div class="card mb-3" style="height:350px;">
                                    <img class="card-img-top" src="<?= base_url('/public/img/' . $list['img']); ?>" alt="Card image" width="332" height="187">
                                    <div class="card-body">
                                        <h5 class="card-title mt-3"><?= $list['name']; ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    ไม่พบข้อมูล
                <?php endif; ?>

            </div>
        </div>
    </main>
</section>