<?php
include_once 'set.php';
$_title = "NRO TEA - Đăng Ký";
include_once 'head.php';
$_alert = null;
if ($_login == null) {
    if (isset($_POST['username'])) {


        $username = isset_sql($_POST['username']);
        $password = isset_sql($_POST['password']);
        $repassword = isset_sql($_POST['repassword']);
        $userReferral = isset_sql($_POST['referral']);

        $length = 10; // Độ dài chuỗi ngẫu nhiên
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomChar = $characters[mt_rand(0, strlen($characters) - 1)];
            $randomString .= $randomChar;
        }
        // echo $userReferral;
        if ($password == $repassword) {
            $txt = _insert('account', "username,password,referral_code,user_referral", "'$username','$password','$randomString','$userReferral'");
            $read = _select("*", 'account', "username='$username'");
            $refer = _select("*", 'account', "referral_code='$userReferral'");

            if (!is_array(_fetch($refer)) && $userReferral ) {

                echo '
                        <script type="text/javascript">
                        
                        $(document).ready(function(){
                        
                          swal({
                                title: "Thất bại",
                                text: "Mã giới thiệu không tồn tại",
                                type: "error",
                                confirmButtonText: "OK",
                          })
                          
                        });
      
                        
                        </script>
                        ';
            } else if (is_array(_fetch($read))) {
                echo '
					<script type="text/javascript">
					
					$(document).ready(function(){
					
					  swal({
							title: "Thất bại",
							text: "Tài khoản này đã tồn tại, vui lòng chọn tài khoản khác!",
							type: "error",
							confirmButtonText: "OK",
					  })
					});
					
					</script>
					';
            } else {
                $kiemtra = _query($txt);
                if ($kiemtra) {
                    echo '
						<script type="text/javascript">
						
						$(document).ready(function(){
						
						  swal({
								title: "Thành công",
								text: "Đăng kí thành công!! Mã giới thiệu của bạn là: ' . $randomString . '",
								type: "success",
								confirmButtonText: "OK",
						  })
						});
						
						</script>
						';
                }
            }
        } else {
            echo '
				<script type="text/javascript">
				
				$(document).ready(function(){
				
				  swal({
						title: "Thất bại",
						text: "Hai mật khẩu không khớp nhau, vui lòng kiểm tra lại!",
						type: "error",
						confirmButtonText: "OK",
				  })
				});
				
				</script>
				';
        }
    }
} else {
    header('location:/user.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ngọc Rồng Tea</title>
    <link rel="icon" href="assets/images/nro.png" type="image/png">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../www.google.com/recaptcha/api.js" async defer></script>
</head>
<style>
    @import url(./css/main.css);

    body {
        background-image: url('./assets/images/back.jpg');
    }

    html {
        height: 100%;
        overflow: hidden;
    }

    @media (max-width:768px) {
        html {
            height: 100%;
            overflow: unset;
        }

        body {
            background-image: url('./assets/images/back.jpg');
            background-size: auto;
        }
    }

    .btn-primary {
        border-color: #f44336 !important;
        color: #fff !important;
    }

    .border-primary {
        border-color: #f44336 !important;
    }

    .bg-primary,
    .btn-primary {
        background-color: #f44336 !important;
    }

    .btn-outline-primary:hover {
        background-color: #f44336;
        border-color: #f44336;
    }

    .btn-outline-primary {
        color: #f44336;
        border-color: #f44336;
    }

    .feature-box {
        padding: 38px 30px;
        position: relative;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 0 29px 0 rgb(18 66 101 / 8%);
        transition: all 0.3s ease-in-out;
        border-radius: 8px;
        z-index: 1;
        width: 100%;
    }

    .feature-icon {
        font-size: 1.8em;
        margin-bottom: 1rem;
    }

    .feature-title {
        font-size: 1.2em;
        font-weight: 500;
        padding-bottom: 0.25rem;
        text-decoration: none;
        color: #212529;
    }

    .list-group-item.active {
        background-color: #f44336;
        border-color: #f44336;
    }

    a {
        text-decoration: none;
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

    .copy-text {
        cursor: pointer;
    }
</style>

<body>
    <div class="container py-3">
        <header>
        </header>
        <main>
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
            <form class="form-signin" method="POST">
                <h1 class="h3 mb-3 font-weight-normal text-center">Nhập thông tin đăng ký</h1>
                <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds">
                <?php echo $_alert; ?>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username"
                        value="">
                </div>

                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="repassword">
                </div><br>
                <div class="form-group">
                    <label>Nhập mã giới thiệu</label>
                    <input type="text" class="form-control" placeholder="Nhập mã giới thiệu..." name="referral"
                        value="">
                </div><br>
                <button class="btn btn-primary w-100" type="submit">Đăng ký</button>
                <div class="text-center pt-2">
                    Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>
                </div>
                <div class="text-center pt-2">
                    <a href="#">Quên mật khẩu</a>
                </div>
            </form>
            <style>
                .form-signin {
                    width: 100%;
                    max-width: 400px;
                    padding: 15px;
                    margin: 0 auto;
                }

                .form-signin .checkbox {
                    font-weight: 400;
                }
            </style>
        </main>
        <script src="assets/js/jquery.form.min.js"></script>
        <script src="assets/js/clipboard.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/js/appa368.js?_=1668687096"></script>
        <?php
        include_once 'end.php';
        ?>
    </div>