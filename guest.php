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
    <title>Stock Gudang</title>
    <link rel="icon" type="png" href="assets/img/warehouse.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="guest.php">
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
                            <h5>PRODUCT</h5>
                        </div>

                        <a class="nav-link" href="guest.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Daftar Produk
                        </a>


                    </div>
                    <div class="nav">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <!-- <div class="card-header"> -->
                        <!-- Button to Open the Modal -->
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-akun">
                                Ubah Data Akun
                            </button> -->
                        <!-- </div> -->
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"></i></div>
                            Sig in
                        </a>

                    </div>
                </div>

            </nav>
        </div>


        <div id="layoutSidenav_content">
        <div class="oi text-center mt-3">
                <img height="500px" width="800px" src="assets/img/susu2.webp" alt="">
            </div>
            <main>
                <div class="container-fluid">
                    
                    <h1 class="mt-4">Stock Gudang</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Harga Satuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $namabarang = $data['namabarang'];
                                            $stock = $data['stock'];
                                            $idb = $data['idbarang'];
                                            $idbarang = $data['idbarang'];
                                            $harga = $data['harga'];
                                        ?>

                                            <tr>
                                                <td><?= $idbarang; ?></td>
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $stock; ?></td>
                                                <td><?= $harga; ?></td>
                                            </tr>
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