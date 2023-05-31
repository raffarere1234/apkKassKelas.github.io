<?php
$dataUser = dataUser();
$jml_pengeluaran = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(jumlah_pengeluaran) as jml_pengeluaran FROM pengeluaran"));
$jml_pengeluaran = $jml_pengeluaran['jml_pengeluaran'];

$jml_uang_kas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) as jml_uang_kas FROM uang_kas"));
$jml_uang_kas = $jml_uang_kas['jml_uang_kas'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Poppins&display=swap" rel="stylesheet">
<style>
  p{
    color: black;
  }
  
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="background: #DBDBF5;">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link" style="padding-bottom: 12px;">
    <img src="assets/img/cash.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light text-primary" style="font-size: 25px; margin-left:15px;font-family: 'Poppins';">IOCASH</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar fw-bold">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open bg-dark" style="margin-bottom: 5px; width: 230px;">
          <a href="profile.php" class="nav-link"><i class="nav-icon fas fa-fw fa-user"></i>
            <p class="text-white"><?= $dataUser['username']; ?></p>
          </a>
        </li>
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item" style="width: 230px;">
          <div class="bg-success nav-link text-white">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p class="text-white">
              Sisa Uang: <?= number_format($jml_uang_kas - $jml_pengeluaran); ?>
            </p>
          </div>
        </li>
        <li class="nav-item has-treeview menu-open" style="width: 230px;">
          <a href="index.php" class="nav-link active bg-primary">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="text-white">
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($dataUser['id_jabatan'] == '1') : ?>
          <li class="nav-item">
            <div class="nav-link">
              <p>
                <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#master" aria-expanded="false" aria-controls="collapseExample">
                 <div style="display:flex; justify-content:space-between; align-items:center; width:200px;">
                 <div style="margin-right:2px;">
                 <i class="fa-solid fa-gear text-primary"></i> <p style="font-size:20px; margin-left:10px;">Master</p>
                 </div>
                 <i class="bi bi-arrow-down-short text-primary"></i></div>
                </button>
              </p>
              <div class="collapse" id="master">
                <ul class="nav-item">
                  <li>
                    <a href="jabatan.php" class="nav-link">
                    <i class="nav-icon fas fa-cog text-primary"></i>
                    <p>
                      Jabatan
                    </p>
                  </a>
                  </li>
                  <li>
                  <a href="user.php" class="nav-link">
                  <i class="nav-icon fas fa-users text-primary"></i>
                    <p>
                      User
                    </p>
                  </a>
                  </li>
                  <li>
                  <a href="siswa.php" class="nav-link">
                    <i class="fas fa-user-tie nav-icon text-primary"></i>
                    <p>Siswa</p>
                  </a>
                  </li>
                </ul>
              </div>
            </div>

          </li>
        <?php endif ?>
        <li class="nav-item">
            <div class="nav-link">
              <p>
                <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#transaksi" aria-expanded="false" aria-controls="collapseExample">
                 <div style="display:flex; justify-content:space-between; align-items:center; width:200px;">
                 <div style="margin-right:2px;">
                 <i class="fa-solid fa-money-bill-wave text-primary"></i> <p style="font-size:20px; margin-left:10px;">Transaksi</p>
                 </div>
                 <i class="bi bi-arrow-down-short text-primary"></i></div>
                </button>
              </p>
              <div class="collapse" id="transaksi">
                <ul class="nav-item">
                  <li>
                  <a href="uang_kas.php" class="nav-link">
            <i class="fas fa-dollar-sign nav-icon text-primary"></i>
            <p>Uang Kas</p></a>
                  </li>
                  <li>
                  <a href="pengeluaran.php" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon text-primary"></i>
            <p>Pengeluaran</p>
          </a>
                  </li>
                </ul>
              </div>
            </div>

          </li>
          <li class="nav-item">
            <div class="nav-link">
              <p>
                <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false" aria-controls="collapseExample">
                 <div style="display:flex; justify-content:space-between; align-items:center; width:200px;">
                 <div style="margin-right:2px;">
                 <i class="bi bi-clipboard2-data-fill text-primary"></i> <p style="font-size:20px; margin-left:10px;">Laporan</p>
                 </div>
                 <i class="bi bi-arrow-down-short text-primary"></i></div>
                </button>
              </p>
              <div class="collapse" id="laporan">
                <ul class="nav-item">
                  <li>
                  <a href="data_pemasukan.php" class="nav-link">
                  <i class="bi bi-box-arrow-in-right text-primary"></i> <p>Pemasukkan</p></a>
                  </li>
                  <li>
                  <a href="data_pengeluaran.php" class="nav-link">
                  <i class="bi bi-box-arrow-right text-primary" style="margin-left: 5px;"></i> <p>Pengeluaran</p>
          </a>
                  </li>
                </ul>
              </div>
            </div>

          </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item">
            <div class="nav-link">
              <p>
                <button class="btn text-white" type="button" data-bs-toggle="collapse" data-bs-target="#riwayat" aria-expanded="false" aria-controls="collapseExample">
                 <div style="display:flex; justify-content:space-between; align-items:center; width:200px;">
                 <div style="margin-right:2px;">
                 <i class="fa-solid fa-clock text-primary"></i> <p style="font-size:20px; margin-left:10px;">Riwayat</p>
                 </div>
                 <i class="bi bi-arrow-down-short text-primary"></i></div>
                </button>
              </p>
              <div class="collapse" id="riwayat">
                <ul class="nav-item">
                  <li style="margin-right: 30px;">
                  <a href="riwayat_kas.php" class="nav-link">
                  <i class="fa-solid fa-money-bill-trend-up text-primary"></i>
            <p>Riwayat Uang Kas</p></a>
                  </li>
                  <li style="padding-right:10px;">
                  <a href="riwayat_pengeluaran.php" class="nav-link">
                  <i class="bi bi-box-arrow-right text-primary"></i> <p>Riwayat Pengeluaran</p>
          </a>
                  </li>
                </ul>
              </div>
            </div>

          </li>
      </ul>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  $(document).ready(function(){
    $('nav li a').click(function(){
      $('li a.active').removeClass('active');
      $(this).addClass('active');
    });
  });
 

</script>
