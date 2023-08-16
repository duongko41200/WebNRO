<?php
include('set.php');
if (session_status() == PHP_SESSION_NONE) {
  session_start(); //khởi động phiên làm việc
}

$_alert = null;
$_title = "Đế Vương - Thanh Toán";
include_once 'head.php';
if ($_login == null) {
  header("location:/webNRO/login.php");
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
  <script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" /> -->
  <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- <link rel="stylesheet" href="./css/spin.css"> -->
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
      background-size: auto;
    }
  }

  @media (min-width:768px) {
    .card-momo {
      opacity: 0;
    }
  }

  @media (min-width:768px) {
    .card-momo {
      opacity: 0;
    }
  }

  .card-momo {
    font-size: 16px;
  }

  .card-momo a {
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

  #status-the {
    position: relative;
    top: -50px;
    left: calc(50% - 50px);
  }

  .hidden {
    display: none;
  }

  .configure-border-1 {
    width: 50px;
    height: 50px;
    padding: 3px;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fb5b53;
    animation: configure-clockwise 3s ease-in-out 0s infinite alternate;
  }

  .configure-border-2 {
    width: 50px;
    height: 50px;
    padding: 3px;
    left: -50px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgb(63, 249, 220);
    transform: rotate(45deg);
    animation: configure-xclockwise 3s ease-in-out 0s infinite alternate;
  }

  .configure-core {
    width: 100%;
    height: 100%;
    background-color: #1d2630;
  }

  @keyframes configure-clockwise {
    0% {
      transform: rotate(0);
    }

    25% {
      transform: rotate(90deg);
    }

    50% {
      transform: rotate(180deg);
    }

    75% {
      transform: rotate(270deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  @keyframes configure-xclockwise {
    0% {
      transform: rotate(45deg);
    }

    25% {
      transform: rotate(-45deg);
    }

    50% {
      transform: rotate(-135deg);
    }

    75% {
      transform: rotate(-225deg);
    }

    100% {
      transform: rotate(-315deg);
    }
  }

  .momo-img {
    max-width: 300px;
    display: block;
    margin: 0 auto;
    border-radius: 10px;
    margin-bottom: 20px;
    /* Căn giữa theo chiều ngang */
  }

  .momo-content {
    font-size: 20px;
    font-weight: bold;
    color: #f44336
  }

  .momo-container {
    margin-top: 20px;
  }

  .center {
    display: flex;
    justify-content: center;
    align-items: center;
    /* Điều chỉnh chiều cao tùy ý */
  }

  .momo-content--style {
    border: #cd3a2f 1px solid;
    cursor: pointer;
    background-color: #cd3a2f;
    color: #fff;
    padding: 8px;
    border-radius: 8px;
    box-shadow: 2px 3px coral;
  }

  .input-copy {
    display: grid;
    grid-template-columns: 8fr 1fr;
    align-items: center;
  }

  .btn-copy {
    margin-left: 10px;
    font-size: 20px;
    cursor: pointer;
    color: #f44336;
  }

  .text-style {
    text-decoration: underline;
    font-style: italic;
  }
</style>
<main class="flex-grow-1 flex-shrink-1">
  <script type="text/javascript">
    new WOW().init();
  </script>
  </br>
  <div class="container py-3">
    <main>
      <div class="row">
        <div class="col-md-3 pb-3 pt-2">
          <div class="list-group d-none d-sm-block">
            <a href="profile.php" class="list-group-item list-group-item-action">
              <i class="fas fa-user me-2"></i> Thông tin tài khoản
            </a>
            <a href="nap-tien.php" class="list-group-item list-group-item-action">
              <i class="fas fa-coins me-2"></i> Nạp thẻ cào
            </a>
            <a href="nap-tien.php" class="list-group-item list-group-item-action active">
              <i class="fas fa-coins me-2"></i> Nạp MOMO
            </a>
            <a href="affilate.php" class="list-group-item list-group-item-action">
              <i class="fas fa-coins me-2"></i> Affilate
            </a>
            <a href="doi-mat-khau.php" class="list-group-item list-group-item-action">
              <i class="fas fa-unlock me-2"></i> Đổi mật khẩu
            </a>
            <a href="/?out" class="list-group-item list-group-item-action ">
              <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
            </a>
          </div>
        </div>
        <div class="col-md-9 pb-3 pt-2">
          <h5>Nạp Thẻ Tự Động</h5>
          <p class="card-momo">Nếu bạn muốn nạp bằng thẻ thì <a href="/nap-tien.php">vào đây</a></p>
          <table class="table">
            <div class="row">
            </div>
            <div class="col-4 text-right">
            </div>
        </div>
      </div>
      <div class="card-body">

        <form method="POST" action="#" id="myform">
          <tbody>
            <label>Tài Khoản: </label><br>
            <input type="text" class="form-control form-control-alternative" style="background-color: #DCDCDC; font-weight: bold; color: #696969" name="username" value="<?php echo $_username; ?>
" readonly required>
            <label>Mệnh giá: </label><br>
            <select class="form-control form-control-alternative" name="momo_amount">
              <option value="">Chọn mệnh giá</option>
              <option value="10000">10.000</option>
              <option value="20000">20.000</option>
              <option value="30000">30.000 </option>
              <option value="50000">50.000</option>
              <option value="100000">100.000</option>
              <option value="200000">200.000</option>
              <option value="300000">300.000</option>
              <option value="500000">500.000</option>
              <option value="1000000">1.000.000</option>
            </select>
            <div class="center">
              <button type="submit" class="btn btn-outline-primary mt-2" name="submit">NẠP NGAY</button>
            </div>
          </tbody>

          <div class="momo-container hidden">
            <div class="momo-qr">
              <img src="./img/momo.jpg" class="momo-img" alt="Chuyển khoản momo">
            </div>
            <label class="momo-content">Nội dung chuyển khoản: </label><br>
            <div class="input-copy">
              <input type="text" class="form-control form-control-alternative content-momo" style="background-color: #DCDCDC; font-weight: bold; color: #696969;" name="text-content" value="Lỗi..." readonly required>
              <i class="fas fa-copy btn-copy" onclick="copyTextContent()"></i>
            </div>

            <p class="text-style"> (*) Cần ghi đúng nội dung chuyển khoản để có thể nạp được coin <br />
              (*) Sau khi chuyển xong thì click nút xác nhận bên dưới để hoàn tất giao dịch
            </p>

            <a  class="momo-content momo-content--style"> Xác nhận đã chuyển khoản </a><br>

            <script type="text/javascript" language="javascript">
              $(document).ready(function() {
                $(".momo-content--style").click(function() {

                  console.log('đac nhấn xác nhận tiền')


                  window.location.href = "http://localhost/webNro/callback-momo.php"
                });
              });
            </script>
          </div>
        </form>

        <hr>
        <h2 class="fw-light">Lịch sử nạp momo</h2>
        <div class="card-body">
          <table class="table table-bordered blueTable my-table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã giao dịch</th>
                <th scope="col">Số tiền</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thời gian</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include("./api/config.php");
              include('connect.php');
              $result = $conn->query("SELECT * FROM momo_trans WHERE username = '" . $_username . "'");
              $stt = 1;
              if ($result === false) {
                echo 'Lỗi truy vấn SQL: ' . $conn->error;
              } else if ($result->num_rows > 0) {
                // header('Refresh: 1; url=./callback-momo.php');
                while ($row = $result->fetch_assoc()) {
                  $status_text = 'Đang xử lý';
                  if ($row['status'] == 2) {
                    $status_text = 'Thất bại';
                  }
                  if ($row['status'] == 1) {
                    $status_text = 'Thành công';
                  }
                  echo '
                                                <tr>
                                                    <td>' . $stt . '</td>
                                                    <td>' . $row['trans_id'] . '</td>
                                                    <td>' . number_format($row['amount']) . ' VNĐ</td>
                                                    <td>' .  $status_text . '</td>
                                                    <td>' . date_format(new DateTime($row['date']), 'd/m/Y ') . '</td>
                                                </tr>
                                                ';
                  $stt++;
                }
              } else {
                echo '
                                    <tr>
                                        <td colspan="3" align="center"><span style="font-size:100%;"><< Lịch Sử Trống >></span></td>
                                    </tr>
                                    
                                    ';
              }

              // Đóng kết nối
              $conn->close();
              ?>


            </tbody>
          </table>
        </div>
        <script type="text/javascript">
          var statusContent = $("#status").html();
          $("#myform").submit(function(e) {
            if ($("select[name*='momo_amount']")) {
              var momo_amount = $("select[name*='momo_amount']").val();
              if (momo_amount == "") {
                toastr.error("Vui Lòng Chọn Mệnh Giá !");
                return false;
              }
            }
            e.preventDefault();
            $.ajax({
              url: "./ajax/momo.php",
              type: 'post',
              data: $("#myform").serialize(),
              success: function(data) {
                console.log(data);
                console.log($("select[name*='text-content']").val());
                $("input[name*='text-content']").val(data);
                // document.getElementById("myform").reset();
              }
            });
            $(".momo-container").removeClass('hidden');
          });
        </script><br><br>
        <div>- Hãy Kiểm Tra Kĩ Thông Tin Trước Khi Nạp</div>
        <div>- Nạp Sai Mệnh Giá, Thông Tin Thẻ Admin Không Chịu Trách Nhiệm.</div>
        <div>- Quá 30 Phút Thẻ Chưa Duyệt Hãy Báo Ngay Cho Admin Để Được Hỗ Trợ Nhanh Nhất!</div>

        </form>
        <?php
        include_once 'end.php';
        ?>
      </div>
  </div>
  </div>
  <div id="status">

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
  <!-- Code made in tui 127.0.0.1 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <script>
    function copyTextContent() {
      var input = document.getElementsByName("text-content")[0];
      input.select();
      document.execCommand("copy");
      window.getSelection().removeAllRanges();
      toastr.success("Đã sao chép nội dung: " + input.value);
    }
  </script>

  </div>
  <div id='stars'></div>
  <div id='stars2'></div>
  <div id='stars3'></div>
</main>