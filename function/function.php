<?php

    $db = mysqli_connect('localhost', 'root', '', 'biodata_db');

    function updateData($data){

        global $db;

        $id = $data['id'];
        $nama = $data['nama'];
        $pekerjaan = $data['pekerjaan'];
        $alamat = $data['alamat'];
        $umur = $data['umur'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $tinggi_badan = $data['tinggi_badan'];
        $nama_ayah = $data['nama_ayah'];
        $nama_ibu = $data['nama_ibu'];
        $hobi = $data['hobi'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $tk = $data['tk'];
        $sd = $data['sd'];
        $smp = $data['smp'];
        $sma = $data['sma'];
        $tentang = $data['tentang'];
        $ig = $data['ig'];
        $wa = $data['wa'];
        $email = $data['email'];
        $tanggal_diubah = date('Y-m-d');

        if($_FILES['gambar']['name'] !== ''){

            $gambar = str_replace(' ', '-', $nama);

            unlink('../img/'. $gambar);

            $format = explode('.', $_FILES['gambar']['name']);
            $format = '.' . end($format);
            $gambar = $gambar . $format;
            $tmp_name = $_FILES['gambar']['tmp_name'];

            move_uploaded_file($tmp_name, '../img/'.$gambar);

            mysqli_query($db, "UPDATE user SET nama = '$nama', pekerjaan = '$pekerjaan', alamat = '$alamat', umur = '$umur', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', tinggi_badan = '$tinggi_badan', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', hobi = '$hobi', sd = '$sd', smp = '$smp', sma = '$sma', tk = '$tk', ig = '$ig', email = '$email', wa = '$wa', tentang = '$tentang', tanggal_diubah = '$tanggal_diubah', gambar = '$gambar', jenis_kelamin = '$jenis_kelamin' WHERE id = '$id'");

        } else {
            mysqli_query($db, "UPDATE user SET nama = '$nama', pekerjaan = '$pekerjaan', alamat = '$alamat', umur = '$umur', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', tinggi_badan = '$tinggi_badan', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', hobi = '$hobi', sd = '$sd', smp = '$smp', sma = '$sma', tk = '$tk', ig = '$ig', email = '$email', wa = '$wa', tentang = '$tentang', tanggal_diubah = '$tanggal_diubah', jenis_kelamin = '$jenis_kelamin' WHERE id = '$id'");
        }
        

        return mysqli_affected_rows($db);

    }

?>