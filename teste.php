
    <?php 
    $link = mysqli_connect("127.0.0.1", "root", "", "controle_financeiro", "33306") or die (mysqli_error($link));
    $query = "SELECT * FROM months;";
    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    while($dados = mysqli_fetch_array($result)){
        echo $dados['month_name'];
    }

    ?>


