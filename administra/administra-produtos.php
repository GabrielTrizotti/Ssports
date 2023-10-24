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

        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];
        $peso = $_POST["peso"];
        //INSERT INTO usuarios (nome, email, grupo, setor, data_create) VALUES ('$nome', '$email', '$grupo','$setor', NOW())" exemplo de insert
        $sql = ("INSERT INTO produtos (codigo, nome, descricao, preco, peso) VALUES ('$codigo', '$nome', '$descricao', '$preco', '$peso')"); 
        $resultado = $mysqli->query ($sql);
        if($resultado){
            echo "Produto incluído com sucesso!";
        }else{
            echo "Erro na inserção: " . $mysqli->error;
        }
    }else{
        echo "Deu pau!";
    }
     
       
    }
    elseif ($operacao=="excluir")
    {
        $codigo = $_POST["codigo"];
        $sql = ("DELETE FROM produtos WHERE codigo = '$codigo'");
        $resultado = $mysqli->query($sql);
        $linhas = mysqli_affected_rows($mysqli);
        if($linhas==1)
        { echo "Produto excluído com sucesso!"; }
        else
        { echo "Produto não encontrado!"; }
    }
    elseif($operacao=="mostrar")
    {
        $busca_produtos = ("SELECT * FROM produtos ");
        $resultado = $mysqli->query ($busca_produtos);
        $linhas = mysqli_num_rows ($resultado);
        echo "<p><b>Lista de produtos da loja</b></p>";
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
                            $reg[4]<br> 
                            $reg[5]<br>  
                    </table>
                </div>";
        }
    }
    mysqli_close($mysqli);
?>

</body>
</html>