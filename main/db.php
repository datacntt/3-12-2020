<?php
   $conn = mysqli_connect('sql9.freemysqlhosting.net', 'sql9379286', 'admin123', 'sql9379286');
   mysqli_query($conn,"SET NAMES 'UTF8'");
   return $conn;
