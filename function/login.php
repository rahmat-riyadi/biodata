<?php


    $db = mysqli_connect('localhost', 'root', '', 'biodata_db');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    if($result){

        session_start();
        $_SESSION['login'] = true; 

        echo "
            <script>
                alert('login berhasil')
                window.location.href = '../dashboard.php'
            </script>
        ";

    } else {

        echo "
            <script>
                alert('login gagal')
                window.location.href = '../index.php'
            </script>
        ";

    }


?>