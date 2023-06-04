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
    <title>Pemesanan</title>
    <link rel="icon" type="png" href="assets/img/trade.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="keluar.php">G U D A N G</a>
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

                        <a class="nav-link" href="produk-user-premium.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Daftar Produk
                        </a>

                        <a class="nav-link" href="pemesanan-user.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Daftar Pemesanan
                        </a>

                        <div class="sb-sidenav-menu-heading">
                            <h5>BAHAN BAKU</h5>
                        </div>

                        <a class="nav-link" href="barang-masuk-user.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-warehouse fa-bounce"></i></div>
                            Bahan Masuk
                        </a>

                        <a class="nav-link" href="barang-keluar-user.php">
                            <div class="sb-nav-link-icon"></div>
                            Bahan Keluar
                        </a>


                    </div>
                    <div class="nav">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-akun">
                                Ubah Data Akun
                            </button>
                        </div>
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
                    <h1 class="mt-4">PEMESANAN</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Pembeli</th>
                                            <th>Alamat</th>
                                            <th>Harga Satuan</th>
                                            <th>Harga Total</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from pemesanan p, stock s where s.idbarang = p.idbarang");
                                        while ($data = mysqli_fetch_array($ambilsemuadatastock)) {
                                            $idp = $data['idpemesanan'];
                                            $idb = $data['idbarang'];
                                            $tanggal = $data['tanggal'];
                                            $penerima = $data['pembeli'];
                                            $alamat = $data['alamat'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $harga = $data['harga'];
                                        ?>

                                            <tr>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $qty; ?></td>
                                                <td><?= $penerima; ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td><?= $harga; ?></td>
                                                <td><?= $harga * $qty; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $idp; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $idp; ?>">
                                                        Delete
                                                    </button>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#checkout<?= $idp; ?>">
                                                        CheckOut
                                                    </button>
                                                </td>

                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?= $idp; ?>">
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
                                                                <br>

                                                                <h6 class="modal-title">Quantity</h6>
                                                                <input type="number" name="qty" value="<?= $qty; ?>" class="form-control" required>
                                                                <br>
                                                                <h6 class="modal-title">Alamat</h6>
                                                                <input type="text" name="alamat-new" value="<?= $alamat; ?>" class="form-control" required>
                                                                <br>
                                                                <h6 class="modal-title">Atas Nama</h6>
                                                                <input type="text" name="pembeli-new" value="<?= $penerima; ?>" class="form-control" required>
                                                                <br>
                                                                <h6 class="modal-title">Metode Pembayaran</h6>

                                                                <select name="barangnya" class="form-control">
                                                                    <?php
                                                                    $ambilsemuadatanya = mysqli_query($conn, "select * from pembayaran");
                                                                    while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                                                        $idbarangnya = $fetcharray['idbarang'];
                                                                        $metode = $fetcharray['metode_pembayaran'];

                                                                    ?>

                                                                        <option value="<?= $metode; ?>"><?= $metode; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br>
                                                                <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                                <button type="submit" class="btn btn-primary" name="edit-pemesanan-user">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $idp; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Barang?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus <b><?= $namabarang; ?></b>?
                                                                <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                                <br>
                                                                <br>
                                                                <button type="submit" class="btn btn-danger" name="hapus-pemesanan-user">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Checkout Modal -->
                                            <div class="modal fade" id="checkout<?= $idp; ?>">
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
                                                                <br>

                                                                <h6 class="modal-title">Quantity</h6>
                                                                <input type="number" name="qty" value="<?= $qty; ?>" class="form-control" required>
                                                                <br>
                                                                <h6 class="modal-title">Alamat</h6>
                                                                <input type="text" name="alamat-new" value="<?= $alamat; ?>" class="form-control" required>
                                                                <br>
                                                                <h6 class="modal-title">Atas Nama</h6>
                                                                <input type="text" name="pembeli-new" value="<?= $penerima; ?>" class="form-control" required>
                                                                <br>
                                                                <h6 class="modal-title">Metode Pembayaran</h6>

                                                                <select name="metodenya" class="form-control">
                                                                    <?php
                                                                    $ambilsemuadatanya = mysqli_query($conn, "select * from pembayaran");
                                                                    while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                                                        $idbarangnya = $fetcharray['idbarang'];
                                                                        $metode = $fetcharray['metode_pembayaran'];

                                                                    ?>

                                                                        <option value="<?= $metode; ?>"><?= $metode; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br>
                                                                <input type="hidden" name="idp" value="<?= $idp; ?>">
                                                                <button type="submit" class="btn btn-primary" name="edit-pemesanan-user">Simapn dan Keluar</button>
                                                                <button type="submit" class="btn btn-success" name="checkout-pesanan">Checkout Now</button>
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

<!-- mengubah data akun user -->

<div class="modal fade" id="ubah-akun">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Akunmu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="username" placeholder="Username Baru" class="form-control" required>
                    <br>
                    <input type="text" name="email" placeholder="Email Baru" class="form-control" required>
                    <br>
                    <input type="password" name="password" placeholder="Password Baru" class="form-control" required>
                    <br>
                    <input type="password" name="password-old" placeholder="Password Lama" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="ubah-akun-user">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>