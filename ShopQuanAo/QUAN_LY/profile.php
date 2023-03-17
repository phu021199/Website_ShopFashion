<?php
$title = 'THÔNG TIN CÁ NHÂN';
include_once('footer.php');
$msnv = $_SESSION['MSNV'];
$sql_dh = "select * from NhanVien where MSNV='$msnv'";
$ds_dh = $connect->query($sql_dh);
while ($row = $ds_dh->fetch_assoc()) {
  $pw = $row['Password'];
?>

<body>
<div class="container main-ht">
    <div class="row mb-lg-4">
      <div class="col pview-product-content my-3 d-none d-lg-block">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home">Thông tin cá nhân</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="border:0;"><b>|</b></a>
          </li>
          <li class="nav-item">
            <a class=nav-link data-bs-toggle="tab" href="#home1">Đổi mật khẩu</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="home" class="container tab-pane active mb-5"><br>
            <form action="" method="post">
              <span>Tên Đăng Nhập:</span>
              <input type="text" class="form-control mt-3" disabled value='<?php echo $row["UsernameNV"] ?>'>
              <hr class="solid">
              <span>Họ Tên:</span>
              <input type="text" class="form-control mt-3" name="hoten" value='<?php echo $row["HoTenNV"] ?>'>
              <hr class="solid">
              <span>Chức Vụ:</span>
              <input type="text" class="form-control mt-3" disabled value='<?php echo $row["ChucVu"] ?>'>
              <hr class="solid">
              <span>Số Điện Thoại:</span>
              <input type="text" class="form-control mt-3" name="sdt" value='<?php echo $row["SoDienThoai"] ?>'>
              <hr class="solid">
              <span>Địa Chỉ:</span>
              <input type="text" class="form-control mt-3" name="dc" value='<?php echo $row["DiaChi"] ?>'>
              
              <center><button class="btn btn-primary mt-5" type="submit" name="updateprofile" value="Cập nhật">Cập
                  Nhật</button></center>
            </form>
          </div>
          <div id="home1" class="container tab-pane fade"><br>
            <form action="" method="post">
              <span>Mật Khẩu Cũ:</span>
              <input type="password" class="form-control mt-3" id="password" name="mkc" placeholder=''
                onblur="CheckPass()">
              <div class="col-lg-12">
                <span class="text-danger" id="mess_pass"></span>
              </div>
              <hr class="solid">
              <span>Mật Khẩu Mới:</span>
              <input type="password" class="form-control mt-3" id="password1" name="mkm" placeholder=''
                onblur="CheckPass1()">
              <div class="col-lg-12">
                <span class="text-danger" id="mess_pass1"></span>
              </div>
              <hr class="solid">
              <span>Nhập Lại Mật Khẩu Mới:</span>
              <input type="password" class="form-control mt-3" id="password2" name="nlmk" placeholder=''
                onblur="CheckPass2()">
              <div class="col-lg-12">
                <span class="text-danger" id="mess_pass2"></span>
              </div>
              
              <center><button class="btn btn-primary mt-5" type="submit" value="Cập nhật" name="updatepw">Cập Nhật</button>
              </center>
            </form>
          </div>
</body>

<script>
  function CheckPass() {
    var x = document.getElementById("password");
    if (!x.value) {
      mess_pass.textContent = "Vui lòng nhập mật khẩu";
    } else {
      if (x.value.length > 16 || x.value.length < 6) {
        mess_pass.textContent = "Mật khẩu có độ dài từ 6- 16 ký tự";
      } else {
        mess_pass.textContent = "";
      }
    }
  };

  function CheckPass1() {
    var x = document.getElementById("password1");
    if (!x.value) {
      mess_pass1.textContent = "Vui lòng nhập mật khẩu";
    } else {
      if (x.value.length > 16 || x.value.length < 6) {
        mess_pass1.textContent = "Mật khẩu có độ dài từ 6- 16 ký tự";
      } else {
        mess_pass1.textContent = "";
      }
    }
  };

  function CheckPass2() {
    var x = document.getElementById("password2");
    if (!x.value) {
      mess_pass2.textContent = "Vui lòng nhập mật khẩu";
    } else {
      if (x.value.length > 16 || x.value.length < 6) {
        mess_pass2.textContent = "Mật khẩu có độ dài từ 6- 16 ký tự";
      } else {
        mess_pass2.textContent = "";
      }
    }
  };
</script>

<?php
}
if (isset($_POST["updateprofile"])) {
    $HoTenNV = $_POST['hoten'];
    $sdt = trim($_POST['sdt']);
    $DiaChi = trim($_POST['dc']);
    $sql_update = "update NhanVien set HoTenNV='$HoTenNV', SoDienThoai='$sdt', DiaChi='$DiaChi' where MSNV='$msnv'";
    if ($connect->query($sql_update)) {
      echo '<script>alert("Cập nhật thông tin thành công!!! ");window.location="?option=profile";</script>';
    } else
      echo '<script>alert("Cập nhật thất bại!!! ");</script>';
  }
if (isset($_POST["updatepw"])) {
    $PASSWORD = md5($_POST['mkc']);
    $PASSWORDnew = md5($_POST['mkm']);
    $NLPASSWORD = md5($_POST['nlmk']);
    $tam = strlen($_POST['mkm']);
    if ($PASSWORD != $pw) {
      echo '<script>alert("Sai mật khẩu!!! ");</script>';
    } elseif ($PASSWORD == null || $PASSWORD == "" || $PASSWORDnew == NULL || $PASSWORDnew == "" || $NLPASSWORD == NULL || $NLPASSWORD == "") {
      echo '<script>alert("Vui lòng nhập đủ thông tin ");</script>';
    } elseif ($tam < 8 || $tam > 16) {
      echo '<script>alert("Password không được ít hơn 8 ký tự và bé hơn 16 ký tự!!! ");window.location="?option=profile";</script>';
    } elseif ($NLPASSWORD != $PASSWORDnew) {
      echo '<script>alert("Bạn phải nhập Mật khẩu giống nhau!!! ");window.location="?option=profile";</script>';
    } else {
      $query_update = "update NhanVien set Password='$PASSWORDnew' where MSNV='$msnv'";
      $connect->query($query_update);
      echo '<script>alert("Cập nhật mật khẩu thành công!!!");window.location="?option=profile";</script>';
    }
  }
?>