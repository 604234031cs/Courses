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
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

    <link href="<?php echo site_url('theme/dist/css/styles.css'); ?>" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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

<body>

    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color: turquoise;">
        <div class="container">
            <!-- <a class="navbar-brand" href="/">Start Bootstrap</a>  -->
            <ul class="navbar-nav mr-auto ml-md-0">
                <!-- <li class="nav-item dropdown">
                    <a class="navbar-brand dropdown-toggle" id="userDropdown" href="/" data-toggle="dropdown">คอร์สเรียน</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class=" dropdown-header"><strong>ประเภทคอร์สหลัก</strong></div>
                        <?php foreach ($cetegory as $list) : ?>
                            <a class="dropdown-item" href="#"><?= $list->name ?></a>
                        <?php endforeach; ?>
                        <a class="dropdown-item" href="#">คอร์สเรียนทั้งหมด</a>
                    </div>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="navbar-brand dropdown-toggle" id="userDropdown" href="/" data-toggle="dropdown">คอร์สเรียน</a>
                    <ul class="dropdown-menu">
                        <div class=" dropdown-header"><strong>ประเภทคอร์สหลัก</strong></div>
                        <?php foreach ($cetegory as $list) : ?>
                            <li><a class="dropdown-item" href="#"><?= $list->name ?> &raquo</a>
                                <ul class="submenu dropdown-menu">
                                    <?php foreach ($group as $get) : ?>
                                        <?php if ($get->c_id == $list->id) : ?>
                                            <li><a class="dropdown-item" href=""><?= $get->name ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                        <li><a class="dropdown-item" href="#"> คอร์สเรียนทั้งหมด </a></li>

                    </ul>
                </li>
            </ul>
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search-->

        </div>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item">
                <a href="/progress_course" class="nav-link" style="color:white;">คอร์สที่ดูล่าสุด</a>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>