<section>
    <link rel="stylesheet" href="<?php echo site_url('asset/css/listvdo.css'); ?>">
    <main>
        <link rel="stylesheet" href="<?php echo site_url('asset/css/index.css'); ?>">
        <div class="container  mt-5">
            <!-- onchange="myform.submit()" -->
            <h3 class="mb-3">คอร์สเรียนทั้งหมด</h3>
            <hr>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="ค้นหาคอร์สเรียน" name="search" oninput="loadpage(this.value)">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                </div>
            </div>
            <div class="row mt-5" id="row">
            </div>
        </div>
    </main>
</section>