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


</head>

<body>

    <style>
        body {
            background-color: aqua;
        }
    </style>
    <section>
        <?php if (session()->getFlashdata('msg')) : ?>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
                let msg = '<?php echo session()->getFlashdata('msg'); ?>';
                // alert(msg);
                swal('ไม่สำเร็จ!', msg, 'error');
            </script>
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo site_url('asset/css/index.css'); ?>">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-5 offset-md-3 mt-5   from-wrapper">
                    <div class="container  mt-5 p-5 bg-white ">
                        <h3 class="text-center">SIGN IN</h3>
                        <hr>
                        <form action="/login/auth" method="post">
                            <div class="form-group">
                                <label for="inputEmail4">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Password</label>
                                <input type="password" class="form-control" name="password">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-success btn-sm " value="SIGN IN">
                            </div>
                        </form>
                        <div class="form-group">
                            <!-- <label for="inputEmail4">Confirm Password</label> -->
                            <a href="/signup" class="btn btn-block btn-primary btn-sm ">SIGN UP</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <video width="320" height="240" controls>
            <source src="<?php echo site_url('vdo/category1/allvdo/1.1.mp4'); ?>" type="video/mp4">
        </video> -->
            <!-- <iframe onended="myfuntion()" width="560" height="315" src="https://www.youtube.com/embed/bjeurG0jH9w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
        </div>

        <!-- col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 -->

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