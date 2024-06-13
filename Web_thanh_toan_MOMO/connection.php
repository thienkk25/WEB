<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "demothanhtoan";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
else echo '
<div class="container">
<table class="table table-hover text-center">
    <thead>
      <tr>
        <th colspan="6">Thẻ ATM TEST</th>
      </tr>
      <tr>
        <th>No</th>
        <th>Tên chủ thẻ</th>
        <th>Số thẻ</th>
        <th>Ngày phát hành</th>
        <th>OTP</th>
        <th>Trường hợp test</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>NGUYEN VAN A</td>
        <td>9704 0000 0000 0018</td>
        <td>03/07</td>
        <td>OTP</td>
        <td>Thành công</td>
      </tr>
      <tr>
        <td>2</td>
        <td>NGUYEN VAN A</td>
        <td>9704 0000 0000 0026</td>
        <td>03/07</td>
        <td>OTP</td>
        <td>Thẻ bị khóa</td>
      </tr>
      <tr>
        <td>3</td>
        <td>NGUYEN VAN A</td>
        <td>9704 0000 0000 0034</td>
        <td>03/07</td>
        <td>OTP</td>
        <td>Nguồn tiền không đủ</td>
      </tr>
      <tr>
        <td>4</td>
        <td>NGUYEN VAN A</td>
        <td>9704 0000 0000 0042</td>
        <td>03/07</td>
        <td>OTP</td>
        <td>Hạn mức thẻ</td>
      </tr>
    </tbody>
  </table>
</div
';
?>