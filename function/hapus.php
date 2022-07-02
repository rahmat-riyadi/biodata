<?php

    $db = mysqli_connect('localhost', 'root', '', 'biodata_db');

    $id = $_GET['id'];

    mysqli_query($db, "DELETE FROM user WHERE id = $id");

    if(mysqli_affected_rows($db) > 0){

        echo "
            <script>
                alert('data berhasil di hapus')
                window.location.href = '../edit.php?id=$id'
            </script>
        ";
        
        
    } else {

        echo "
            <script>
                alert('data gagal di hapus')
                window.location.href = '../dashboard.php'
            </script>
        ";

    }

?>