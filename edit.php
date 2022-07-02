<?php

  session_start();

  if(!isset($_SESSION['login'])){
      header('location: index.php');
  }

  $db = mysqli_connect('localhost', 'root',  '', 'biodata_db');

  $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM user WHERE id = $_GET[id]"));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="./css/edit.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <h3>Edit Profil</h3>
      <small>Edit profile dari kelompok 5</small>

      <a href="dashboard.php" class="back">
        <i class="bi bi-chevron-left"></i>
        kembali
      </a>

      <form action="./function/edit.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $result['id'] ?>">

        <div class="img-group">
          <img src="./img/<?= $result['gambar'] ?>" alt="" class="img" />
          <input type="file" name="gambar" class="input-img" />
        </div>

        <div class="input-group">
          <label for="nama" class="label"> Nama </label>
          <input type="text" name="nama" class="text" id="nama" value="<?= $result['nama'] ?>" />
        </div>

        <div class="input-group">
          <label for="pekerjaan" class="label"> pekerjaan </label>
          <input type="text" name="pekerjaan" class="text" id="pekerjaan" value="<?= $result['pekerjaan'] ?>" />
        </div>

        <div class="input-group">
          <label for="alamat" class="label"> alamat </label>
          <input type="text" name="alamat" class="text" id="alamat" value="<?= $result['alamat'] ?>" />
        </div>

        <div class="input-group">
          <label for="umur" class="label"> umur </label>
          <input type="text" name="umur" class="text" id="umur" value="<?= $result['umur'] ?> tahun" />
        </div>

        <div class="input-column">
          <div class="input-group">
            <label for="jenis-kelamin" class="label"> jenis kelamin </label>
            <details class="custom-select">
              <summary class="radios">
                <input type="radio" class="radio" name="jenis_kelamin" value="laki laki" id="laki-laki" title="laki-laki" <?= ($result['jenis_kelamin'] == 'laki laki' ? 'checked' : '') ?> />
                <input type="radio" class="radio" name="jenis_kelamin" value="perempuan" id="perempuan" title="perempuan" <?= ($result['jenis_kelamin'] == 'perempuan' ? 'checked' : '') ?> />
              </summary>
              <ul class="list">
                <li>
                  <label for="laki-laki"> laki laki </label>
                </li>
                <li>
                  <label for="perempuan">perempuan</label>
                </li>
              </ul>
            </details>
          </div>

          <div class="input-group">
            <label for="tinggi-badan" class="label"> tinggi badan (cm) </label>
            <input type="number" class="text" name="tinggi_badan" id="tinggi-badan" value="<?= $result['tinggi_badan'] ?>" />
          </div>
        </div>

        <div class="input-group">
            <label for="tempat-lahir" class="label">tempat Lahir</label>
            <input type="text" class="text" name="tempat_lahir" id="tempat-lahir" value="<?= $result['tempat_lahir'] ?>" />
        </div>
        <div class="input-group">
            <label for="tanggal-lahir" class="label">tanggal Lahir</label>
            <input type="date" class="text" id="tanggal-lahir" name="tanggal_lahir" value="<?= $result['tanggal_lahir'] ?>" />
        </div>
        <div class="input-group">
            <label for="ayah" class="label">nama ayah</label>
            <input type="text" class="text" id="ayah" name="nama_ayah" value="<?= $result['nama_ayah'] ?>" />
        </div>
        <div class="input-group">
            <label for="ibu" class="label">nama ibu</label>
            <input type="text" class="text" id="ibu" name="nama_ibu" value="<?= $result['nama_ibu'] ?>" />
        </div>
        <div class="input-group">
            <label for="hobi" class="label">hobi</label>
            <input type="text" class="text" name="hobi" id="hobi" value="<?= $result['hobi'] ?>" />
        </div>
        <div class="input-group">
            <label for="tk" class="label">TK</label>
            <input type="text" class="text" name="tk" id="tk" value="<?= $result['tk'] ?>" />
        </div>
        <div class="input-group">
            <label for="sd" class="label">SD</label>
            <input type="text" class="text" name="sd" id="sd" value="<?= $result['sd'] ?>" />
        </div>
        <div class="input-group">
            <label for="smp" class="label">smp</label>
            <input type="text" class="text" id="smp" name="smp" value="<?= $result['smp'] ?>" />
        </div>
        <div class="input-group">
            <label for="sma" class="label">sma</label>
            <input type="text" class="text" id="sma" name="sma" value="<?= $result['sma'] ?>" />
        </div>
        <div class="input-group">
            <label for="ig" class="label">instagram</label>
            <input type="text" name="ig" class="text" name="ig" id="ig" value="<?= $result['ig'] ?>" />
        </div>
        <div class="input-group">
            <label for="wa" class="label">whatsapp</label>
            <input type="text" class="text" id="wa" name="wa" value="<?= $result['wa'] ?>" />
        </div>
        <div class="input-group">
            <label for="email" class="label">email</label>
            <input type="text" class="text" id="email" name="email" value="<?= $result['email'] ?>" />
        </div>
        <div class="input-group">
            <label for="tentang" class="label">tentang</label>
            <textarea name="tentang" id="tentang" cols="0" rows="10" >
              <?= $result['tentang'] ?>
            </textarea> 
        </div>
        <button type="submit">terapkan perubahan</button>
      </form>
    </div>


  </body>
</html>
