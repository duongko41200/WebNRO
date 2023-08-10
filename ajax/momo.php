<?php
// Kiểm tra xem phiên làm việc đã được khởi động hay chưa
if (session_status() == PHP_SESSION_NONE) {
  // Nếu chưa khởi động, tiến hành khởi động phiên làm việc
  session_start();
}

include(__DIR__ . "/../api/config.php");
include_once('../set.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $conn->real_escape_string(strip_tags(addslashes($_username)));
  $content = $username . "_" . generateRandomNumber($conn, $username);
  $amount = $conn->real_escape_string(strip_tags(addslashes($_POST['momo_amount'])));
  $trans_id = "default";

  // Lưu nội dung và thông tin liên quan vào cơ sở dữ liệu
  $query = "INSERT INTO momo_trans (username, amount, trans_id, content) VALUES ('$username', '$amount', '$trans_id', '$content')";
  if ($conn->query($query) === TRUE) {
    // Nếu lưu thành công, trả về nội dung cho phần frontend xử lý
    echo $content;
  } else {
    // Nếu có lỗi trong quá trình lưu, trả về một thông báo lỗi
    echo "Lỗi khi lưu vào cơ sở dữ liệu: " . $conn->error;
  }
}


function generateRandomNumber($conn, $username)
{
  $randomNumber = mt_rand(1, 9999);
  $query = "SELECT * FROM momo_trans WHERE content LIKE '%" . $username . "_" . $randomNumber . "%'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    // Nếu số đã tồn tại trong cơ sở dữ liệu, tiếp tục sinh số mới
    return generateRandomNumber($conn, $username);
  } else {
    // Nếu số chưa tồn tại, trả về số ngẫu nhiên
    return $randomNumber;
  }
}

$conn->close();
