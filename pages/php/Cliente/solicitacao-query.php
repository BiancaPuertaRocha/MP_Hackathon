<?php
    include_once("pages/php/connectDB.php");
    $codigoCliente = $_SESSION['codigo']; // ID Auto Increment
    $sql = "SELECT * from solicitacao where hospede = $codigoCliente;";
    $conn->set_charset("utf8");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nomeTipo = "";
            $imgName = "default-50x50.gif";
            if($row['tipo'] == 1)
                $nomeTipo = "Elétrico";

            if($row['situacao'] == 0)
                $imgName = "clock-icon.png";
            else if($row['situacao'] == 1)
                $imgName = "tools-icon.png";
            else if($row['situacao'] == 2)
                $imgName = "correct-icon.png";
            
            echo '<li class="item">
            <div class="product-img">
            <img src="dist/img/'.$imgName.'" alt="Product Image">
            </div>
            <div class="product-info">
            <a href="javascript:void(0)" class="product-title">';
            echo $nomeTipo." - ".$row['localidade'];
            echo '<span class="label label-warning pull-right">'.$row['horariosol'].'</span>';
            echo '<span class="label label-success pull-right">'.$row['horarioresp'].'</span></a>';
            echo '<span class="product-description">
            '.$row['descricao'].'
                </span></div></li>';
        }
    } else {
        
    }
?>