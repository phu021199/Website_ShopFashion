<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Liên Hệ Cửa Hàng</h1>
<div class="form">
<form action="" id="form1">
<input type="text" id="fname" name="fname" placeholder="Họ tên"><br>
<input type="text" id="femail" name="femail" placeholder="Địa chỉ Email"><br>
<input type="text" id="fcontent" name="fcontent" placeholder="Nội dung yêu cầu"><br>
<input class="butt" type="button" value="Gửi yêu cầu" onclick="alert('Thông tin đóng góp của quý khách đã được ghi lại. Cảm ơn quý khách đã phản hồi !!!')">
</form>
</div>
</body>
</html>
<style>
.butt{
	height:50px;
	width:420px;
	border-radius:6px;
	font-size:20px;
	color:white;
	background:lightseagreen	;
	
}
h1{
	text-align:center;
	font-family:Time New Roman;
	font-size:50px;
	color:#057cb8;
	margin-top:60px;
	margin-bottom:60px;
}
.form {
text-align: center;
margin-top: 40px;
max-width:420px;
margin:50px auto;
}
#form1 input[type=text] {
color:black;
font-family: sans-serif;
font-weight:500;
font-size: 18px;
border-radius: 5px;
line-height: 22px;
background-color: transparent;
border:2px solid black;
transition: all 0.3s;
padding: 13px;
margin-bottom: 15px;
width:100%;
box-sizing: border-box;
outline:0;
}

#form1 #fcontent {
height: 100px;
}
#form1 input[type=submit] {
color:white;
font-family: sans-serif;
font-weight:500;
font-size: 18px;
border-radius: 5px;
line-height: 22px;
background-color: #CC6666;
border:2px solid #CC6666;
transition: all 0.3s;
padding: 13px;
margin-bottom: 15px;
width:100%;
box-sizing: border-box;
outline:0;
}
#form1 input[type="submit"]:hover {
background:#CC4949;
}
</style>
<?php include_once ('footer.php'); ?>