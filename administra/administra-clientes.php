<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração da Loja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    $operacao = $_POST["operacao"];
    include "..\administra\conexao.php";
    if ($operacao=="incluir")
    { if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cpf = $_POST["cpf"];
        $sql = ("INSERT INTO clientes (nome, endereco, cpf) VALUES ('$nome', '$endereco', '$cpf')"); 
        $resultado = $mysqli->query ($sql);
        if($resultado){
            echo "Produto incluído com sucesso!";
        }else{
            echo "Erro na inserção: " . $mysqli->error;
        }
    }else{
        echo "ERROR.-.";
    }
     
       
    }
    elseif ($operacao=="excluir")
    {
        $nome = $_POST["nome"];
        $sql = ("DELETE FROM clientes WHERE nome = '$nome'");
        $resultado = $mysqli->query($sql);
        $linhas = mysqli_affected_rows($mysqli);
        if($linhas==1)
        { echo "Produto excluído com sucesso!"; }
        else
        { echo "Produto não encontrado!"; }
    }
    elseif($operacao=="mostrar")
    {
        $busca_clientes = ("SELECT * FROM clientes ");
        $resultado = $mysqli->query ($busca_clientes);
        $linhas = mysqli_num_rows ($resultado);
        echo "<p><b>Lista de clientes da loja</b></p>";
        for ($i=0 ; $i<$linhas ; $i++)
        {
            $reg = mysqli_fetch_row($resultado);
            echo "
                <div class='div_table_produtos'>
                    <table>
                            $reg[0]<br>
                            $reg[1]<br>
                            $reg[2]<br>
                            $reg[3]<br>  
                    </table>
                </div>";
        }
    }
    mysqli_close($mysqli);
?>

</body>
</html>