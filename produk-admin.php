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
        <a class="navbar-brand" href="produk-admin.php">
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
            <div class="oi text-center mt-3">
                <img height="500px" width="800px" src="assets/img/susu2.webp" alt="">
            </div>
            <main>
                <div class="container-fluid">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <h4><strong>Description</strong></h4>
                            <h6>Sebuah penelitian menunjukkan bahwa wanita yang meminum susu kedelai setiap hari memiliki risiko osteoporosis 56% lebih rendah dibandingkan dengan wanita yang tidak meminumnya. Selain itu, susu kedelai dapat meringankan gejala menopause, seperti sensasi rasa panas (hot flashes) dan berkeringat di malam hari. Kedelai juga diduga dapat membantu fungsi kognitif wanita yang berusia di bawah 65 tahun. Sedangkan anggapan bahwa susu kedelai berguna bagi kesehatan jantung masih diteliti. Manfaat susu kedelai lainnya tidak terlepas dari kandungan yang ada dalam kedelai. Berikut beberapa kandungan susu kedelai yang baik bagi tubuh:</h6><br>
                            <p>1. Susu kedelai mengandung protein yang hampir sama banyaknya dengan susu sapi, tapi dengan kalori yang lebih rendah.</p>
                            <p>2. Vitamin D penting untuk kesehatan tulang. Banyak susu kedelai yang dijual telah ditambahkan dengan vitamin D.</p>
                            <p>3. Vitamin B12 membantu memproduksi sel darah merah sehingga mencegah anemia. Sumber vitamin B12 antara lain adalah telur dan produk susu.</p>
                            <p>4. Susu kedelai juga mengandung seng (zinc) yang penting untuk sistem kekebalan tubuh.</p>
                            <p>5. Kedelai tinggi akan kandungan asam lemak, seperti omega-3, yang dapat membantu mengurangi kadar lemak darah (kolesterol total dan trigliserida), sehingga mengurangi risiko penyakit jantung koroner dan serangan jantung.</p>
                            <p>6. Berkat kandungan nutrisinya yang beragam, susu kedelai juga baik dikonsumsi oleh ibu hamil, asalkan jumlahnya tidak berlebihan.</p>


                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Add Items
                            </button>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Harga Satuan</th>
                                            <th>Option</th>
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
                                            $harga = $data['harga']
                                        ?>

                                            <tr>
                                                <td><?= $idbarang ?></td>
                                                <td><?= $namabarang; ?></td>
                                                <td><?= $stock; ?></td>
                                                <td><?= $harga; ?></td>
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
                                                                <input type="text" name="idbarang" value="<?= $idbarang; ?>" class="form-control" required>
                                                                <br>
                                                                <input type="text" name="namabarang" value="<?= $namabarang; ?>" class="form-control" required>
                                                                <br>
                                                                <input type="text" name="stock" value="<?= $stock; ?>" class="form-control" required>
                                                                <br>
                                                                <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                                <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
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
                                                            <h4 class="modal-title">Hapus Barang?</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus <b><?= $namabarang; ?></b>?
                                                                <input type="hidden" name="idb" value="<?= $idb; ?>">
                                                                <br>
                                                                <br>
                                                                <button type="submit" class="btn btn-danger" name="hapusbarang">Submit</button>
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
                <h4 class="modal-title">Tambah Data Barang</h4>
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
                    <input type="number" name="harga" placeholder="Harga satuan" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="admin-register">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Akun Admin</h4>
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
                    <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

</html>