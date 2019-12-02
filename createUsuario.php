<?php 
 

    if ($_POST) {
        $erros = [
          'nome' => false,
          'email' => false,
          'senha' => false,
          'confirmarSenha' => false
          
        ];
    
    
        if (empty($_POST['nome'])) 
        $erros['nome'] = 'O campo nome é obrigatório';

        if (empty($_POST['email']))
        $erros['email'] = 'O campo email deve ser preenchido';
        

        if (strlen($_POST['senha']) < 6) {
        $erros['senha'] = 'A senha deve conter no mínimo 6 caracteres';
        }
        if ($_POST['senha'] != $_POST['confirmarSenha']) {
        $erros['senha'] = 'Senhas não coincidem';
        }


}

    if ($_POST) {
        $usuariosJson = file_get_contents('./includes/usuarios.json');
        $usuariosArray = json_decode($usuariosJson, true);

        $novoUsuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
            
        ];

        $usuariosArray[] = $novoUsuario;

        $novoUsuariosJson = json_encode($usuariosArray);

        
        $cadastrou = file_put_contents('./includes/usuarios.json', $novoUsuariosJson);
      
 
        if ($cadastrou) {
            header('Location: login.php');
        }
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <main>

    <div class="container">
    
    <form action="createUsuario.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nomeInput">Nome</label>
        <input id="nomeInput" name="nome" type="text" class="form-control <?php if(isset($erros) && !empty($erros['nome'])) echo 'is-invalid' ?>" />
        <?php if(isset($erros) && !empty($erros['nome'])) : ?>
        <div class="invalid-feedback"><?= $erros['nome'] ?></div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="emailInput">E-mail</label>
        <input id="emailInput" name="email" type="email" class="form-control <?php if(isset($erros) && !empty($erros['email'])) echo 'is-invalid' ?>" />
        <?php if(isset($erros) && !empty($erros['email'])) : ?>
        <div class="invalid-feedback"><?= $erros['email'] ?></div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="senhaInput">Senha <br> <small class="text-muted">Mínimo 6 caracteres</small></label>
        <input id="senhaInput" name="senha" type="password" class="form-control <?php if(isset($erros) && !empty($erros['senha'])) echo 'is-invalid' ?>" />
        <?php if(isset($erros) && !empty($erros['senha'])) : ?>
        <div class="invalid-feedback"><?= $erros['senha'] ?></div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="confirmarSenhaInput">Confirmar Senha</label>
        <input id="confirmarSenhaInput" name="confirmarSenha" type="password" class="form-control <?php if(isset($erros) && !empty($erros['confirmarSenha'])) echo 'is-invalid' ?>" />
        <?php if(isset($erros) && !empty($erros['confirmarSenha'])) : ?>
        <div class="invalid-feedback"><?= $erros['confirmarSenha'] ?></div>
        <?php endif; ?>
    </div>
    <button typ="submit">Enviar</button>
    
    
    </form>
    
    
    </div>





    </main>
    
</body>
</html>