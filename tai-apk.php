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
              <span style="font-size: 10px">Đăng ngày 12-08-2023</span>
            </div>
            <div class="row pl-2">
              <b class="text text-danger" style="font-size: 18px;"> Hướng dẫn tải APK</b>
            </div>
            <p>Thân chào các <span style="color:#3498db"><strong>Chiến binh,</strong></span></p>
            <p>Dưới đây là tổng hợp mod bản APK của <span style="color:#e83e8c"><strong>Đế Vương</strong></span> </p>
            <div>
              <!-- <a href="./taive/NROMASTER_BYMODEREN.apk" class="btn btn-primary text-white my-2" download>
                <i class="fa fa-download"></i> Mod APK 225
              </a> -->
              <a href="./taive/NROMASTER230.apk" class="btn btn-primary text-white my-2" download>
                <i class="fa fa-download"></i> Mod APK 230
              </a>
              <a href="./taive/DeVuong_Koi.apk" class="btn btn-primary text-white my-2" download>
                <i class="fa fa-download"></i> Mod APK Koi
              </a>
            </div>

            <div>
              <p>Lệnh Chat<br>

                Dấu _ là dấu cách nha, đừng có nhầm đấy!<br>

                Kí tự X là phần nội dung các bạn cần thay đổi!<br>

                1.Hiển Thị<br>

                - showhp: Bật/Tắt hiển thị list nhân vật trong map<br>

                - go_X ( X là nhân vật trong map ): : nhảy đến chỗ nhân vật trong map (bật showhp để xem số thứ tự nhân vật)<br>

                - ttsp: Bật/Tắt hiển thị thông tin sư phụ.<br>

                - ttdt: Bật/Tắt hiển thị thông tin đệ tử<br>

                - ttnv: Bật/Tắt hiển thị trạng thái nhân vật đang trỏ (bị trói, bị thôi miên hay gì gì đấy + soi thời gian)<br>

                2.Săn Boss<br>

                - sb: Bật/Tắt hiển thị thông báo boss<br>

                - line: Bật/Tắt hiển thị đường kẻ tới boss<br>

                - bossm: Bật/Tắt hiển thị Boss trong khu<br>

                - doall: Bắt đầu dò BOSS<br>

                - do_abc: dò boss sẽ dừng lại khi gặp được boss có tên chứa kí tự abc<br>

                - dk_x: dò bắt đầu từ khu X nếu không cài mặc định là 0<br>

                - clrz: Reset khi mặc định dò về 0<br>

                - ksb: Bật ks boss bằng đấm thường<br>

                - ksbs5: Bật ks boss bằng skill5 (qckk hoặc laze hoặc nổ tùy hành tinh)<br>

                - fcb: Bật auto chỉ vào boss<br>

                3.Chức Năng Nổi Bật<br>

                - tdthuong: auto thượng đế bằng vàng<br>

                - tdvip: auto thượng đế bằng NGỌC<br>

                - dapdo: Auto đập đồ (bỏ đồ vào đập rồi ấn vào đồ nhập số sao muốn đập)<br>

                - mont: auto mở nội tại khi ra nội tại yêu cầu và chỉ số lớn hơn hoặc bằng chỉ số set up trước<br>

                - menu: Mở menu chức năng<br>

                - kk: Dùng để khóa khu<br>

                - kmap: Dùng để khóa map<br>

                - set:Để tùy chọn set 1 set 2.<br>

                - alogin: Tự động đăng nhập khi bị out<br>

                - akhu: Về lại khu cũ.<br>

                - atc: Bật/Tắt Auto Chat Thường<br>

                - atchattg: Bật/Tắt Auto Chat Kênh Thế Giới<br>

                - ndc_nộidung: Cài đặt auto chát thường<br>

                - ndctg_nộidung: Cài đặt auto chát thế giới<br>

                4.Chức năng hỗ trợ game<br>

                - speed_X: thay đổi tốc độ game<br>

                - tdc_X:thay đổi tốc độ chạy<br>

                - - kx_X: Auto vào khu X<br>

                - k_X: Đổi tới khu X<br>

                - ak: Tự động đánh<br>

                - anz: auto nhặt xa<br>

                - ts: Tàn sát quái.<br>

                - add: add/xóa quái vào/khỏi danh sách tàn sát<br>

                - addd: add/xóa loại quái vào/khỏi danh sách<br>

                - clrm: Xóa danh sách đánh quái<br>

                - ngochs_X: Setup số hồng ngọc được sử dụng để hồi sinh<br>

                - ahs: auto hồi sinh với số ngọc được chỉ định là ngọc hồi sinh<br>

                - abt : auto bông tai tách hợp thể nhanh<br>

                - bt_X : delay auto bông tai với thời gian X (giây)<br>

                - gmt_X: giữ mục tiêu nhân vật X trong map ( có thể bật hiển thị hp nhân vật để xem số thứ tự )<br>

                - gmt:bỏ mục tiêu đang giữ<br>

                - pkm:những thằng đấm nhau được trong khu<br>

                - ht: hợp thể nhanh<br>

                - attnl:auto tnll khi mất hp hoặc ki và chuyển về chiêu đấm<br>

                - xht:hiệu ứng hợp thể<br>

                - xtb:xóa tàu bay<br>

                - xoamap:xóa địa hình<br>

                - xbg:xóa background<br>

                - xht:hiệu ứng hợp thể<br>

                5. Di chuyển<br>

                - u_X:khinh công<br>

                - d_X:độn thổ<br>

                - xl_X:dịch trái<br>

                - r_X:dịch phải<br>

                - kvt: khóa vị trí<br>

                - nmt:Next map trái<br>

                - nmg:Next map giữa<br>

                - nmp:next map phải<br>

                - nmtr:Next map ở những nơi có cổng thẳng đứng<br>

                6. Đệ Tử<br>

                - abf :Buff đậu theo chỉ số sư phụ<br>

                - bhp _ x:setup hp của sư phụ để buff đậu<br>

                - bki _ x:setup ki của sư phụ.<br>

                - abfdt:buff đậu theo chỉ số đệ tử.<br>

                - bhpdt _x :set up hp của đệ tử để buff đậu<br>

                - bkidt _ x:set up ki đệ tử</p><br>

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