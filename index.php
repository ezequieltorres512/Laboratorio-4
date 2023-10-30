<html>
<center>
    <form method="post" action="">
        <table>
            <tr><td colspan="2" style="background-color:#33A8DB; padding-bottom:5px; padding-top:5px;">
            <label>Login</label></td>
            </tr>
            <tr><td align="center" rowspan="5"><img src="candado.jpg" alt="imagen de candado"/></td>
            <td><label>Usuario</label></td>
            </tr>
            <tr><td><input type="email" name="txtusuario"/></td></tr>
            <tr><td><label>Password</label></td></tr>
            <tr><td><input type="password" name="txtpassword" /> </td></tr>
            <tr><td><input type="submit" name="btnIngresar" value="Ingresar"  /> </td></tr>
        </table>

        <?php
            include_once("controlador_login.php");
        ?>
    </form>
</center>
</html>