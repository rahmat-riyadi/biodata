<?php

    require './function.php';

    $id = $_POST['id'];

    if(updateData($_POST) > 0){

        echo "
            <script>
                alert('data berhasil di update')
                window.location.href = '../edit.php?id=$id'
            </script>
        ";
        
        
    } else {

        echo "
            <script>
                alert('data gagal di update')
                window.location.href = '../edit.php?id=$id'
            </script>
        ";

    }


?>