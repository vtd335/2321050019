<?php
//session 
#thông tin đăng nhập, giỏi hàng,.... thông tin quan trọng
session_start();

//cookie
#lưu ở phía người dùng
#dùng cho những thông tin ít quan trọng
$cookieName ="user";
$cookieValue ="PhamDuc";

setcookie($cookieName, $cookieValue, time() + (86400 *30), "/");

if (isset($_COOKIE[$cookieName])) {
    echo "cookie đã tồn tại";
}
else {
    echo "cookie chưa tồn tại";
}
?>