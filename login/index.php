<?php
session_start();
if (isset($_SESSION["id_petugas"])) {
    header("Location : http://localhost/siperpus/index.php");
} 
?>
<center>
<form action="proses-login.php" method="post">
    <table>
        <tr>
            <td><label for="">Username</label></td>
            <td><input type="text" name="username" id=""></td>
        </tr>
        <tr>
            <td><label for="">Password</label></td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" value="Login" name="btnlogin">
            </td>
        </tr>
    </table>
    </form>
    </center>