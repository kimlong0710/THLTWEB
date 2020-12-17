<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Người Dùng</title>
<link rel="stylesheet" href="css/them_sanpham.css" />
</head>

<body>
<?php
	include'../include/connect.php';
 

if(isset($_POST['btnthem']))
{
	$tennd=$_POST['tennd'];
    $username=$_POST['username'];
    $password = $_POST["password"];
    $passwordHashed = MD5($password);
	$email = $_POST["email"];
	$phanquyen = $_POST["phanquyen"];

	// echo "<pre>";
	// print_r($tendn);
	// print_r($phanquyen);
	// exit();

	if ($tennd == "" || $username == "" || $password == "" || $phanquyen == "") {
		echo "Bạn cần điền đầy đủ thông tin !";
	}else{
		$insertnd = mysql_query("INSERT INTO nguoidung(`tennd`, `username`, `passwords`, `email`, `phanquyen`) 
								VALUES ('$tennd', '$username', '$passwordHashed', '$email', '$phanquyen')");
		if($insertnd) {
			
			echo "<p align = center>Thêm nguoi dung <font color='red'><b> $tennd </b></font> thành công!</p>";
			echo '<meta http-equiv="refresh" content="1;url=admin.php?admin=hienthind">';
		}
		else if($username=`username`) {
			echo "Tên đăng nhập đã có!";
		}
		else {
			echo "Thêm thất bại!";
		}
	}
	
	
}
?>

<form action="" method="post">
	<table>
		<tr class="tieude_themsp">
				<td colspan=2>Thêm Người Dùng </td>
			</tr>
		<tr>
        	<td>Họ tên <font color='red'><b>*</b></font></td><td><input type="text" name="tennd"></td>
		</tr>
		<tr>
    		<td>Tên đăng nhập <font color='red'><b>*</b></font></td><td><input type="text" name="username" /></td>
		</tr>
		<tr>
    		<td>Mật Khẩu <font color='red'><b>*</b></font></td><td><input type="password" name="password" /></td>
		</tr>
		<tr>
    		<td>Email </td><td><input type="text" name="email" /></td>
		</tr>
		<tr>
            <td>Phân quyền <font color='red'><b>*</b></font></td>
			<td>
            	<select name="phanquyen">
					<option value="">Chọn quyền</option>
                	<option value="0">Administrator</option>
                    <option value="1">Người Dùng</option>
                </select>
			</td>
		</tr>
		<tr>
			<td colspan=2 class="input">
            <input type="submit" name="btnthem" value="Thêm" />
            <input type="reset" name="btnhuy" value="Hủy" />
			</td>
		</tr>
       </table>    
</form>




</body>
</html>