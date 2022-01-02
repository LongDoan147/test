<?php
require "../load.php";
require "../login/check_admin.php";

if (isset($_GET['delete'])) {
    $user->delete($_GET['delete']);
}
if (isset($_GET['out'])) {
    unset($_SESSION['username']);
    unset($_SESSION['adminname']);

    header('Location: index.php');
}


$perPage = 5; // hiển thị 5 sản phẩm trên 1 trang
if (isset($_GET['page'])) {
    $page = $_GET['page']; // Lấy số trang trên thanh địa chỉ
} else {
    $page = 1;
}

$url = $_SERVER['PHP_SELF']; // lấy đường dẫn đến file hiện hành

$total = count($user->getAll());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mobile Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        ul.pagination {
            list-style: none;
            float: right;
        }

        ul.pagination li.active {
            font-weight: bold
        }

        ul.pagination li {
            display: inline-block;
            padding: 10px
        }
    </style>
</head>

<body>
    <?php require "module/header.php"; ?>
    <!--sidebar-menu-->
    <?php require "module/menu.php"; ?>
    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <h1>Manage User</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="form_user.php"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Username</th>
                                        <th>Power</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user->a_phantrang_getAll($page, $perPage) as $value) { ?>
                                        <tr class="">
                                            <td><?php echo $value['id'] ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['power'] ?></td>
                                            <td>
                                                <a href="form_user.php?id=<?php echo $value['id'] ?>" class="btn btn-success btn-mini">Edit</a>
                                                <a href="users.php?delete=<?php echo $value['id'] ?>" class="btn btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <?php echo $manufacture->a_link_phantrang_getAll($url, $total, $perPage) ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
    </div>
    <!--end-Footer-part-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
</body>

</html>