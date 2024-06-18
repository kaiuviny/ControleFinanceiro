
    <?php 
    $link = mysqli_connect("127.0.0.1", "root", "", "controlefinanceiro", "33306") or die (mysqli_error($link));
    /*echo "<br />Nome digitado: " . $_POST['nome'];
    echo "<br />Email digitada: " . $_POST['email'];
    echo "<br />Duvida digitada: " . $_POST['duvida'];*/

    $query = "INSERT INTO 
                `fale_conosco` 
                (`nome`, `email`, `duvida`) 
             VALUES ('".$_POST['nome']."', '".$_POST['email']."', '".$_POST['duvida']."');";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    if($result == true){
        echo "<h2>Cadastrado com sucesso!</h2>";
    }
    else{
        echo "<h2>Erro ao cadastrar</h2>";
    }
    
    ?>


