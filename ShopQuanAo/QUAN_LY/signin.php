<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fashion Admin</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/favicon/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./css/loginstyle.css" type="text/css">
    <!-- CDN create fas login user -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!--<meta http-equiv="refresh" content="15;url=">-->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <div>
        <form class="form-login" method="POST">
            <header class="header-login text-center text-muted mb-4 pt-2">
                <h2 class="h2-login">Admin Fashion</h2>
            </header>
            <div class="con-login px-lg-5 py-lg-3">
                <div class="field-set">
                    <span class="input-item">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input class="form-input" id="txt-input" type="text" name="USERNAMENV" placeholder="Tên Tài Khoản" required>
                    <br>
                    <span class="input-item1">
                        <i class="fa fa-key"></i>
                    </span>
                    <input class="form-input" type="password" placeholder="Mật Khẩu" id="pwd" name="PASSWORD" required>
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                    </span>
                    <br>
                    <button class="button-login log-in" name="login">Đăng nhập</button>
                </div>
            </div>
        </form>
        <script src="./js/scriptlogin.js"></script>
        <style>
            .button-login:hover {
                transform: translatey(3px);
                box-shadow: none;
            }

            .button-login:hover {
                animation: ani9 0.4s ease-in-out infinite alternate;
            }
        </style>
</body>

</html>

<?php
include('connect.php');

session_start();
if (isset($_POST['login'])) {
    $usernamenv = $_POST['USERNAMENV'];
    $pass = md5($_POST['PASSWORD']);
    if (!$usernamenv || !$pass) {
        echo '<script>alert("Vui lòng nhập tài khoản & mật khẩu! ");</script>';
        exit;
    }else{
        $sql = "SELECT * FROM NhanVien WHERE UsernameNV='$usernamenv'";
        $result = $connect->query($sql);
        if ($result->num_rows == 0) {
            echo '<script>alert("Tên tài khoản không tồn tại!");</script>';
            exit;
        }else{
            $row = $result->fetch_assoc();
            if ($row['Password'] != $pass)
                echo '<script>alert("Sai mật khẩu!");</script>';
            else {
                $_SESSION['MSNV'] = $row['MSNV'];
                $_SESSION['HoTenNV'] = $row['HoTenNV'];
                echo '<script>alert("Đăng nhập thành công!!! ");window.location="index.php?option=loaihang";</script>';
                exit;
            }
        }
    }
}
$connect->close();
?>