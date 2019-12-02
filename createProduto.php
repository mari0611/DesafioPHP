
<?php 

include('./includes/dbc.php');

if ($_POST) {
    $nome = $_POST['nome'];
    $descrição = $_POST['descricao'];
    $preço = $_POST['preco'];
    
   

    $conexao = mysql_connect($dbc);

    $banco = mysql_select_db($dbname,$conexao);
    
    $query = "INSERT INTO produtos (nome, descrição, preço) VALUES ('$nome','$descrição', '$preço')";
    $insert = mysql_query($query,$conexao);
    
    if($insert){
    echo"Produto cadastrado com sucesso!";
    }else{
    echo"Não foi possível cadastrar esse produto";
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

    <div class="container form-group" >

    <form action="indexProdutos.php" method="POST" enctype="multipart/form-data">
    Nome do produto: <input type="text" name="nome" class="form-control <?php if (!$ok_nome) {echo ('is-invalid');}?>"
               placeholder="Nome">
               
       </div>

    <div class="container form-group" >

        Descrição: <textarea name="descricao" id="" cols="20" rows="5"></textarea> <br>
        Preço: <input type="text" name="preco" placeholder="R$" required> <br>

        

        Envie a foto do produto: <input type="file" name="foto">

        

    <button type="submit" class="btn btn-primary w-25 mt-3">CADASTRAR</button>

   
    
    </form>
    
    
    </div>
    
</body>
</html>