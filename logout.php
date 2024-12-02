<?php
session_start();
session_destroy();

echo "<script>alert('anda telah keluar sistem'); window.location ='index.php'</script>";