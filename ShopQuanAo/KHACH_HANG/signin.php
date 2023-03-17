<?php
include_once('index.php');
if (isset($_POST['USERNAMEKH'])) {
   $USERNAMEKH = $_POST['USERNAMEKH'];
   $PASSWORD = md5($_POST['PASSWORD']);
   $query = "select*from khachhang where USERNAMEKH='$USERNAMEKH' and PASSWORD='$PASSWORD'";
   $result = $connect->query($query);
   $item = mysqli_fetch_array($result);
   if (mysqli_num_rows($result) == 0) {
      echo '<script>alert("Đăng nhập thất bại! Vui lòng nhập lại Tài khoản & Mật khẩu của bạn!!! ");</script>';
   } else {
      echo '<script>alert("Đăng nhập thành công!!! ");window.location="?option=shop";</script>';
      $_SESSION['khachhang'] = $USERNAMEKH;
      $_SESSION['makh'] = $item['MSKH'];
      // header("location:?option=home");
   }
}
?>
<html>
<div>
   <form class="form-login" method="POST">
      <div class="con-login">
         <header class="header-login">
            <h2 class="h2-login">Đăng Nhập</h2>
         </header>
         <div class="field-set">
            <span class="input-item">
               <i class="fa fa-user-circle"></i>
            </span>
            <input class="form-input" id="txt-input" type="text" name="USERNAMEKH" placeholder="Tên Tài Khoản" required>
            <br>
            <span class="input-item1">
               <i class="fa fa-key"></i>
            </span>
            <input class="form-input" type="password" placeholder="Mật Khẩu" id="pwd" name="PASSWORD" required>
            <span style="input-item2">
               <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
            </span>
            <br>
            <button class="button-login log-in">Đăng nhập</button>
         </div>
         <div class="other">
            <button class="button-login btn submits frgt-pass">Quên Mật Khẩu</button>
            <button class="button-login btn submits sign-up" href="?option=register">Đăng Ký
               <i class="fa fa-user-plus" aria-hidden="true"></i>
            </button>
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

</html>