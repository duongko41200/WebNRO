<?php
$apikey = 'BD317046D29ADC76A7F6A77C2B58F0C5'; //API key, lấy từ website thesieutoc.net thay vào trong cặp dấu // database Mysql config
$local_db = "localhost";
$user_db = "root";
$pass_db = "";
$name_db = "nroballss";

# đừng đụng vào 
$conn = new mysqli($local_db, $user_db, $pass_db, $name_db);
$conn->set_charset("utf8");
