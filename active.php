<?php
include_once 'set.php';
$_title = "Đế Vương - Thanh toán";
include_once 'head.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $_title; ?></title>
    <style>
        svg {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -250px;
            margin-left: -400px;
        }

        .message-box {
            height: 200px;
            width: 380px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: 50px;
            color: #FFF;
            font-family: Roboto;
            font-weight: 300;
        }

        .message-box h1 {
            font-size: 40px;
            line-height: 46px;
            margin-bottom: 40px;
            font-weight: 600;
        }

        .message-box p {
            color: #5A5C6C;
        }

        .message-box h1.error {
            color: #ff0000;

        }

        .message-box h1.success {
            color: #68c950;
        }

        .buttons-con .action-link-wrap {
            margin-top: 40px;
        }

        .buttons-con .action-link-wrap a {
            background: #ff0000;
            padding: 8px 25px;
            border-radius: 4px;
            color: #FFF;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s linear;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px
        }

        .buttons-con .action-link-wrap a:hover {
            background: #5A5C6C;
            color: #fff;
        }



        #Polygon-1,
        #Polygon-2,
        #Polygon-3,
        #Polygon-4,
        #Polygon-4,
        #Polygon-5 {
            animation: float 1s infinite ease-in-out alternate;
        }

        #Polygon-2 {
            animation-delay: .2s;
        }

        #Polygon-3 {
            animation-delay: .4s;
        }

        #Polygon-4 {
            animation-delay: .6s;
        }

        #Polygon-5 {
            animation-delay: .8s;
        }

        .heading {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }

        @keyframes float {
            100% {
                transform: translateY(20px);
            }
        }

        @media (max-width: 450px) {
            svg {
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -250px;
                margin-left: -190px;
            }

            .message-box {
                top: 50%;
                left: 50%;
                margin-top: -100px;
                margin-left: -190px;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <?php
    if ($_login == null) {
        header("location:/");
    }

    // Check user status and coin balance
    if ($_status_game != '0' && $_coin >= 100000) {
        $coin = $_coin - 100000;
        $query = _query(_update('account', "ban='0',vnd='$coin'", "username='$_username'"));

        if ($query) {
            $_alert = array(
                'type' => 'success',
                'title' => 'Thành công',
                'text' => 'Mở khóa tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game!'
            );
        } else {
            $_alert = array(
                'type' => 'error',
                'title' => 'Thất bại',
                'text' => 'Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!'
            );
        }
    }
    if ($_status == '1' && $_status_game != '1') {
        $_alert = array(
            'type' => 'error',
            'title' => 'Thất bại',
            'text' => 'Tài khoản của bạn đã được kích hoạt!'
        );
    } elseif ($_status == '0' && $_coin < 10000) {
        $_alert = array(
            'type' => 'error',
            'title' => 'Số dư không đủ',
            'text' => 'Bạn không đủ 10.000 Coin. Vui lòng nạp thêm tiền vào tài khoản để kích hoạt nhé!'
        );
    } elseif ($_status == '-1' && $_coin < 20000) {
        $_alert = array(
            'type' => 'error',
            'title' => 'Số dư không đủ',
            'text' => 'Bạn không đủ 20.000 Coin. Vui lòng nạp thêm tiền vào tài khoản để mở lại tài khoản!'
        );
    } elseif ($_status_game == '-1' && $_coin < 100000) {
        $_alert = array(
            'type' => 'error',
            'title' => 'Số dư không đủ',
            'text' => 'Bạn không đủ 100.000 Coin. Vui lòng nạp thêm tiền vào tài khoản để mở lại tài khoản!'
        );
    } elseif ($_status == '0' && $_coin >= 10000) {
        $coin = $_coin - 10000;
        $query = _query(_update('account', "active='1',vnd='$coin'", "username='$_username'"));

        if ($query) {
            $_alert = array(
                'type' => 'success',
                'title' => 'Thành công',
                'text' => 'Kích hoạt tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game!'
            );
        } else {
            $_alert = array(
                'type' => 'error',
                'title' => 'Thất bại',
                'text' => 'Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!'
            );
        }
    } elseif ($_status == '-1' && $_coin >= 20000) {
        $coin = $_coin - 20000;
        $query = _query(_update('account', "active='1',vnd='$coin'", "username='$_username'"));

        if ($query) {
            $_alert = array(
                'type' => 'success',
                'title' => 'Thành công',
                'text' => 'Mở khóa tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game!'
            );
        } else {
            $_alert = array(
                'type' => 'error',
                'title' => 'Thất bại',
                'text' => 'Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!'
            );
        }
    }
    ?>

    <div class="">
        <h1 class="heading">Kích hoạt tài khoản</h1>

        <?php
        // Show alert message
        if ($_alert != null && $_alert['type'] == 'success') {
            echo ('
            <div class = "container-1">
                <svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>
                <div class="message-box">
                    <h1 class = "success">' . $_alert['title'] . '</h1>
                    <p>' . $_alert['text'] . '</p>
                    <div class="buttons-con">
                        <div class="action-link-wrap">
                        <a href="./index.php" class="link-button">Trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
            ');
        } else {
            echo ('
            <div class = "container-1">
                <svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
                        <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>
                <div class="message-box">
                    <div class = "box">
                        <h1 class = "error">' . $_alert['title'] . '</h1>
                        <p>' . $_alert['text'] . '</p>
                        <div class="buttons-con">
                            <div class="action-link-wrap">
                            <a href="./index.php" class="link-button">Trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ');
        }

        // Redirect or display other content based on your requirements
        // echo '123';
        // header('location:/');
        ?>
    </div>

</body>

</html>