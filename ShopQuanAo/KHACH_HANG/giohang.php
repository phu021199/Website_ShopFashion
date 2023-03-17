<?php
	include_once('index.php');
	if(empty($_SESSION['giohang'])){
		$_SESSION['giohang']=array();
	}
		if(isset($_GET['action'])){
			$MSHH=isset($_GET['MSHH'])?$_GET['MSHH']:'';
			switch($_GET['action']){
				case'add':
				if(isset($_POST['soluong'])){
					$id = (int)$_POST['soluong'];
					if(array_key_exists($MSHH, array_keys($_SESSION['giohang']))){
						$_SESSION['giohang'][$MSHH]+=$id;
					}else{
						$_SESSION['giohang'][$MSHH]=$id;
					}
				}
					break;
				case'delete':
				unset($_SESSION['giohang'][$MSHH]);
			}
		}
	if(empty($_SESSION['giohang'])){
		echo "<script type='text/javascript'>alert('Giỏ hàng của bạn trống.');  location.href = '?option=home'; </script>";
	}
	if(isset($_SESSION['giohang'])):
			$MSHH_1=implode(',', array_keys($_SESSION['giohang']));		
			$query="select*from hanghoa where MSHH in($MSHH_1)";
			$result=$connect->query($query);
?>
<div class="container">
	<h1 class="text-primary text-center mb-5">Giỏ Hàng Của Bạn</h1>
	<table cellpadding="0" cellspacing="0">
		<thead>
		</thead>
		<tbody>
<?php
	$toTal=0;
//	if(isset($item))
//		echo "<script type='text/javascript'>alert('Giỏ hàng của bạn đang rỗng hãy nhanh vào danh sách sản phảm sắm cho nhanh mình một chiếc điện thoại thông minh nào!!');  location.href = '?option=home'; </script>";
//		else 
	if (is_array($result) || is_object($result))
		foreach($result as $item):
?>
		<tr class="img-space">
			<td width="20%"><a href="?option=hienthi&MSHH=<?=$item['MSHH']?>"><img class="mb-3" width="50%" src="Image/<?=$item['image']?>"></a></td>
			<td width="20%" class="full1"><?=$item['TenHH']?><br><input class="btn btn-dark" type="button" value="Delete" onclick="location='?option=giohang&action=delete&MSHH=<?=$item['MSHH']?>';"></td>
			<td width="20%" class="full1"><?=number_format($item['Gia'],0,',','.')?> vnđ</td>
			<td class="full1"><?=$_SESSION['giohang'][$item['MSHH']]?></td>
			<td class="full2"><?=number_format($SubTotal=$item['Gia']*$_SESSION['giohang'][$item['MSHH']],0,',','.')?> vnđ</td>
		</tr>
	<?php $toTal+=$SubTotal; ?>
<?php
	endforeach;
?>
	</table>
	</tbody>
<?php
	endif;
?>
<div>
		<section class="tong mt-4"><strong>Tổng Tiền: <?=number_format($toTal,0,',','.')?>vnđ</strong></section>
		<section class="giua mb-5"><input class="btn btn-dark my-3" type="button" value="Đặt Hàng" onclick="location='?option=dathang';"></section>
		</div>
</div>
<style>
	.img-space{
		margin-bottom:20px;
	}
	.gio{
		color: #555555;
		font-size:45px;
		text-align: center;
		color:blue;
	}
	.full{
		text-align:center;
		font-size:23px;
		background:#222222;
		color:white;
	}
	.full1{
		text-align:center;
		font-size:23px;
	}
	.full2{
		text-align:center;
		font-size:23px;
	}
	.ogiua{
		margin-top:10px;
		text-align:center;
		font-size:25px;
		background:#EEEEEE;
		font-family:Time New Roman;
		color:#006600;
		font-weight:bold;
	}
	.tong{
		margin-top:10px;
		text-align:center;
		border-radius:5px;
		font-size:22px;
	}
	.giua{
		text-align:center;
	}
	input{
		border-radius:7px;
	}
</style>
<?php include_once ('footer.php'); ?>