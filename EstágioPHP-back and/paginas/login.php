
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela_login</title>
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
  <div>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="../baseDados/bdlogin.php" method = "post">
        <label for="estado" class="form-label">Seleciona_Perfil:</label> <br>
            <select name="perfil" class="form-label" placeholder="Informe o perfil:">
                <option>Usuario</option>
                <option>Administrador</option>
            </select><br>
            <br>
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome">
        <br><br>
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" name="senha" placeholder="Digite a senha">
        <br><br>
        <button>Enviar</button>
    </form>
  </div>
</body>
</html>

