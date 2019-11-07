
<?php

$erro_nome = false;
$erro_descricao = false;
$erro_preco = false;
$erro_foto = false;





if($_POST) {

    if (!is_numeric($_POST['preco'])) {
            
        $erro_preco = 'O campo deve ser numérico';
    
    }
    
    if($_POST['nome']) {
        $erro_nome = false;
    } else {
        $erro_nome = true;
    }
    
    if($_FILES['foto']['name']) {
        $erro_foto = false;
    } else {
        $erro_foto = true;
    }
    
    
    
        $novoProduto = [
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'preco' => $_POST['preco'],
            'foto' => $_FILES['foto'],
        ];
    
        $produtoCadastrado[] = $novoProduto;
    
        $cadastroFinal = json_encode($produtoCadastrado);
    
        file_put_contents('./includes/produtos.json', $cadastroFinal);
    
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

    <div class="container form-group" >

    <form action="indexProdutos.php" method="POST" enctype="multipart/form-data">
    Nome do produto: <input type="text" name="nome"> <br>
    <?php if($erro_nome) : ?>
       <div class="alert alert-danger mt-2">Informe o nome do produto</div>
       <?php endif ?>

    Descrição: <textarea name="descricao" id="" cols="20" rows="5"></textarea> <br>
    Preço: <input type="text" name="preco" placeholder="R$" required> <br>

    <?php if($erro_preco) : ?>
       <div class="alert alert-danger mt-2">O campo deve ser numérico</div>
       <?php endif ?> <br>

    Envie a foto do produto: <input type="file" name="foto">

    <?php if($erro_foto) : ?>
       <div class="alert alert-danger mt-2">A foto é obrigatória</div>
       <?php endif ?> <br>


    <button type="submit" class="btn btn-primary w-25 mt-3">CADASTRAR</button>

   
    
    </form>
    
    
    </div>
    
</body>
</html>