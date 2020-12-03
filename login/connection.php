<?php
$conn = mysqli_connect('db4free.net', 'admincc', 'admin123', 'webdemo') or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
return $conn;
