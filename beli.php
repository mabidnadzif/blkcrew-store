<?php  
session_start();

$id_produk = $_GET['id'];

//jika ada di keranjang, di tambah 1
if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//halaman keranjang
echo "<script>alert('Produk Sudah Masuk Ke Keranjang Belanja');</script>";
echo "<script>location ='keranjang.php';</script>";
?>


