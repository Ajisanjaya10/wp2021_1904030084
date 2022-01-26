<?php
$conn = mysqli_connect('localhost','root','','wprog5');

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

  $nama = ($data['Nama']);
  $alamat = ($data['Alamat']);
  $jenis_kelamin = ($data['Jenis_Kelamin']);
  $agama = ($data['Agama']);
  $sekolah_asal = ($data['Sekolah_Asal']);
  $foto_maba = ($data['foto_maba']);

  $query = "INSERT INTO calon_mahasiswa
  VALUES
  ('','$nama','$alamat','$jenis_kelamin',''$agama','$sekolah_asal','$foto_maba');";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM calon_mahasiswa WHERE id=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}