<?php
$chk = $_POST['checked'];
if(!isset($chk)) {
   echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
} else {
include_once('../_header.php'); ?>

<div class="slides">
          <div class="slide" id="2">
            <div class="content second-content" style="color: white;">
         <h1>Poliklinik</h1>
         <h4>
         	<small>Edit Data Poliklinik</small>
            <div class="pull-right">
               <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>  
            </div>
         </h4>
         <div class="row">
         	<div class="col-lg-8 col-lg-offset-2">
         		<form action="proses.php" method="post">
         			<input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                  <table class="table">
                     <tr>
                           <th>#</th>
                           <th>Nama Poliklinik</th>
                           <th>Alamat</th>
                     </tr>
                     <?php
                     $no = 1;
                     foreach ($chk as $id){
                        $sql_poli = mysqli_query($con,"SELECT * FROM poli WHERE id = '$id'") or die (mysqli_error());
                        while($data = mysqli_fetch_array($sql_poli)) { ?>
                           <tr>
                              <td><?=$no++?></td>
                              <td>
                                 <input type="hidden" name="id[]" value="<?=$data['id']?>">
                                 <input type="text" name="nama[]" value="<?=$data['nama_poli']?>" class="form-control" required>
                              </td>
                              <td>
                                 <input type="text" name="keterangan[]" value="<?=$data['keterangan']?>"  class="form-control" required>
                              </td>
                           </tr>         
                        <?php  
                           } 
                        }
                     ?>
                  </table>
                  <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
                  </div>
         		</form>
         	</div>
         </div>
      </div>
   </div>
   <?php 
   include_once('../_footer.php'); 

   } ?>