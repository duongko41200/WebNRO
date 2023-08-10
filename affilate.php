<?php
include_once 'head.php';
include_once 'set.php';
include(__DIR__ . "/api/config.php");
if ($_login == null) {
    header("location:/user");
}
$_active = isset($_active) ? $_active : null;
$_tcoin = isset($_tcoin) ? $_tcoin : 0;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ngọc Rồng Tea</title>

    <link rel="icon" href="/img/nro.png" type="image/png">
    <!-- Bootstrap core CSS -->
    <link href="../../../getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="../../../getbootstrap.com/docs/5.0/dist/js/bootstrap.min.js"></script>


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
        background-position: left top;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    html {
        height: 100%;
        /* overflow: hidden; */
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
        background-color: #007bff;
        border-color: #007bff;
    }

    a {
        text-decoration: none;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #007bff;
    }

    .nav-link {
        color: #007bff;
    }

    .nav-link:focus,
    .nav-link:hover {
        color: #cd3a2f;
    }

    .table {
        border: 2px solid #fff;
        background-color: #d1d0d08f;
    }

    .number-atm {
        padding-right: 5px !important;
    }

    .name-atm {
        padding-left: 0px !important;

    }

    .form-pay,.form-change {
        border: 3px solid #ffffff;
        padding: 10px;

    }

    .form-hidden , .changeCoin-hidden{
        display: none;
    }

    /* .btn-ATM {
        padding-top: 10px !important;
    } */
</style>

<?php
$refer = _fetch("SELECT COUNT(username) FROM account WHERE user_referral='$_referralCode'");

/// XỬ LÝ RÚT TIỀN
if (isset($_POST["nameAtm"]) && isset($_POST["numberAtm"]) && isset_sql($_POST['banks'])) {
    $number_atm = isset_sql($_POST['numberAtm']);
    $name_atm = isset_sql($_POST['nameAtm']);
    $bank = isset_sql($_POST['banks']);
    $datetime = new DateTime();
    $newDate = $datetime->format('d-m-Y');

    try {

        $txt = _insert('payment', "number_atm,name_atm,amount,bank,date", "'$number_atm','$name_atm','$_coin_affilate','$bank','$newDate'");
        $kiemtra = _query($txt);


        if ($kiemtra) {
            echo '
            <script type="text/javascript">
            
            $(document).ready(function(){
            
              swal({
                    title: "Thành công",
                    text: "Tiền sẽ được chuyển trong 1-2 ngày",
                    type: "success",
                    confirmButtonText: "OK",
              })
            });
            
            </script>
            ';
        }



    } catch (Exception $ex) {
        // jump to this part
        // if an exception occurred
        echo $ex;
    }


}



// XỬ LÝ ĐỔI TIỀN THÀNH COIN
if(isset($_POST["username"]) && isset($_POST["changecoin"])){

    $username = isset_sql($_POST['username']);
    $price =  isset_sql($_POST['changecoin']);

    $conn->query("UPDATE account SET vnd = vnd + {$price}, tongnap = tongnap + {$price} WHERE username = '{$row['username']}'");


}








function get_user_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Kiểm tra nếu địa chỉ IP từ proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Kiểm tra nếu địa chỉ IP từ remote address
    else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}
?>

<body>
    <div class="container py-3">
        <main>
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
            <div class="row">
                <div class="col-md-3 pb-3 pt-2">
                    <div class="list-group d-none d-sm-block">
                        <a href="profile.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-user me-2"></i> Thông tin tài khoản
                        </a>
                        <a href="nap-tien.php" class="list-group-item list-group-item-action ">
                            <i class="fas fa-coins me-2"></i> Nạp thẻ cào
                        </a>
                        <a href="nap-momo.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-coins me-2"></i> Nạp MOMO
                        </a>
                        <a href="affilate.php" class="list-group-item list-group-item-action active">
                            <i class="fas fa-coins me-2"></i> Affilate
                        </a>
                        <a href="doi-mat-khau.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-unlock me-2"></i> Đổi mật khẩu
                        </a>
                        <a href="/webNRO/?out" class="list-group-item list-group-item-action ">
                            <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
                        </a>

                    </div>
                </div>
                <div class="col-md-9 pb-3 pt-2">
                    <h5>Thông tin Affilate của bạn</h5>
                    <table class="table">
                        <tbody>

                            <tr>
                                <th scope="row">Tài khoản đăng nhập</th>
                                <th>
                                    <div class="w-50" style='font-size:16px'>
                                        <?php echo $_username; ?>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Trạng Thái Thành Viên</th>
                                <td>
                                    <div class="w-100" style='font-size:16px'>
                                        <?php if ($_status == "0") {
                                            echo 'Chưa kích hoạt';
                                        } else if ($_status == "1") {
                                            echo 'Đang bị khoá';
                                        } else if ($_status == "-1") {
                                            echo 'Đã kích hoạt';
                                        } ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Mã giới thiệu của bạn</th>
                                <td>
                                    <div class="w-50" style='font-size:16px; font-weight:700'>
                                        <?php echo $_referralCode; ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Số User mà bạn đã giới thiệu</th>
                                <td>
                                    <div class="w-50" style='font-size:16px; font-weight:700'>
                                        <?php echo $refer[0]; ?>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">Tiền Affilate</th>
                                <td>
                                    <div class="text-danger"><b>
                                            <?php echo number_format($_coin_affilate); ?> VND
                                        </b>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row"></th>

                                <td>
                                    <button type="button" class="btn btn-outline-danger fw-bold btn-pay">Rút
                                        Tiền</button>

                                    <script type="text/javascript" language="javascript">
                                        $(document).ready(function () {
                                            $(".btn-pay").click(function () {
                                                $('.form-change').addClass('changeCoin-hidden')
                                                $('.form-pay').removeClass('form-hidden')
                                            });
                                        });
                                    </script>

                                    <button type="button" class="btn btn-warning fw-bold btn-change">Đổi coin</button>

                                    <script type="text/javascript" language="javascript">
                                        $(document).ready(function () {
                                            $(".btn-change").click(function () {
                                                $('.form-pay').addClass('form-hidden')
                                                $('.form-change').removeClass('changeCoin-hidden')
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>

                        </tbody>
                    </table>

<!-- form rút tiền -->
                    <form class="form-pay form-hidden" method="POST">
                        <div class="text-center mb-2">
                            <img src="/img/logo.png" alt="" width="200">
                        </div>
                        <h2 class="h3 mb-3 fw-normal text-center">Vui Lòng Nhập Tài Khoản Ngân Hàng</h2>
                        <!-- <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds"> -->
                        <div class="account-ATM row mb-1">
                            <div class="col-6 number-atm" style="padding-right:10px">
                                <label class="">Số tài khoản </label>
                                <input type="number" class="form-control" placeholder="Số tài khoản" required=""
                                    name="numberAtm" value="">
                            </div>
                            <div class="col-3 name-atm" style="padding-left:10px">
                                <label class="">Tên chủ tài khoản</label>
                                <input type="text" class="form-control" placeholder="Tên trên thẻ" required=""
                                    name="nameAtm" value="">
                            </div>



                            <div class="col-3 name-atm" style="padding-left:10px">
                            <label class="">Chọn ngân hàng </label>
                                <select class="form-select" aria-label="Default select example" name="banks" required="">
                                    <option value= "" selected>Chọn ngân hàng nhận</option>
                                    <option value="VietcomBank">VietComBank</option>
                                    <option value="VietTinBank">VietTinBank</option>
                                    <option value="MB Bank">MB Bank</option>
                                </select>
                            </div>






                        </div>

                        <div class="btn-ATM row mb-1 p-2">
                            <div class="col-6 p-1">
                                <button class="btn btn-success w-100 xacnhan" type="submit">Xác Nhận</button>



                            </div>

                            <div class="col-6 p-1">
                                <button class="btn btn-primary w-100 close" type="submit">close</button>
                                <script type="text/javascript" language="javascript">
                                    $(document).ready(function () {
                                        $(".close").click(function () {
                                            $('.form-pay').addClass('form-hidden')
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                    </form>


<!-- //form đổi tiền sang coin trong game -->
                    <form class="form-change changeCoin-hidden" method="POST">
                        <div class="text-center mb-2">
                            <img src="/img/logo.png" alt="" width="200">
                        </div>
                        <h2 class="h3 mb-3 fw-normal text-center">Chuyển Đổi Tiền Thành Coin</h2>
                        <!-- <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds"> -->
                        <div class="account-ATM row mb-1">
                            <div class="col-7 number-atm" style="padding-right:10px">
                                <label class="">Tên đăng nhập </label>
                                <input type="text" class="form-control" placeholder="Tên đăng nhập" required=""
                                    name="username" value="">
                            </div>


                            <div class="col-5 name-atm" style="padding-left:10px">
                            <label class="">Chọn thành tiền </label>
                                <select class="form-select" aria-label="Default select example" name="chagnecoin" required="">
                                    <option value= "" selected>Chọn mệnh giá</option>
                                    <option value="10000">10.000</option>
                                    <option value="20000">20.000</option>
                                    <option value="30000">30.000</option>
                                    <option value="50000">50.000</option>
                                    <option value="100000">100.000</option>
                                    <option value="200000">200.000</option>
                                    <option value="300000">300.000</option>
                                    <option value="500000">500.000</option>
                                    <option value="1000000">1.000.000</option>
                                </select>
                            </div>






                        </div>

                        <div class="btn-ATM row mb-1 p-2">
                            <div class="col-6 p-1">
                                <button class="btn btn-success w-100 xacnhan" type="submit">Xác Nhận</button>



                            </div>

                            <div class="col-6 p-1">
                                <button class="btn btn-primary w-100 close" type="submit">close</button>
                                <script type="text/javascript" language="javascript">
                                    $(document).ready(function () {
                                        $(".close").click(function () {
                                            $('.form-change').addClass('changeCoin-hidden')
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </main>


        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="text-center">
                Trò chơi không có bản quyền chính thức, hãy cân nhắc kỹ trước khi tham gia.<br>
                Chơi quá 180 phút một ngày sẽ ảnh hưởng đến sức khỏe.
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.form.min.js"></script>
    <script src="assets/js/clipboard.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/appa368.js?_=1668687096"></script>

</body>