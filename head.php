<?php
ob_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include_once 'cauhinh.php';
include_once 'config.php';
include_once 'set.php';
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <link rel="shortcut icon" type="image/png" href="./img/nro.png" />
   <meta name="author" content="">
   <title>NRO BAll</title>
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/all.min.css" />
   <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
   <!-- <link rel="stylesheet" href="css/main.css"> -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
   <script src="js/swal.js"></script>
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <style>
      html {
         font-size: 14px;
      }

      @media (min-width: 768px) {
         html {
            font-size: 16px;
         }
      }

      .container {
         max-width: 960px;
         background-color: rgba(229, 229, 229, 0.8);
         border-radius: 10px;
      }

      .pricing-header {
         max-width: 700px;
      }

      .card-deck .card {
         min-width: 220px;
      }

      .border-top {
         border-top: 1px solid #e5e5e5;
      }

      .border-bottom {
         border-bottom: 1px solid #e5e5e5;
      }

      .box-shadow {
         box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
      }

      .nav-pills .nav-link.active,
      .nav-pills .show>.nav-link {
         background-color: #f44336;
      }

      .nav-link {
         color: #f44336;
      }

      .nav-link:focus,
      .nav-link:hover {
         color: #cd3a2f;
      }

      .header {
         background-color: #e5e5e5;
         color: #fff;
         display: flex;
         align-items: center;
         padding-top: 20px;
      }

      .logo-text {
         font-weight: 500;
         margin-left: 10px;
      }

      /* Responsive styles */
      @media (max-width: 768px) {
         .header {
            flex-direction: column;
            text-align: center;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
         }

         .header .container {
            padding-left: 0;
            padding-right: 0;
         }

         .header .container a {
            /* margin-bottom: 10px; */
         }

         .header .container nav {
            margin-top: 10px;
         }

         .no-login {
            display: none !important;
         }

      }
   </style>
</head>

<body>
   <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom header">
      <div class="d-flex flex-column flex-md-row align-items-center container">
         <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
            <img class="img-fluid" src="/img/nro.png" alt="" width="36" height="36">
            <span class="fs-5 logo-text"> Ngọc Rông BALL</span>
         </a>

         <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto" style="font-weight: 500">
            <!-- <a class="me-3 py-2 text-dark text-decoration-none" href="tai-ve.php">Tải về</a> -->
            <a class="me-3 py-2 text-dark text-decoration-none" href="/webNRO/nap-tien.php">Nạp Thẻ</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="./nap-momo.php">Nạp MoMo</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="./top-suc-manh.php">Top Máy chủ</a>
            <a class="me-3 py-2 text-dark text-decoration-none" target="_blank" href="https://zalo.me/g/mnjlng562">Cộng đồng</a>
         </nav>

         <?php if ($_login == null) { ?>
            <nav class="my-2 my-md-0 mr-md-3">
               <a class="btn btn-outline-primary no-login" href="/webNRO/login.php" style="font-weight: 500">Đăng nhập</a>
            </nav>
         <?php } else { ?>
            <?php if ($_coin == null) $_coin = 0 ?>
            <a class="btn btn-outline-primary" href="./profile.php">
               <span><?php echo ($_username); ?> - <?php echo number_format($_coin); ?> Coin - tiền affilate: 20.00000000<?php echo number_format($_coin_affilate); ?></span>
            </a>
         <?php } ?>
      </div>
   </div>
</body>

</html>