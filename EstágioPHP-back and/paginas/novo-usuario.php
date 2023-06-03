<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro_Usuario</title>
    <link rel="stylesheet" href="../css/cadastro.css">

</head>
<body>
<a href="../inde.php"> Menu-Home</a>
  <div class="box">
    <h2>Preenchimento do formulário:</h2>
    <form action="../baseDados/bdCadastroUsuario.php"method="post">
        <fieldset>
            <legend><!--Cria titula dentro do formulario-->
               Dados do Usuario
            </legend>
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome"> <br>
            <br>

            <label for="cell" class="form-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone" placeholder="Digite Telefone"><br>
            <br>


            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="e_mail" placeholder="Digite seu e-mail"><br>
            <br>

            <label for="password" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha"><br>
            <br>


            <label for="morada" class="form-label">Morada:</label>
            <input type="text" class="form-control" name="morada" placeholder="Digite sua Morada:"><br>
            <br>

            
            <label for="estado" class="form-label">Perfil:</label>
            <select name="perfil" class="form-select" placeholder="Informe o perfil:">
            <!--<option selected>Seleciona</option>-->
            <option>Usuario</option>
            <option>Administrador</option>
            </select><br>
            <br>
    
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="cancelar" class="btn btn-primary">Cancelar</button>
        </fieldset>
    </form>
  </div>   
</body>
</html>