<?php
$conn = mysqli_connect('localhost','root','','uas_1904030084');

//pemanggilan tabel
function query($query)
{
  global $conn;

  //mengambil seluruh data pada tabel

  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) ==1){
    return mysqli_fetch_assoc($result);
  }
  //pemanggilan element data
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;

                
}

function tambah($data)
{
  global $conn;

  $nama = htmlspecialchars($data['nama_anggota']);
  $alamat = htmlspecialchars($data['alamat']);
  $no_telp = htmlspecialchars($data['no_telp']);
  $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
  $foto = htmlspecialchars($data['foto']);

  $query = "INSERT INTO anggota 
  VALUES
  (null,'$nama','$alamat','$no_telp','$tgl_lahir','$foto');";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id_anggota)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota=$id_anggota") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapusdosen($id_buku)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM buku WHERE id_buku=$id_buku") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function edit($data)
{
  global $conn;

  $id = $data['id_anggota'];
  $nama = htmlspecialchars($data['nama_anggota']);
  $alamat = htmlspecialchars($data['alamat']);
  $no_telp = htmlspecialchars($data['no_telp']);
  $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
  $foto = htmlspecialchars($data['foto']);

  $query = "UPDATE anggota SET
  nama ='$nama',
  alamat ='$alamat',
  no_telp ='$no_telp',
  tgl_lahir ='$tgl_lahir',
  foto ='$foto'
  WHERE id_anggota = $id_anggota;";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  global $conn;

  $query = "SELECT * FROM anggota WHERE nama_anggota LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function caridosen($keyword)
{
  global $conn;

  $query = "SELECT * FROM buku WHERE namaa_buku LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}