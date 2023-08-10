<?php
include_once 'set.php';
include_once 'head.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ngọc Rồng BALL</title>
    <link rel="icon" href="/img/nro.png" type="img/png">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

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
    }

    .logo {
        width: 250px;
    }


    h2.fw-light {
        font-weight: bold !important;
        color: #f44336;
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
        /* background: #fff; */
        box-shadow: 0 0 29px 0 rgb(18 66 101 / 8%);
        transition: all 0.3s ease-in-out;
        border-radius: 8px;
        z-index: 1;
        width: 100%;
    }

    .feature-1 {
        background-image: url('./img/feature/1.png');
        background-size: cover;
        background-position: right;
    }

    .feature-2 {
        background-image: url('./img/feature/2.png');
        background-size: cover;
        background-position: right;
    }

    .feature-3 {
        background-image: url('./img/feature/3.png');
        background-size: cover;
        background-position: right;
    }

    .feature-4 {
        background-image: url('./img/feature/4.png');
        background-size: cover;
        background-position: center;
    }

    .feature-box:hover {
        transform: scale(1.1);
    }

    .feature-icon {
        font-size: 1.8em;
        margin-bottom: 1rem;
        color: #fff;
    }

    .feature-box p {
        font-size: 16px;
        color: #fff;
    }

    .feature-title {
        font-size: 20px;
        font-weight: 500;
        padding-bottom: 0.25rem;
        text-decoration: none;
        color: #fff;
        padding: 5px 10px;
        border-radius: 10px;
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

    .download {
        margin-top: 10px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    @media (max-width:768px) {
        html {
            height: 100%;
            overflow: unset;
        }

        body {
            background-image: url('./assets/images/back.jpg');
        }

        .fw-light {
            margin-top: 10px;
        }

        .download {
            margin-top: 10px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            row-gap: 10px;
        }
    }

    /* .feature-5 {
        display: none;
    } */

    .download-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .download-item span {
        font-size: 12px;
        color: #f44336;
        font-weight: 600;
    }

    @-webkit-keyframes my {
        0% {
            color: #f44336;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #f44336;
        }
    }

    @-moz-keyframes my {
        0% {
            color: #f44336;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #f44336;
        }
    }

    @-o-keyframes my {
        0% {
            color: #f44336;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #f44336;
        }
    }

    @keyframes my {
        0% {
            color: #f44336;
        }

        50% {
            color: #fff;
        }

        100% {
            color: #f44336;
        }
    }

    .modal-title {
        font-size: 24px;
        font-weight: bold;
        -webkit-animation: my 700ms infinite;
        -moz-animation: my 700ms infinite;
        -o-animation: my 700ms infinite;
        animation: my 700ms infinite;
    }
</style>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ngọc Rồng BALL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b style="color:red">Thông Báo : Chào Mừng Bạn Đến Với Trang Chủ Ngọc Rồng Đế Vương</b></p>
                <b>
                    <p class="mb-0">Mở khóa thành viên với chỉ 10.000 coin, hỗ trợ nạp MOMO tự động</p>
                </b>
                <b>
                    <p class="mb-0" style="color:red">Nhóm Tin Tức Từ Đội Ngũ Admin Nro Đế Vương</p>
                </b>
                <b>
                    <p class="mb-0" style="color:red">Thân ái, Ngọc Rồng Đế Vương</p>
                </b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            // Hiển thị thông báo ở đây
            $("#exampleModal").modal('show');
        }, 5); // Đợi 5 giây (5000 ms) trước khi hiển thị thông báo

        // Đóng modal popup khi nút 'Đóng' được nhấn
        $("#exampleModal .close, #exampleModal button[data-dismiss='modal']").click(function() {
            $("#exampleModal").modal('hide');
        });
    });
</script> -->
</style>

<div class="container py-3">
    <main>
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
        <section class="text-center container">
            <div class="row py-md-3">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <!-- <h2 class="fw-light">Ngọc Rồng Đế Vương</h2> -->
                    <img src="./img/logo.png" alt="Logo" class="logo">
                    <?php if ($_login == null) { ?>
                        <p class="lead text-muted">
                            Đăng ký tài khoản nhận quà tân thủ và nhiều phần thưởng hấp dẫn.
                        </p>
                        <nav class="my-2 my-md-0 mr-md-3">
                            <a class="btn btn-outline-primary" href="./login.php" style="font-weight: 500">Đăng nhập</a>
                            <a class="btn btn-outline-primary" href="./register.php" style="font-weight: 500">Đăng ký</a>
                        <?php } else { ?>
                            <?php
                            if ($_status == "0") {
                                echo '<div "lead text-muted">Mở thành viên <a href="/active.php">tại đây</a> (Phí: 10,000 Coin = 10,000 VND).</div>';
                            } elseif ($_status == "-1" || $_status_game == '1') {
                                echo '<div "lead text-muted">Tài khoản đang bị khóa, để mở lại bạn cần phải <a href="/active.php">mở khóa tài khoản</a> (Phí: 20,000 Coin = 20,000 VND).</div>';
                            } elseif ($_status == "1") {
                                echo '<div "lead text-muted">Bạn đã mở khóa thành viên</div>';
                            }
                            ?>
                        <?php } ?>
                        <div class="download">
                            <div class="download-item">
                                <a href="./tai-pc.php"><img src="./img/download/pc.png" alt="Tải xuống PC"></a>
                                <!-- <span>Phiên bản 231</span> -->
                            </div>
                            <div class="download-item">
                                <a href="./tai-ios.php"><img src="./img/download/ip.png" alt="Tải xuống IOS"></a>
                                <!-- <span>Phiên bản 231</span> -->
                            </div>
                            <div class="download-item">
                                <a href="./tai-apk.php"><img src="./img/download/android.png" alt="Tải xuống APK"></a>
                                <!-- <span>Phiên bản 231</span> -->
                            </div>
                            <div class="download-item">
                                <a href="./tai-jar.php"><img src="./img/download/jar.png" alt="Tải xuống JAR"></a>
                                <!-- <span>Phiên bản 231</span> -->
                            </div>
                        </div>
                </div>
            </div>
            <div class="center">
                <div class="title-behavior">
                    <marquee behavior="scroll" direction="left">Chào mừng bạn đến với máy chủ Đế Vương, Đội ngũ Admin chúc các bạn có những trải nghiệm tuyệt vời khi tham gia vào máy chủ của Đế Vương</marquee>
                </div>
            </div>
            <style>
                .center {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .title-behavior {
                    width: 50%;
                }
            </style>
            <?php
            // if ($_login != null) {
            //     if ($_vnd_reward != '1') {
            //         echo '<div>Nhận Coin <a href="/add_balance.php">Nhấn Vào Đây</a></div>';
            //     }
            // }
            ?>
        </section>
        <div class="row g-4 py-4 row-cols-1 row-cols-md-4">
            <div class="col d-flex align-items-stretch item">
                <div class="feature-box feature-1">
                    <div class="text-dark">
                        <i class="fas fa-coins feature-icon"></i>
                    </div>
                    <div>
                        <h3 class="feature-title ">Nạp Coin</h3>
                        <p>Thanh toán hoàn toàn tự động, xử lý nhanh sau 1 - 5 phút.</p>
                        <a href="nap-momo.php" class="btn btn-primary">
                            Nạp ngay
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-stretch">
                <div class="feature-box feature-2">
                    <div class="text-dark">
                        <i class="fas fa-exchange-alt feature-icon item"></i>
                    </div>
                    <div>
                        <h3 class="feature-title ">Top Máy Chủ</h3>
                        <p>Xem các mục top trong máy chủ trong server Đế Vương</p>
                        <a href="top-suc-manh.php" class="btn btn-primary">
                            Xem ngay
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-stretch">
                <div class="feature-box feature-3">
                    <div class="text-dark">
                        <i class="fas fa-exchange-alt feature-icon item "></i>
                    </div>
                    <div>
                        <h3 class="feature-title">Nạp vàng</h3>
                        <p>Thanh toán hoàn toàn tự động, xử lý ngay lập tức.</p>
                        <a href="huong-dan.php" class="btn btn-primary">
                            Nạp ngay
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-stretch item">
                <div class="feature-box feature-4">
                    <div class="text-dark">
                        <i class="fa fa-toggle-on feature-icon " aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3 class="feature-title">Mở thành viên</h3>
                        <p>Mở thành viên nhận quà vip ngay nào.</p>
                        <a href="kich-hoat.php" class="btn btn-primary">
                            Mở ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-warning" style="background-color: #fdf8da;">
            <div class="topic_name">
                <div style="width: 55px; float:left; margin-right: 10px;">
                    <b data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="/img/avatar1.png" style="border-color:red; width: 50px; height: 55px;">
                </div>
                <i class="fa fa-check-circle-o" aria-hidden="true" style="color:red"></i> <a id="exampleModal">Nạp Thẻ Tích Lũy
                </a>
                </b>
                <div class="box_name_eman">bởi <b><b>
                            <font style="color:red">ADMIN</font>
                        </b></b> - <span> Xem chi tiết tại đây !!! </span> </div>
            </div>
        </div>

        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nạp Thẻ Tích Lũy</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="#modal-body">
                        <div class="box_ndung_bviet"><b>CHƯA CẬP NHẬT.....</b><br>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    </main>
    <script src="assets/js/jquery.form.min.js"></script>
    <script src="assets/js/clipboard.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/app3007.js?_=1668687090"></script>
    <?php
    include_once 'end.php';
    ?>
</div>