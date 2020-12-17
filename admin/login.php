<?php
session_start();
if(isset($_SESSION['username']))
{

//     echo "<pre>";
//    print_r($_SESSION);
//    exit();
	

if($_SESSION['phanquyen']==1)
{
	header("location:../index.php");
}
if($_SESSION['phanquyen']==0)
{
	header("location:admin.php");
}
}
?>
<link rel="stylesheet" href="css/login.css" type="text/css">
<div class="body">
    <div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
<?php
include("../include/connect.php");

if(isset($_POST['login']))
{
    $username = $_POST['user'];
    $password = MD5($_POST['pass']);
    $sql_check = mysql_query("SELECT * FROM nguoidung WHERE username = '$username'");
    $dem = mysql_num_rows($sql_check);

    if($dem == 0)
    {
        echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
    }
    else
    {
        $sql_check2 = "SELECT * FROM nguoidung WHERE username = '$username' AND passwords = '$password'";
		$row=mysql_query($sql_check2);	
        $dem2 = mysql_num_rows($row);
        if($dem2 == 0)
            echo "<p class='thongbao1'>Mật khẩu không chính xác</p>";
        else
        {
	
		 while($rows = mysql_fetch_array($row))
            {
              $_SESSION['username'] = $username;
				$_SESSION['phanquyen'] = $rows['phanquyen'];
				$_SESSION['idnd'] = $rows['idnd'];
                if($rows['phanquyen'] == 0)
                {
                    //redirect("admin.php", "Đăng nhập thành công!!!!.", 2 );
                    echo "<p class='thongbao1'>Đăng nhập thành công</p>";
					echo "
							<script language='javascript'>
								//alert('Đăng nhập quản trị thành công');
								window.open('admin.php','_self', 1);
							</script>
						";
                }
                else
                {
                    //redirect("index.php", "Đăng nhập người dùng !!!!.", 2 );
					header('location:../index.php');
                }
            }
        }
    }
}
?>
<div class="admin_login">
    <form action="" method="post">
        <label>Tên đăng nhập:</label><input type="text" name="user" placeholder=" Username"><br>
        <label>Mật khẩu:</label><input type="password" name="pass" placeholder=" Password"><br>
        <button name="login" class="dangnhap">Đăng nhập</button><button class="thoat"><a href="../index.php">Thoát</a></button>
    </form>
</div>
</div>
