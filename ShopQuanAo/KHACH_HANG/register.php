<?php
    include_once('index.php');
?>
<!DOCTYPE html>
<html>
<head>
<script>
/*function kiemtra(){
    var tendn=document.forms["form1"]["tendn"].value;
    var pass=document.forms["form1"]["pass"].value;
    var nlpass=document.forms["form1"]["nlpass"].value;
    var ho=document.forms["form1"]["ho"].value;
    var ten=document.forms["form1"]["ten"].value;
    var tencty=document.forms["form1"]["tencty"].value;
    var sdt=document.forms["form1"]["sdt"].vffalue;
    var tam=pass.length;
    var sdt1=sdt.lenght;
    var i=0;;
    if(tendn==null || tendn==""){
        alert("Bạn không được bỏ trống ô Tên đăng nhập");
        i=1;
        return false;
     }  elseif (pass==null || pass==""){
        alert("Bạn không được bỏ trống ô Password");
        i=1;
        return false;
    } else if (nlpass==null || nlpass==""){
        alert("Bạn không được bỏ trống ô Nhập lại password");
        i=1;
        return false;
    } else if (ho==null || ho==""){
        alert("Bạn không được bỏ trống ô Họ");
        i=1;
        return false;
    } else if (ten==null || ten==""){
        alert("Bạn không được bỏ trống ô Tên");
        i=1;
        return false;
    } else if (tencty==null || tencty==""){
        alert("Bạn không được bỏ trống ô Tên công ty");
        i=1;
        return false;
    } else if (sdt==null || sdt==""){
        alert("Bạn không được bỏ trống ô Số điện thoại");
        i=1;
        return false;
    } else if(tam<8 || tam>16){
        alert("Password không được ít hơn 8 ký tự và bé hơn 16 ký tự");
        i=1;
        return false;
    } else if(pass!=nlpass){
        alert("Password và Nhập lại password phải giống nhau");
        i=1;
        return false;
    } else if(sdt1<10 || sdt1>10){
        alert("Vui lòng nhập đủ 10 số điện thoại");
        i=1;
        return false;
    } else 
    for(var j=0; j<=tendn.length; j++){
        if(tendn.charAt(j)==' '){
            alert("Tên đăng nhập không được để khoảng trống"); 
            i=1;
            return false;
            }
        }
}
*/</script>
<?php
    if(isset($_POST['tendn'])){
        $USERNAMEKH = $_POST['tendn'];
        trim("$USERNAMEKH"," ");
        $PASSWORD = md5($_POST['pass']);
        $NLPASSWORD = md5($_POST['nlpass']);
        $Ho = $_POST['ho'];
        $Ten = $_POST['ten'];
        $TenCongTy = $_POST['tencty'];
        $SoDienThoai = $_POST['sdt'];
        $sdt1=strlen($SoDienThoai);
        $tam=strlen($_POST['pass']);
        $query="select*from khachhang where USERNAMEKH='$USERNAMEKH'";
        $result = $connect->query($query);
        if(mysqli_num_rows($result)==1){
                    echo '<script>alert("Tài khoản đã tồn tại!!! ");</script>';
                }elseif($USERNAMEKH==null || $USERNAMEKH==""){
                    echo '<script>alert("Bạn không được bỏ trống Tên đăng nhập!!! ");</script>';
                }elseif($USERNAMEKH==" "){
                    echo '<script>alert("Tên đăng nhập không có khoảng trắng!!! ");</script>';
                }elseif($PASSWORD==null || $PASSWORD==""){
                    echo '<script>alert("Bạn không được bỏ trống Mật khẩu!!! ");</script>';
                }elseif($tam<8 || $tam>16){
                    echo '<script>alert("Password không được ít hơn 8 ký tự và bé hơn 16 ký tự!!! ");</script>';
                }elseif($NLPASSWORD!=$PASSWORD){
                    echo '<script>alert("Bạn phải nhập Mật khẩu giống nhau!!! ");</script>';
                }elseif($Ho==null || $Ho==""){
                    echo '<script>alert("Bạn không được bỏ trống Họ!!! ");</script>';
                }elseif($Ten==null || $Ten==""){
                    echo '<script>alert("Bạn không được bỏ trống Tên!!! ");</script>';
                }elseif($TenCongTy==null || $TenCongTy==""){
                    echo '<script>alert("Bạn không được bỏ trống Tên công ty!!! ");</script>';
                }elseif($SoDienThoai==null || $SoDienThoai==""){
                    echo '<script>alert("Bạn không được bỏ trống Số điện thoại!!! ");</script>';
                }elseif($sdt1<10 || $sdt1>10){
                    echo '<script>alert("Số điện thoại phải đủ 10 chữ số!!! ");</script>';
                }else
                {
                    $query="INSERT INTO `khachhang` (`MSKH`, `USERNAMEKH`, `PASSWORD`, `HoTenKH`, `TenCongTy`, `SoDienThoai`) VALUES
                    (NULL, '$USERNAMEKH', '$PASSWORD', '$Ho $Ten', '$TenCongTy', '$SoDienThoai')";
                    $connect->query($query);
                    echo '<script>alert("Đăng ký thành công!!!");window.location="?option=signin";</script>';
                }
            }
    ?>
</head>
<body>
    <form class="form-login" method="post" id="form1">
        <div class="con-login">
   	    <header class="header-register">
            <h2 class="h2-login">&nbsp;&nbsp;&nbsp;Đăng ký</h2>
        </header>
        <br>
        <div class="field-set">
            <input class="form-input" id="txt-input" type="text" id="tendn" name="tendn" placeholder="Tên Tài Khoản" required><br>
            <input class="form-input" id="txt-input" type="password" id="pass" name="pass" placeholder="Mật Khẩu"><br>
            <input class="form-input" id="txt-input" type="password" id="nlpass" name="nlpass" placeholder="Nhập Lại Mật Khẩu"><br>
            <input class="form-input" id="txt-input" type="text" id="ho" name="ho" placeholder="Họ"><br>
            <input class="form-input" id="txt-input" type="text" id="ten" name="ten" placeholder="Tên"><br>
            <input class="form-input" id="txt-input" type="text" id="tencty" name="tencty" placeholder="Địa chỉ"><br>
            <input class="form-input" id="txt-input" type="text" id="sdt" name="sdt" placeholder="Số Điện Thoại"><br>
            <br>
            <input class="button-login log-in" style="width:250px;" type="submit" onClick="kiemtra();" name="submit" value="Đăng ký">
        </div>
        </form>
    </div>
</body>
</html>