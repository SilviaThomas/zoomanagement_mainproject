<?php
    if (isset($_SESSION)) { session_start(); }
    $_SESSION = array(); 
    session_destroy(); 
   // header("admin/Login.php");
   echo "<script>window.location.href=http://localhost/zoofari-1.0.0/Login.php''</script> ";
    exit();
?>