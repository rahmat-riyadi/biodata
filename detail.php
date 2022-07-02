<?php

    $id = $_GET['id'];
    $db = mysqli_connect('localhost', 'root', '', 'biodata_db');

    $member = mysqli_query($db, "SELECT * FROM user WHERE id = $id");

    $member = mysqli_fetch_assoc($member);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>

    <nav>
        <h1>Team Five</h1>
    </nav>

    <div class="wrapper">

        <a class="back" href="./index.php"><i class="bi bi-chevron-left"></i>Kembali ke beranda </a>
    
        <section class="top-section">
            <img src="./img/<?= $member['gambar'] ?>" alt="" class="image">
            <div class="group-1">
                <p class="name"><?= $member['nama'] ?></p>
                <p class="job"><?= $member['pekerjaan'] ?></p>

                <div class="btn-group">
                    <div class="icon">
                        <input type="hidden" id="wa" value="<?= $member['wa'] ?>">
                        <i class="wa bi bi-whatsapp"></i>
                    </div>
                    <div class="icon">
                        <a href="https://www.instagram.com/<?= $member['ig'] ?>" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                    <div class="icon">
                        <a href="mailto: <?= $member['email'] ?>">
                            <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="group-2">
                <table>
                    <tr>
                        <td>Umur :</td>
                        <td><?= $member['umur'] ?> tahun</td>
                    </tr>
                    <tr>
                        <td>Alamat :</td>
                        <td><?= $member['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin :</td>
                        <td><?= $member['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan :</td>
                        <td><?= $member['tinggi_badan'] ?> cm</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="bottom-section">
            <div class="left-side">
                <p class="sosmed">Sosial Media</p>

                <p class="sosmed-list ig"><i class="bi bi-instagram"></i><?= $member['ig'] ?></p>
                <p class="sosmed-list wa"><i class="bi bi-whatsapp"></i><?= $member['wa'] ?></p>
                <p class="sosmed-list email"><i class="bi bi-envelope"></i><?= $member['email'] ?></p>
            </div>


            <div class="right-side">
                <h4>Tentang</h4>

                <p class="desc">
                <?= $member['tentang'] ?>
                </p>

                <hr>

                <h4>Biodata</h4>

                <table class="biodata" >
                    <tr>
                        <td>Tempat Lahir :</td>
                        <td><?= $member['tempat_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir :</td>
                        <td><?= $member['tanggal_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Ayah :</td>
                        <td><?= $member['nama_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Ibu :</td>
                        <td><?= $member['nama_ibu'] ?></td>
                    </tr>
                    <tr>
                        <td>Hobi :</td>
                        <td><?= $member['hobi'] ?></td>
                    </tr>
                </table>

                <h4>pendidikan</h4>

                <table class="pendidikan" >
                    <tr>
                        <td>TK :</td>
                        <td><?= $member['tk'] ?></td>
                    </tr>
                    <tr>
                        <td>Sekolah Dasar :</td>
                        <td><?= $member['sd'] ?></td>
                    </tr>
                    <tr>
                        <td>SMP :</td>
                        <td><?= $member['smp'] ?></td>
                    </tr>
                    <tr>
                        <td>SMA :</td>
                        <td><?= $member['sma'] ?></td>
                    </tr>
                </table>

            </div>
        </section>
    
    </div>


    <script>
        
        const wa = document.getElementById('wa')
        
        document.querySelector('i.wa').addEventListener('click', () => {
            navigator.clipboard.writeText(wa.value).then(() => alert('nomor whatsapp : ' + wa.value + ' telah dicopy'))
        })
        
    </script>
</body>
</html>