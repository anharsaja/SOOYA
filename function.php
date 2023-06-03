<?php
session_start();


//Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "stockbarang");

# ===========================================================================================




# Ubah data akun user


if (isset($_POST['hapus-akun-user'])) {
    $oldUsernmae = $_POST['username-lama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $update = mysqli_query($conn, "update login set (username, email, password) vallues ('$username','$email','$password') where username='$oldUsername'");
    if ($hapus) {
        header('location:akun-admin.php');
    } else {
        echo 'Gagal';
        header('location:akun-admin.php');
    }
}




# ===========================================================================================

# menambah pemesanan - user
if (isset($_POST['tambahkeranjang'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['pembeli'];
    $qty = $_POST['stock'];

    $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang - $qty;

    $addtokeluar = mysqli_query($conn, "insert into pemesanan (idbarang, qty, pembeli) values ('$barangnya','$qty','$penerima')");
    $updatestockmasuk = mysqli_query($conn, "update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if ($addtokeluar && $updatestockmasuk) {
        header('location:pemesanan-user.php');
    } else {
        header('location:produk-user-premium.php');
    }
}

# ===========================================================================================

//menghapus akun admin  
if (isset($_POST['hapus-akun-admin'])) {
    $iduser = $_POST['iduser'];
    $hapus = mysqli_query($conn, "delete from login where iduser='$iduser'");
    if ($hapus) {
        header('location:akun-admin.php');
    } else {
        echo 'Gagal';
        header('location:akun-admin.php');
    }
}

//update info akun admin
if (isset($_POST['update-akun-admin'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $iduser = $_POST['iduser'];

    $update = mysqli_query($conn, "update login set username='$username', email='$email', password='$password' where iduser='$iduser'");
    if ($update) {
        header('location:akun-admin.php');
    } else {
        echo 'Gagal';
        header('location:akun-admin.php');
    }
}

//Menambah akun admin baru
if (isset($_POST['tambah-akun-admin'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $addtotable = mysqli_query($conn, "insert into login (username, email, password, level) values('$username','$email','$password', 'admin')");
    if ($addtotable) {
        echo "sukses";
        header('location:akun-admin.php');
    } else {
        echo 'Gagal';
        header('location:akun-admin.php');
    }
};

//==============================================================================================================//


//menghapus akun customer  
if (isset($_POST['hapus-akun-customer'])) {
    $iduser = $_POST['iduser'];
    $hapus = mysqli_query($conn, "delete from login where iduser='$iduser'");
    if ($hapus) {
        header('location:akun-customer.php');
    } else {
        echo 'Gagal';
        header('location:akun-customer.php');
    }
}

//update info akun customer
if (isset($_POST['update-akun-customer'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $iduser = $_POST['iduser'];

    $update = mysqli_query($conn, "update login set username='$username', email='$email', password='$password' where iduser='$iduser'");
    if ($update) {
        header('location:akun-customer.php');
    } else {
        echo 'Gagal';
        header('location:akun-customer.php');
    }
}

//Menambah akun customer baru
if (isset($_POST['tambah-akun-customer'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $addtotable = mysqli_query($conn, "insert into login (username, email, password, level) values('$username','$email','$password', 'user')");
    if ($addtotable) {
        echo "sukses";
        header('location:akun-customer.php');
    } else {
        echo 'Gagal';
        header('location:akun-customer.php');
    }
};



# =======================================================================================================================


//Menambah barang baru
if (isset($_POST['addnewbarang'])) {
    $idbarang = $_POST['idbarang'];
    $namabarang = $_POST['namabarang'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];

    $addtotable = mysqli_query($conn, "insert into stock (idbarang, namabarang, stock, harga) values('$idbarang','$namabarang','$stock','$harga')");
    if ($addtotable) {
        echo "sukses";
        header('location:produk-admin.php');
    } else {
        echo 'Gagal';
        header('location:produk-admin.php');
    }
};

//update info barang
if (isset($_POST['updatebarang'])) {
    $idbarang = $_POST['idbarang'];
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $stock = $_POST['stock'];

    $update = mysqli_query($conn, "update stock set idbarang='$idbarang', namabarang='$namabarang', stock='$stock' where idbarang='$idb'");
    if ($update) {
        header('location:produk-admin.php');
    } else {
        echo 'Gagal';
        header('location:produk-admin.php');
    }
};


//menghapus barang dari stock
if (isset($_POST['hapusbarang'])) {
    $idb = $_POST['idb'];
    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    if ($hapus) {
        header('location:produk-admin.php');
    } else {
        echo 'Gagal';
        header('location:produk-admin.php');
    }
};


# Tambah bahan masuk
//Menambah barang baru
if (isset($_POST['tambah-bahan-masuk'])) {
    $idbarang = $_POST['idbarang'];
    $namabarang = $_POST['namabarang'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn, "insert into masuk (idbarang, namabarang, qty) values('$idbarang','$namabarang','$stock')");
    if ($addtotable) {
        echo "sukses";
        header('location:barang-masuk.php');
    } else {
        echo 'Gagal';
        header('location:barang-masuk.php');
    }
};


# menambah barang keluar
if (isset($_POST['keluarkan'])) {
    $barangnya = $_POST['barangnya'];
    $qty = $_POST['stock'];

    $cekstocksekarang = mysqli_query($conn, "select * from masuk where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['qty'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang - $qty;

    $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, qty) values ('$barangnya','$qty')");
    $updatestockmasuk = mysqli_query($conn, "update masuk set qty='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if ($addtokeluar && $updatestockmasuk) {
        header('location:barang-keluar.php');
    } else {
        header('location:barang-keluar.php');
    }
}