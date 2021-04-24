<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?php echo site_url('asset/css/index.css'); ?>"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>ลงชื่อเข้าใช้</title>
</head>

<body>

    <style>
        body {
            background-color: aqua;
        }
    </style>
    <section>
        <?php if (session()->getFlashdata('msg')) : ?>
            <script>
                let msg = '<?php echo session()->getFlashdata('msg'); ?>';
                // alert(msg);
                swal('ไม่สำเร็จ!', msg, 'error');
            </script>
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo base_url('public/asset/css/index.css'); ?>">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-5 offset-md-3 mt-5   from-wrapper">
                    <div class="container  mt-5 p-5 bg-white ">
                        <h3 class="text-center">SIGN IN</h3>
                        <hr>
                        <form action="<?= base_url('/login/auth'); ?>" method="post">
                            <label for="">Username</label>
                            <div class="input-group mb-3">
                                <!-- <label for="inputEmail4">Username</label> -->
                                <input type="text" class="form-control" name="username">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            <label for="inputEmail4">Password</label>
                            <div class="input-group mb-3">

                                <input type="password" class="form-control" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                </div>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-success btn-sm " value="SIGN IN">
                            </div>
                        </form>
                        <div class="form-group">
                            <!-- <label for="inputEmail4">Confirm Password</label> -->
                            <a href="<?= base_url('/signup') ?>" class="btn btn-block btn-primary btn-sm ">SIGN UP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $("#users-list").DataTable();
        });
    </script>
</body>

</html>