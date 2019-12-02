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

    $produtosJson = file_get_contents('./includes/produtos.json');
    $arrayProdutos = json_decode($produtosJson, true);
    $novoProduto = [
        'nome' => $_POST['nome'],			
        'descricao' => $_POST['descricao'],			
        'preco' => $_POST['preco'],			
        'foto' => $nomeFoto	
    ];

    $arrayProdutos[] = $novoProduto;
    $novosProdutos = json_encode($arrayProdutos);
    $salvou = file_put_contents('./includes/produtos.json', $novosProdutos);
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

<table>
       <thead>
           <tr>
           
               <td>Nome</td>
               <td>descrição</td>
               <td>Preço</td>
               <td>Ações</td>
               
           </tr>
       </thead>
       <tbody>

           <?php foreach ($arrayProdutos as $produtos) : ?>
               
                   <tr>
                   
                   
                   <td ><?= $produtos['nome'] ?> </td>
                   <td><?= $produtos['descricao'] ?> </td>
                   <td><?= $produtos['preco'] ?> </td>
                   <td> 
                   <a style="width:120px; text-align: center" href="editProduto.php" class="btn btn-info w-20">Editar</a> 
                   <a style="width:120px; text-align: center" href="showProduto.php" class="btn btn-danger w-20">Excluir</a> 
                   
                   
                   
                   </td>
                   
                                         
                   </tr>               
          
           <?php endforeach; ?>
 
          
       </tbody>
   </table>
    
    
</body>
</html>