<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require 'block.php';

if (isset($_POST['materias'])) {

    require_once 'dbConnect.php';
    $materias = preg_replace("/[^0-9]/", "", $_POST['materias']);
    $numQuestoes = preg_replace("/[^0-9]/", "", $_POST['numQuestoes']);

    $idDisciplinaList = "";

    $N = count($materias);

    for ($i = 0; $i < $N; $i++) {
        $idDisciplinaList = $idDisciplinaList . $materias[$i];
        if ($i < $N - 1) {
            $idDisciplinaList = $idDisciplinaList . ",";
        }
    }
    $query = "SELECT idQuestao FROM questoes WHERE idDisciplina IN ($idDisciplinaList) AND cpf = '$cpf'";


    $sqlResult = mysqli_query($dbConnection, $query);

    while ($row = mysqli_fetch_array($sqlResult)) {

        $idQuestoes[] = intval($row['idQuestao']);
    }

    if (count($idQuestoes) >= $numQuestoes) {

        shuffle($idQuestoes);

        $query = "INSERT INTO `provas` (`idProva`, `cpf`) VALUES (NULL, '$cpf');";
        $sqlResult = mysqli_query($dbConnection, $query);

        if ($sqlResult) {
            $ultimoId = mysqli_insert_id($dbConnection);

            $valuesArgument = "";
            
            for ($index = 0; $index < $numQuestoes; $index++) {
                $valuesArgument .= "('". $ultimoId ."', '". $idQuestoes[$index]. "')";
                if ($index < $numQuestoes - 1) {
                    $valuesArgument .= ",";
                }
            }
            
            $sqlStr = "INSERT INTO `provas_questoes` (`idProva`, `idQuestao`) VALUES " .$valuesArgument;
            $sqlResult = mysqli_query($dbConnection, $sqlStr);
            
            if (!$sqlResult) {
                die("Erro ao inserir questões na prova :" . mysqli_errno($dbConnection));
            } else {
                echo "<script> alert('Sua prova foi criada!'); window.history.back();</script>";
            }
        }
    } else {
        echo "<script> alert('Não existem questões suficientes cadastradas para esta prova.'); window.history.back();</script>";
    }

    mysqli_free_result($sqlResult);
    mysqli_close($dbConnection);
} else {
    echo "<script> alert('Você deve selecionar pelo menos uma matéria');</script>";
}
