<!-- Tampilkan halaman Dashboard -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>/assets/images/Logo PIO.png">

    <title>Administrator PIORA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>/assets/bootstrap/css/style-admin.css" rel="stylesheet">

    <!-- font-awesome untuk ikon -->
    <link href="<?php echo base_url();?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

  </head>

  <body>

    <nav><?php include 'template/navbar.php'; ?></nav>

    <div class="container-fluid">
      <div class="row">
          <aside>
              <?php $home = "class='active'"; ?>
              <?php include 'template/sidebar.php'; ?>
          </aside>

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Semua Obat <a href="<?php echo base_url();?>admin/obat/add" class="btn btn-success pull-right"><i class="fa fa-plus-circle fa-lg"></i> Tambah Obat</a></h2>
  <div class="table-responsive">
  <?php if($this->session->flashdata('message', 'Data berhasil diperbarui')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('message', 'Data berhasil diperbarui').'</p>'; ?>
                    <?php endif; ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Obat</th>
          <th>Merek Dagang</th>
          <th>Penulis</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
                       $no++;
                       $id_obat=$i['id_obat'];
          					   $nama_generik=$i['nama_generik'];
                       $merek_dagang=$i['merek_dagang'];
                       $id_admin=$i['id_admin'];
                    ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $nama_generik;?></td>
        				  <td><?php echo $merek_dagang;?></td>
                  <td><?php echo $id_admin;?></td>
                  <td style="text-align:left;">
                        <a class="btn" href="<?php echo base_url().'obat/edit/'.$id_obat;?>" ><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_obat;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				<?php endforeach;?>
      </tbody>
    </table>

  </div>
</div>

<?php foreach ($data->result_array() as $i) :
              $id_obat=$i['id_obat'];
              $nama_generik=$i['nama_generik'];
              $merek_dagang=$i['merek_dagang'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_obat;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'obat/delete/'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="id_obat" value="<?php echo $id_obat;?>"/>
                            <p>Apakah Anda yakin mau menghapus Obat <b><?php echo $nama_generik;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>/assets/bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/bootstrap/js/holder.js"></script>
  </body>
</html>
