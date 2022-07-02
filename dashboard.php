<?php

    $db = mysqli_connect('localhost', 'root', '', 'biodata_db');

    session_start();

    if(!isset($_SESSION['login'])){
        header('location: index.php');
    }

    $result = mysqli_query($db, "SELECT * FROM user");

    $data = [];

    while( $member = mysqli_fetch_assoc($result) ){
        $data[] = $member;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>

    <nav>
        <h1>Team Five <span> | Dashboard</span></h1>
        <a href="./function/logout.php">logout</a>
    </nav>

    <div class="container">

        <table cellspacing="0" >
            <thead>
                <!-- <th class="select-all" >
                    <input type="checkbox">
                </th> -->
                <th class="name">
                    <p><i class="bi bi-person-fill"></i>nama</p>
                </th>
                <th class="id" >
                    <p>id</p>
                </th>
                <th>
                    <p>dibuat</p>
                </th>
                <th class="last">
                    <p>diubah</p>
                </th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach( $data as $user ) : ?>
                    <tr>
                        <!-- <td class="select">
                            <input type="checkbox">
                        </td> -->
                        <td>
                            <img src="./img/<?= $user['gambar'] ?>" alt="" srcset="">
                            <div class="group">
                                <p class="name"><?= $user['nama'] ?></p>
                                <p class="ig"><?= $user['ig'] ?></p>
                            </div>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['tanggal_dibuat'] ?></td>
                        <td><?= $user['tanggal_diubah'] ?? 'belum pernah diubah' ?></td>
                        <td>
                            <div class="dropdown">
                                <button><i class="bi bi-three-dots"></i></button>
                                <div class="dropcontent">
                                    <a href="./edit.php?id=<?= $user['id'] ?>" class="edit">
                                        <i class="bi bi-pencil"></i>
                                        edit
                                    </a>
                                    <a href="" class="delete">
                                        <i class="bi bi-trash3"></i>
                                        delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <script src="./js/dashboard.js"></script>
</body>
</html>