<?php 
  include_once('index.php');
?> 
<!-- 
        <div class="text-center mt-2 ">
          <h3>Lịch sử đặt hàng</h3>
        </div> -->
<div class="container">
  <section class="py-2">
    <div class="container">
    <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 px-0 mt-2">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="?option=home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
          </ol>
        </nav>
          <?php 
            $maloaihang;
            if(isset($_GET['maloaihang']))
              $maloaihang=$_GET['maloaihang'];
            else 
              $maloaihang=0;
            if($maloaihang ==0)
              echo'<h4 class="text-uppercase text-center mt-2 mb-0">Tất cả sản phẩm</h4>';
            else{
              $sql_tenloaihang="select TenLoaiHang from loaihang where MaLoaiHang= $maloaihang";
              $ds_tlh=$connect->query($sql_tenloaihang);
              while($row=$ds_tlh->fetch_assoc()){
                echo'<center><h1 class="h3 mb-0">'.$row["TenLoaiHang"].'</h1></center>';
              }
            }
          ?>
        </div>
    </div>
  </section>
  <section class="py-5">
    <div class="container p-0">
      <div class="row">
        <?php
          if(isset($_GET['page']))
            $page=$_GET['page'];
          else 
            $page=1;
          $total_row;
          if($maloaihang ==0){
            $total_row = $connect->query("select * from hanghoa")->num_rows;
          }
          else{
            $total_row = $connect->query("select * from hanghoa where MaLoaiHang= $maloaihang")->num_rows;
          }
          $row_per_page=12;
          $start_row = $page*$row_per_page - $row_per_page;
          $total_page= ceil( $total_row/$row_per_page);
          $list_page=" "; 
          $pre_page=$page-1;
          if($pre_page==0)
            $list_page='<li class="page-item"><a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">«</span></a></li>';
          else
           $list_page='<li class="page-item"><a class="page-link" href="?option=shop&maloaihang='.$maloaihang.'&page='.$pre_page.'" aria-label="Previous">
                       <span aria-hidden="true">«</span></a></li>';
          if($page-1 > 1){
            $list_page.='<li class="page-item"><a class="page-link" href="?option=shop&maloaihang='.$maloaihang.'&page=1">1</a></li>';
            if($page-1 > 2)
              $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
          }
          $start= ($page-1 <1)?1:$page-1;
          $end=($page+1 >$total_page)?$total_page:$page+1;
          for($i=$start;$i<= $end;$i++){
            if($i==$page)
              $list_page.='<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
            else
              $list_page.='<li class="page-item"><a class="page-link" href="?option=shop&maloaihang='.$maloaihang.'&page='.$i.'">'.$i.'</a></li>';
            }
          if($page+1<$total_page-1){
            $list_page.='<li class="page-item "><span class="page-link" ><i class="fa fa-ellipsis-h"></i></span></li>';
          }
          if($page+1<$total_page){
            $list_page.='<li class="page-item"><a class="page-link" href="?option=shop&maloaihang='.$maloaihang.'&page='.$total_page.'">'.$total_page.'</a></li>';
          }
          $next_page=$page+1;
          if($next_page>$total_page)
            $list_page.=' <li class="page-item"><a class="page-link" href="" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
          else
            $list_page.=' <li class="page-item"><a class="page-link" href="?option=shop&maloaihang='.$maloaihang.'&page='.$next_page.'" aria-label="Next">
                          <span aria-hidden="true">»</span></a></li>';
          $sql_hanghoa;
          if($maloaihang ==0){
            $sql_hanghoa="select * from hanghoa limit $start_row, $row_per_page";
          }
          else{
            $sql_hanghoa="select * from hanghoa where MaLoaiHang= $maloaihang limit $start_row, $row_per_page";
          }
          $ds_hh=$connect->query($sql_hanghoa);
        ?>
        <div class="col-lg-12 order-1 order-lg-2 mb-5 mb-lg-0">
          <div class="row mb-3 align-items-center">
            <div class="col-lg-6 mb-2 mb-lg-0">
              <p class="text-small text-muted mb-0">Có <?php echo $total_row ?> sản phẩm </p>
            </div>
            <div class="col-lg-6">
            </div>
          </div>
          <div class="row">
            <?php 
              while($row=$ds_hh->fetch_assoc()){
            ?>
                <div class="col-6 col-lg-3 mb-3 ">
                  <div class="product">
                      <div class="mb-3 position-relative">
                        <a href="?option=hienthi&MSHH=<?=$row['MSHH']?>"><img src="Image/<?=$row['image']?>" height="450px" width="290px"></a>
                        <div class="product-overlay">
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=<?php echo $row["MSHH"]?>">Mua hàng</a></li>
                          </ul>
                        </div>
                      </div>
                    <a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=<?=$row['MSHH']?>"><?=$row['TenHH']?></a>
                    <div class="p-price pt-1">
                      <a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=<?=$row['MSHH']?>"><b><?=number_format($row['Gia'],0,',','.')?>đ</b></a>
                    </div>
                  </div>
                </div>
            <?php } ?>
          </div>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center justify-content-lg-end">
              <?php echo $list_page ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
</div>
  <!-- <ul class="pagination justify-content-end">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
   	<li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul> -->
<?php include_once ('footer.php'); ?>