<?php
   $conn = mysqli_connect('localhost', 'root', '', 'webdemo');
   mysqli_query($conn,"SET NAMES 'UTF8'");
   return $conn;
