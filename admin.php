<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
  <?php include 'adminlogin.php'; ?>
  <form action="admin.php" method="post">

    <br><br><br><br>
    <table width="25%" border="0" cellspacing="40" align="center">
        <tr>
            <td align="center"><img src="https://yinnepal.files.wordpress.com/2017/11/admin.png?w=640" width="50%" align="center"> </td>
        </tr>
        <tr>
            <td><input type="text" placeholder="E-mail" id="type" name="email"></td>
        </tr>
        <tr>
            <td><input type="password" placeholder="*******" id="type" name="pass"></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" name="submit" value="Login" id="btn"></td>
        </tr>
    </table>
</form>
</body>
</html>
