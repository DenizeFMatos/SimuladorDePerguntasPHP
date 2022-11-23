<?php
include "./repository/conexao.php";

class AlternativaRepository
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insereAlternativas(
        $pergunta_id,
        $alternativa1,
        $alternativa2,
        $alternativa3,
        $alternativa4,
        $alternativa5,
        $correta1,
        $correta2,
        $correta3,
        $correta4,
        $correta5
    ) {
        $query = "insert into alternativas(alternativa, pergunta_id, correta)values";
        $valores1 = "('$alternativa1',$pergunta_id, $correta1)";
        $valores2 = "('$alternativa2',$pergunta_id, $correta2)";
        $valores3 = "('$alternativa3',$pergunta_id, $correta3)";
        $valores4 = "('$alternativa4',$pergunta_id, $correta4)";
        $valores5 = "('$alternativa5',$pergunta_id, $correta5)";
        $query = $query . $valores1 . "," . $valores2 . "," . $valores3 . "," . $valores4 . "," . $valores5;

        mysqli_query($this->conexao, $query);
    }

    public function buscaAlternativasDePergunta($pergunta_id)
    {
        $query = "select id, alternativa, correta from alternativas where pergunta_id = " . $pergunta_id;
        $resultadoAlternativas = mysqli_query($this->conexao, $query);
        $rows = [];
        while ($row = $resultadoAlternativas->fetch_row()) {
            $rows[] = (object) [
                'id' => $row['0'],
                'texto' => $row['1'],
                'correta' => $row['2'],
            ];
        }
        return $rows;
    }
}