<?php 
session_start(); 
unset($_SESSION['phanquyen']);
unset($_SESSION['username']);
unset($_SESSION['idnd']);


echo "
							<script language='javascript'>
								//alert('Thoát quản trị thành công');
								window.open('admin.php','_self', 1);
							</script>
						";
?>