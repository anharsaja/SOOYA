<?php
//import koneksi
require 'function.php';
// require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tracking</title>
    <link rel="icon" type="png" href="assets/img/trade.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="keluar.php">" S O O Y A "</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">
                            <h5>AKUN</h5>
                        </div>
                        <a class="nav-link" href="akun-admin.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Akun Admin
                        </a>

                        <a class="nav-link" href="akun-customer.php">
                            <div class="sb-nav-link-icon"></div>
                            Akun Customer
                        </a>

                        <br>

                        <div class="sb-sidenav-menu-heading">
                            <h5>JUAL BELI</h5>
                        </div>

                        <a class="nav-link" href="produk-admin.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Daftar Produk
                        </a>

                        <a class="nav-link" href="pemesanan.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Daftar Pemesanan
                        </a>

                        <a class="nav-link" href="riwayat-admin.php">
                            <div class="sb-nav-link-icon"></div>
                            Riwayat Penjualan
                        </a>

                        <br>

                        <div class="sb-sidenav-menu-heading">
                            <h5>MONITORING</h5>
                        </div>

                        <a class="nav-link" href="barang-masuk.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Bahan Masuk
                        </a>

                        <a class="nav-link" href="barang-keluar.php">
                            <div class="sb-nav-link-icon"></div>
                            Bahan Keluar
                        </a>

                    </div>
                    <div class="nav">
                        <br><br><br><br><br><br><br><br><br>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"></i></div>
                            Logout
                        </a>

                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">RIWAYAT PENJUALAN</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga Total</th>
                                            <th>Metode</th>
                                            <th>Pembeli</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from penjualan WHERE status='diterima'");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $idp = $data['idpenjualan'];
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $totalharga = $data['totalharga'];
                                            $metode = $data['metode'];
                                            $status = $data['status'];
                                            $pembeli = $data['pembeli'];
                                            $alamat = $data['alamat'];


                                        ?>

                                            <tr>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $totalharga; ?></td>
                                                <td><?= $metode; ?></td>
                                                <td><?= $pembeli; ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td><?= $status; ?></td>

                                            </tr>

                                            <!-- Kirim Modal -->
                                            <div class="modal fade" id="kirim<?= $idp; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Kirimkan Barang?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin mgnirimkan produk <b><?= $namabarang; ?></b>?
                                                                <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                                <br>
                                                                <br>
                                                                <button type="submit" class="btn btn-success" name="kirim-barang">Kirimkan Barang</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Batal Kirim -->
                                            <div class="modal fade" id="batal<?= $idp; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Batalkan Pengiriman?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin membatalkan pengiriman <b><?= $namabarang; ?></b>?
                                                                <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                                <br>
                                                                <br>
                                                                <button type="submit" class="btn btn-warning" name="batal-kirim">Batalkan Pengiriman</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>