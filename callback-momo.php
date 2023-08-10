<?php
include(__DIR__ . "/momo/config.php");
include(__DIR__ . "/api/config.php");

$url = "https://api.sieuthicode.net/historyapimomo/{$apikeymomo}";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Tắt kiểm tra chứng chỉ SSLf
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if ($response === false) {
  echo 'Lỗi cURL: ' . curl_error($ch);
}

curl_close($ch);

if ($response !== false) {
  // Xử lý phản hồi ở đây
  $jsonResponse = json_decode($response);
  if ($jsonResponse->status) {
    $tranList = $jsonResponse->momoMsg->tranList;

    $responseData = array(); // Khởi tạo mảng chứa dữ liệu



    //test nhiều lần xem nó có bị cộng dồn trùng không
    foreach ($tranList as $tran) {
      $ID = $tran->ID;
      $tranId = $tran->tranId;
      $io = $tran->io;
      $partnerId = $tran->partnerId;
      $status = $tran->status;
      $partnerName = $tran->partnerName;
      $amount = $tran->amount;
      $comment = $tran->comment;
      $millisecond = $tran->millisecond;

      // Tạo một mảng chứa thông tin từng giao dịch
      $transactionData = array(
        "ID" => $ID,
        "tranId" => $tranId,
        "io" => $io,
        "partnerId" => $partnerId,
        "status" => $status,
        "partnerName" => $partnerName,
        "amount" => $amount,
        "comment" => $comment,
        "millisecond" => $millisecond
      );

      // Thêm thông tin giao dịch vào mảng chứa dữ liệu chung
      $responseData[] = $transactionData;

      $result = $conn->query("SELECT * FROM momo_trans WHERE status = 0 AND content = '{$comment}'");

      $resultReferal = $conn->query("SELECT user_referral FROM account WHERE username = '{$row['username']}' ");

      if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($amount >= $row['amount']) {
          $price = $amount;

          $percentAffilate = $price * 15%
          $conn->query("UPDATE account SET vnd = vnd + {$price}, tongnap = tongnap + {$price} WHERE username = '{$row['username']}'");
          if($resultReferal && $resultReferal = ''){
            $conn->query("UPDATE account SET coin_affilate = coin_affilate + {$percentAffilate} WHERE referral_code = '{$resultReferal}'");

          }

    
          $conn->query("UPDATE momo_trans SET status = 1 WHERE id = {$row['id']}");
        } else {
          $conn->query("UPDATE momo_trans SET status = 2 WHERE id = {$row['id']}");
        }
      }
    }

    // Chuyển đổi mảng chứa dữ liệu thành chuỗi JSON
    $jsonResponseData = json_encode($responseData);

    // Thiết lập các thông tin phản hồi HTTP
    header("Content-Type: application/json");
    echo $jsonResponseData;
  } else {
    // Xử lý khi có lỗi trong phản hồi API
    echo "Lỗi trong phản hồi API";
  }
} else {
  // Xử lý khi không thể lấy được phản hồi từ API
  echo "Có lỗi xảy ra khi gọi API.";
}
