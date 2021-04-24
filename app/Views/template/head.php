<?php
$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM category');
$cetegory = $query->getResult();

$query = $db->query('SELECT * FROM group_courses');
$group = $query->getResult();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

    <link href="<?php echo base_url('public/theme/dist/css/styles.css'); ?>" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function(e) {
                e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                $('.dropdown-menu a').click(function(e) {
                    e.preventDefault();
                    if ($(this).next('.submenu').length) {
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function() {
                        $(this).find('.submenu').hide();
                    })
                });
            }

        }); // jquery end
    </script>
    <style>
        .nav-link {
            color: white;
        }

        @media (min-width: 992px) {
            .dropdown-menu .dropdown-toggle:after {
                border-top: .3em solid transparent;
                border-right: 0;
                border-bottom: .3em solid transparent;
                border-left: .3em solid;
            }

            .dropdown-menu .dropdown-menu {
                margin-left: 0;
                margin-right: 0;
            }

            .dropdown-menu li {
                position: relative;
            }

            .nav-item .submenu {
                display: none;
                position: absolute;
                left: 100%;
                top: -7px;
            }

            .nav-item .submenu-left {
                right: 100%;
                left: auto;
            }

            .dropdown-menu>li:hover {
                background-color: #f1f1f1
            }

            .dropdown-menu>li:hover>.submenu {
                display: block;
            }
        }
    </style>
</head>

<body ondragstart="return false" onselectstart="return false" id="body">

    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color: turquoise;">
        <a class="navbar-brand" href="<?= base_url('/') ?>"><strong>COURSES</strong></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav mr-auto ml-lg-5">
            <li class="nav-item dropdown a ml-5">
                <a class="navbar-brand dropdown-toggle ml-5" href="<?= base_url('/') ?>" data-toggle="dropdown">คอร์สเรียน</a>
                <ul class="dropdown-menu">
                    <div class=" dropdown-header"><strong>ประเภทคอร์สหลัก</strong></div>
                    <?php foreach ($cetegory as $list) : ?>
                        <li><a class="dropdown-item" href="#"><?= $list->name ?> &raquo</a>
                            <ul class="submenu dropdown-menu">
                                <?php foreach ($group as $get) : ?>
                                    <?php if ($get->c_id == $list->id) : ?>
                                        <li><a class="dropdown-item" href="<?= base_url('/category/' . $get->id); ?>"><?= $get->name ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                    <li><a class="dropdown-item " href="<?= base_url('/') ?>"> คอร์สเรียนทั้งหมด </a></li>

                </ul>
            </li>
        </ul>
        <div class="container-fluid ml-lg-5">
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item b dropdown">
                    <a href="<?= base_url('/progress_course'); ?>" class="nav-link" style="color:white;">คอร์สที่ดูล่าสุด</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
       
    </nav>



    <!-- <span id='base_url' style="display: none;"> <?= base_url(); ?></span> -->