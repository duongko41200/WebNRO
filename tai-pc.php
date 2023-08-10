<?php
include_once 'set.php';
include_once 'head.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Đế Vương</title>
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
    background-position: left top;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

  html {
    height: 100%;
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
    <main>
      <div id='stars'></div>
      <div id='stars2'></div>
      <div id='stars3'></div>
      <div class="row">
        <div class="col-2 pl-0 pr-0">
          <div class="text-center">
            <img src="assets/images/avatar/avatar1.png" style="border-color:red; width: 50px; height: 50px;"><br>
            <div class="mt-2"></div>
            <b class="text text-danger mt-5">ADMIN</b><br> <b style="color:#ff0000"><small>[Admin]</small></b>
          </div>
        </div>
        <div class="col-10 pl-0">
          <div class="alert alert-success">
            <div class="row pl-2">
              <span style="font-size: 10px">Đăng ngày 17-11-2022</span>
            </div>
            <div class="row pl-2">
              <b class="text text-danger" style="font-size: 18px;"> Hướng dẫn tải PC</b>
            </div>
            <p>Thân chào các <span style="color:#3498db"><strong>Chiến binh,</strong></span></p>
            <p>Dưới đây là tổng hợp mod bản PC của <span style="color:#e83e8c"><strong>Đế Vương</strong></span> </p>
            <div>
              <!-- <a href="./taive/MOD 225 - PC.rar" class="btn btn-primary text-white my-2" download>
                <i class="fa fa-download"></i> Mod PC 225 - Vũ Đăng
              </a> -->
              <a href="./taive/PC.rar" class="btn btn-primary text-white my-2" download>
                <i class="fa fa-download"></i> Mod PC 231
              </a>
            </div>

            <div>
              <p>Lệnh chat:

                +> k_X: đổi sang khu X <br>

                +> cheat_X: chỉnh cheat X <br>

                +> cheatf_X: chỉnh cheat X/10 (ví dụ cheatf_17 = cheat 1.7)<br>

                +> s_X: tốc độ di chuyển X<br>

                +> nrd_X_Y: auto vào ngọc rồng đen map X khu Y<br>



                Phím tắt:<br>

                +> A: tự đánh<br>

                +> B: mở danh sách bạn bè<br>

                +> C: sử dụng capsule<br>

                +> D: đóng băng skill hiện tại<br>

                +> E: auto hồi sinh<br>

                +> F: sử dụng bông tai(tách hợp thể = đệ về nhà)<br>

                +> G: giao dịch<br>

                +> I: khóa mục tiêu khi có trong map<br>

                +> J: load map trái (trong nrd load đến đầu map)<br>

                +> K: load map giữa (trong nrd load đến giữa map - npc)<br>

                +> L: load map phải (trong nrd load đến cuối map)<br>

                +> M: mở bảng đổi khu<br>

                +> N: show Menu nhặt, trong ngọc rồng đen tự động bật/tắt nhanh<br>

                +> O: bật auto vào nrd nhanh theo map X và khu Y đã cài ở lệnh chat nrd_X_Y<br>

                +> P: kết nối đến auto manager<br>

                +> Q: nhặt item<br>

                +> T: dùng tdlt<br>

                +> X: Mở menu tiện ích (toàn bộ tính năng của tool ở đây)<br>

                +> S: chuyển mục tiêu giữa các boss<br>

                +> F1: mở hành trang<br>

                +> F2, Tab: đổi mục tiêu<br>

                +> 9: Mặc set đồ 1<br>

                +> 0: mặc set đồ 2<br>



                Lưu ý:<br>

                - Đối với người sử dụng QLTK thì nên giải nén và sau khi điền nik vào QLTK thì muốn đăng nhập nik nào thì click đúp chuột vào nik cần onl bên danh sách là được<br>

                - Mọi tính năng của tool đều tập trung trong phím tắt X, ae bấm X để khám phá tính năng và sử dụng, phiên bản rất nhiều tính năng hay nhưng vận dụng sao là cách dùng của ae<br>

                - Thích background của game là ảnh gì thì ném ảnh vào đó vào file background_image là được (định dạng .png), sẽ tự đổi ảnh mỗi 60 giây (size khuyến cáo 1024x600)<br>

                -> yêu cầu phải giải nén file, không biết giải nén thì google search, còn không giải nén được thì bỏ qua tính năng này<br>

                - Phải kết nối đến auto manager thì mới điều khiển được tab (nút P)<br>

                - chỉnh text auto chat, auto ctg lần lượt trong file Data\\textchatpublic và Data\\textchatglobal<br>

                - Sửa size trong file size.ini(X|Y|Z: X chiều ngang, Y chiều học, Z = 0 thì ko auto size, Z = 1 chỉnh size theo X Y)<br>

                - Đã loại bỏ tính năng TDLT của game, ae muốn TDLT train quái thì dùng TDLT, sau đó bấm X -> vào auto train -> chọn quái để TDLT<br>

                - Auto captcha (mua captcha tại captcha.com.vn) làm theo hướng dẫn trong video Link: https://www.youtube.com/watch?v=__782Y6jTiU&t=9s<br>

                => làm theo video mà còn ko biết cách thì nghỉ dùng tính năng này vì mình sẽ ko hướng dẫn lại.<br>

                => để màn hình to sẽ dễ bị check captcha sai, vì captcha trên web làm theo captcha java</p><br>

            </div>

            <div class="row pl-2 pt-2">
              <a href="index.php">
                <b class="text-primary">
                  <i class="fa fa-chevron-left"></i>
                  Trở lại
                </b>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="assets/js/jquery.form.min.js"></script>
    <script src="assets/js/clipboard.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/app17d5.js?_=1668687099"></script>
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="text-center">
        Trò chơi không có bản quyền chính thức, hãy cân nhắc kỹ trước khi tham gia.<br>
        Chơi quá 180 phút một ngày sẽ ảnh hưởng đến sức khỏe.
      </div>
    </footer>
  </div>