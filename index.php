<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel la 7ma</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
        
    <center>
        <form method="post" action="login.php">
            <table>
                <tr><td colspan="2" style="background-color:#33A8DB; padding-bottom:5px; padding-top:5px;">
                <label>ACCESO:</label></td>
                </tr>
                <tr><td align="center" rowspan="5"><img src="candado.jpg" alt="imagen de candado"/></td>
                <td><label>Usuario</label></td>
                </tr>
                <tr><td><input type="email" name="txtusuario"/></td></tr>
                <tr><td><label>Password</label></td></tr>
                <tr><td><input type="password" name="txtpassword" /> </td></tr>
                <tr><td><input type="submit" name="btnIngresar" value="Ingresar"  /> </td></tr>
            </table>
        </form>
        <form action="alta_usuario.php">
            <table>
                <tr><td><input type="submit" value="Registrarse" /></td></tr>
            </table>
        </form>
    </center>

</body>

</html>