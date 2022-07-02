<?php

    $db = mysqli_connect('localhost', 'root', '', 'biodata_db');

    $data = mysqli_query($db, "SELECT * FROM user");

    $members = [];

    while($item = mysqli_fetch_assoc($data)){
        $members[] = $item;
    }

    

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Team Five</title>
</head>
<body>

    <nav>
        <h1>Team Five</h1>
        <a class="login" href="">admin</a>
    </nav>
    

    <div class="container">
        <div class="right-side">
            <div class="content">
                <h3>Hello.</h3>
                <p>website ini berisi info tentang biodata dari <br> anggota kelompok 5</p>

                <div class="image">
                    <?php foreach($members as $member): ?>
                        <img src="./img/<?= $member['gambar'] ?>" alt="" class="img">
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="left-side">

            
            <p class="heading" ><i class="bi bi-people"></i>Daftar Anggota Kelompok</p>

            <div class="member-list">
                <?php foreach($members as $i => $member): ?>
                    <a href="./detail.php?id=<?= $member['id'] ?>" class="member">
                        <span><?= $i+1 ?></span>
                        <?= $member['nama'] ?>
                    </a>
                <?php endforeach ?>
            </div>  

        </div>
    </div>

    <div class="backdrop">
        <div class="login-form">

            <i class="exit bi bi-x-circle-fill"></i>

            <form action="./function/login.php" method="post">
    
                <h3>Login</h3>
    
                <input type="text" name="username"  placeholder="username">

                <input type="password" name="password"  placeholder="password">

                <button type="submit">
                    masuk
                </button>

            </form>
        </div>
    </div>


    <script src="./js/login-popup.js"></script>

</body>
</html>