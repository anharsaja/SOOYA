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
    <title>Monitoring Bahan Masuk</title>
    <link rel="icon" type="png" href="assets/img/warehouse.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="akun-admin.php">
            " S O O Y A "
        </a>
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
                    <h1 class="mt-4">BAHAN MASUK</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Bahan Masuk
                            </button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from masuk");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $idb = $data['idbarang'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $tanggal = $data['tanggal'];
                                        ?>

                                            <tr>
                                                <td><?= $idb; ?></td>
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $idb; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $idb; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $idb; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data Barang</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control" required>
                                                                <br>
                                                                <input type="text" name="qty" value="<?= $qty; ?>" class="form-control" required>
                                                                <br>
                                                                <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                                <button type="submit" class="btn btn-primary" name="update-masuk">Submit</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $idb; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Bahan?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus <b><?= $namabarang; ?></b>?
                                                                <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                                <br>
                                                                <br>
                                                                <button type="submit" class="btn btn-danger" name="hapus-masuk">Submit</button>
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Bahan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="idbarang" placeholder="ID Barang" class="form-control" required>
                    <br>
                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                    <br>
                    <input type="number" name="stock" placeholder="Stock" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="tambah-bahan-masuk">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>