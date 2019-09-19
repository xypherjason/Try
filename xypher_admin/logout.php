<?php
session_start();
session_destroy();
echo "<script>alert('Successfuly Logout!');
    window.location = '../index.php';
    </script>";
?>