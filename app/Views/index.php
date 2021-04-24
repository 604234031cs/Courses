<section>
    <!-- <link rel="stylesheet" href="<?php echo base_url('public/asset/css/listvdo.css'); ?>"> -->
    <title>คอร์สเรียนทั้งหมด</title>
    <main>
        <link rel="stylesheet" href="<?php echo base_url('public/asset/css/index.css'); ?>">
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
                <!-- <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <div class="col-sm">
                        <div class="card mb-4">
                            <img src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/5Cr0YJWRBqYw3zpCKImc" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="ml-5 mr-5">
                                    <div class="text-center"><strong>COMPLETE</strong></div>

                                </div>
                            </div>
                        </div>


                    </div>
                <?php endfor; ?> -->
            </div>
    </main>

</section>