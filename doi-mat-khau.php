<?php
include('set.php');
if (session_status() == PHP_SESSION_NONE) {
  session_start(); //khởi động phiên làm việc
}

$_alert = null;
$_title = "Đế Vương - Đổi mật khẩu";
include_once 'head.php';
if ($_login == null) {
  header("location:/login.php");
}
?>

<?php
if (isset($_POST['password'])) {
  $old_pass = isset_sql($_POST['password']);
  $new_pass = isset_sql($_POST['new_password']);
  $re_pass = isset_sql($_POST['new_password_confirmation']);
  if ($old_pass != $_password) {
    echo '
		<script type="text/javascript">
		
		$(document).ready(function(){
		
		  swal({
				title: "Thất bại",
				text: "Mật khẩu hiện tại không đúng!",
				type: "error",
				confirmButtonText: "OK",
		  })
		});
		
		</script>
		';
  } else {
    if ($new_pass != $re_pass) {
      echo '
			<script type="text/javascript">
			
			$(document).ready(function(){
			
			  swal({
					title: "Thất bại",
					text: "Mật khẩu mới không trùng nhau!",
					type: "error",
					confirmButtonText: "OK",
			  })
			});
			
			</script>
			';
    } else {
      $query = _query(_update('account', "password='$new_pass'", "username='$_username'"));
      if ($query) {
        echo '
				<script type="text/javascript">
				
				$(document).ready(function(){
				
				  swal({
						title: "Thành công",
						text: "Đổi mật khẩu thành công!",
						type: "success",
						confirmButtonText: "OK",
				  })
				});
				
				</script>
				';
      } else {
        echo '
				<script type="text/javascript">
				
				$(document).ready(function(){
				
				  swal({
						title: "Thất bại",
						text: "Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!",
						type: "error",
						confirmButtonText: "OK",
				  })
				});
				
				</script>
				';
      }
    }
  }
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
            <a href="nap-momo.php" class="list-group-item list-group-item-action">
              <i class="fas fa-coins me-2"></i> Nạp MOMO
            </a>
            <a href="doi-mat-khau.php" class="list-group-item list-group-item-action active">
              <i class="fas fa-unlock me-2"></i> Đổi mật khẩu
            </a>
            <a href="/?out" class="list-group-item list-group-item-action ">
              <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
            </a>

          </div>
        </div>
        <div class="col-md-9 pb-3 pt-2">
          <h5>Đổi mật khẩu</h5>
          <table class="table">
            <div class="row">
            </div>
            <div class="col-4 text-right">
            </div>
        </div>
      </div>
      <div class="card-body">
        <!-- // Đổi mật khẩu -->
        <form method="POST">
          <tbody>
            <label>Mật khẩu cũ:</label>
            <input type="password" class="form-control form-control-alternative" name="password" id="password" required />
            <label>Mật khẩu mới:</label>
            <input type="password" class="form-control form-control-alternative" name="new_password" id="new_password" required />
            <label>Nhập lại mật khẩu mới:</label>
            <input type="password" class="form-control form-control-alternative" name="new_password_confirmation" id="new_password_confirmation" required /><br>
            <button type="submit" class="btn btn-outline-primary" name="submit">ĐỔI MẬT KHẨU</button>
          </tbody>
        </form>
      </div>
  </div>
  </div>
  <div id="status"></div>
  <script>
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
  <!-- Code made in tui 127.0.0.1 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  include_once 'end.php';
  ?>
  </div>
  <div id='stars'></div>
  <div id='stars2'></div>
  <div id='stars3'></div>
</main>