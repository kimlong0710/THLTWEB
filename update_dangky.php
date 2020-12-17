
<?php 
include 'include/connect.php';
include 'admin/function/function.php';

if(isset($_POST['submit']))
{
	$tennd=$_POST['tennd'];
    $username=$_POST['username'];
    $password = $_POST["passwords"];
    $passwordHashed = MD5($password);
	$email = $_POST["email"];
	$phanquyen = "1";
	
	
	//$insert="INSERT INTO nguoidung VALUES('','$tennd', '$user', '$pass', '$email','$ngay', '1')";
		$insertnd = mysql_query("INSERT INTO nguoidung(`tennd`, `username`, `passwords`, `email`, `phanquyen`) 
								VALUES ('$tennd', '$username', '$passwordHashed', '$email', '$phanquyen')");
		if($insertnd) {
			redirect("index.php", "Bạn đã đăng ký thành công.", 2 );
			//echo "<p align = center>Đăng ký thành công!</p>";
			//echo '<meta http-equiv="refresh" content="1;url=index.php">';
		}
			else { 
				//echo "Thất bại";
				redirect("index.php", "Đăng kí thất bại !!!!.", 2 );
			}
}
?>