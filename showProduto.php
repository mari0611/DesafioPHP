<?php

if ($_POST) {

if ($_FILES['foto']['error'] == 0) {
    $nomeFoto = $_FILES['foto']['name'];
    $caminhoTmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file(
        $caminhoTmp, 
        './assets/img/' . $nomeFoto
    );

}
}

if ($_POST) {

$produtosJson = file_get_contents('./includes/produtos.json');
$arrayProdutos = json_decode($produtosJson, true);

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
    
    <img src="<?= $arrayProdutos['foto'] ?>" class="card-img-top" alt="...">
        <div>
          <h5 class="card-title"><?= $arrayProdutos['nome'] ?></h5>
          <p class="card-text"><?= $arrayProdutos['descricao'] ?></p>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
            <a href="indexProdutos.php" class="btn btn-secondary w-25">Voltar</a>
            <button type="submit" class="btn btn-danger" >Excluir</button>
          </form>
        </div>

      </div>
  
</main>
    
</body>
</html>