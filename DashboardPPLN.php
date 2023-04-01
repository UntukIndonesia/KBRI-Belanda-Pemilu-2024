<?php
include('koneksipemilu.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
<link href="https://cdn01.rumahweb.com/under-construction/style.css" rel="stylesheet">
    <!-- <meta http-equiv="refresh" content="60;url=http://www.google.com/" /> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard PPLN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S5WX91Y7HP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S5WX91Y7HP');
</script>
</head>

<body>

	<div style="background: #a00101;color:#fff;padding:10px;">
		<div class="container text-center" style="font-size:14px;font-weight:600;line-height: 20px;">Website Resmi PPLN RI BELANDA</div>
	</div>
	
	<!-- <section class="hero"> -->
	<section style="background: #FFFFFF;padding: 10px 0;">
		<!-- <div style="background-image:url('https://pplndenhaag2024.com/wp-content/uploads/2023/02/cropped-cropped-PPLN-DEN-HAAG.jpeg');background-repeat:no-repeat;margin: -60px 0;padding: 60px 0;background-position: 30px 50px;"> -->
			<div class="container">
				<div class="row no-gutters">
				    <div class="col-6 col-md-4" style="float:none;margin:auto;"><img src="https://pplndenhaag2024.com/wp-content/uploads/2023/02/cropped-cropped-PPLN-DEN-HAAG.jpeg" width="200" height="180";></div>
					<div class="col-12 col-md-8">
					    <h2><b style="color: #a00101;">PPLN DEN HAAG 2024</b></h2>
						<p class="top3">Silahkan akses dashboard ini setiap saat ingin melihat perkembangan pemilih<b>#saatnyamemilih</b> <b>#untukindonesia</b></p>
					</div>
					<!-- <div class="col-sm"><img src="https://cdn01.rumahweb.com/under-construction/img/hero.png" alt="<?php echo ucfirst($_SERVER['HTTP_HOST']);?> sudah aktif" width="400"></div> -->
				</div>
			</div>
		<!-- </div> -->
	</section>

<!-- <section class="steps" style="padding: 10px 0;"> -->
<section class="steps" style="10px 100px 20px;">
    <div class="container">
		<h2 class="text-center" style="font-size:36px; font-weight:600;color:#a00101;line-height:50px;margin-bottom: 40px;">Cari TPS Pemilih PEMILU RI 2024</h2>
		<div class="row">
		    <div class="col-sm">
            </div>
            <div class="col-8">
              <form action="" method="post" style="width:50vw; min-width:100px;">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nomor_passport" placeholder="Nomor Passport">
                        <label for="floatingpassport">Nomor Passport</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                        <label for="floatingnama">Nama sesuai passpor</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
                        <label for="floatingtgllahir">Tanggal Lahir sesuai passpor</label>
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="submit"><b>Cari!</b></button>
                    <br>
                    <?php
                    if(isset($_POST['submit'])) {
                        $nomor_passport = $_POST['nomor_passport'];
                        $nama = $_POST['nama'];
                        $tanggal_lahir = $_POST['tanggal_lahir'];
                        
                        //$sql = "SELECT 'tps' FROM pantarlih WHERE ('noPaspor' = '$nomor_passport') AND ('nama' = '$nama') AND ('tglLahir' = '$tanggal_lahir') ";
                        $sql = "SELECT tps FROM pantarlih WHERE (noPaspor = '$nomor_passport') AND (nama = '$nama') AND (tglLahir = '$tanggal_lahir') ";
                        
                        $result = mysqli_query($sambung, $sql);
                        
                        //if($result) {
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "Selamat, anda telah terdaftar sebagai Pemilih Pemilu RI 2024. Nomor TPS anda adalah: " . $row["tps"]. "<br>";    
                            }
                        }else{
                            echo "Mohon maaf anda belum terdaftar. Pastikan anda menginput nomor passpor, nama, dan tanggal lahir dengan tepat! Jika ada belum mendaftar silahkan klik link berikut ini.";
                            //echo "Failed: " . mysqli_error($sambung);
                            //echo "Failed: " . $sql;
                        }
                    }
                    ?>
                    
                    </form>
            </div>
            <div class="col-sm">
            </div>
		    
        </div>
	</div>
</section>

<section class="steps" style="padding: 10px 0;">
		<div class="container">
			<h2 class="text-center" style="font-size:36px; font-weight:600;color:#a00101;line-height:50px;margin-bottom: 40px;">Dashboard Daftar Pemilih PEMILU RI 2024 di Belanda</h2>
			<div class="row">
				
				      	<h4>Daftar Pemilih Terkini</h4>
				      	<p>Data di refresh setiap jam untuk menunjukkan progress daftar pemilih setiap saat</p>
				      	<ul>
									<?php
									foreach ($links->email as $email){
										echo '<li><a href="'.$email->url.'" title="'.$email->title.'">'.$email->title.'</a></li>';
									}
									?>
				      	</ul>
				      	<div class="chart">
				      	    <canvas id="tinggiChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>

			</div>
		</div>
	</section>
	


  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://pplndenhaag2024.com">PPLN RI di Belanda</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- Suhu App -->
<script src="appsV2.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script type="text/javascript">
    var get_tinggiValue = setInterval(function () 
    {
        $('#tinggiValue').load('tinggiValue.php').fadeIn("slow");
    }, 
    1000);
    var get_dateValue = setInterval(function () 
    {
        $('#dateValue').load('dateValue.php').fadeIn("slow");
    }, 
    1000);
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
 
    

</script>
<script type="text/javascript">
    var grafik_tinggiValue = setInterval(function () 
    {
        $('#tinggiChart').load('PemilihChart1.php').fadeIn("slow");
    }, 
    1000);
    
</script>

<!-- <script type="text/javascript">
    var grafik_tinggiValue = setInterval(function () 
    {
        $('#tinggiChart2').load('tinggiValueChart2.php').fadeIn("slow");
    }, 
    1000);
    
</script> -->


</body>
</html>
