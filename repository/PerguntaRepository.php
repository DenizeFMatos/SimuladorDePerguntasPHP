<?php
include "./repository/conexao.php";


class PerguntaRepository
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserePergunta($pergunta)
    {
        $query = "INSERT INTO perguntas (pergunta) VALUES ('$pergunta')";
        mysqli_query($this->conexao, $query);
    }

    public function listaPerguntasAleatorias()
    {
        $query = "select id, pergunta from perguntas order by rand() limit 10";
        $perguntas = mysqli_query($this->conexao, $query);
        $rows = [];
        while ($row = $perguntas->fetch_row()) {
            $rows[] = (object) [
                'id' => $row['0'],
                'pergunta' => $row['1'],
            ];
        }
        return $rows;
    }


    public function listaPerguntasPorIds($ids)
    {
        $query = "select id, pergunta from perguntas where id in (" . $ids . ") limit 10";
        $perguntas = mysqli_query($this->conexao, $query);
        $rows = [];
        while ($row = $perguntas->fetch_row()) {
            $rows[] = (object) [
                'id' => $row['0'],
                'pergunta' => $row['1'],
            ];
        }
        return $rows;
    }

    public function listaPerguntas()
    {
        $query = "select id, pergunta from perguntas order by pergunta";
        $perguntas = mysqli_query($this->conexao, $query);
        $rows = [];
        while ($row = $perguntas->fetch_row()) {
            $rows[] = (object) [
                'id' => $row['0'],
                'pergunta' => $row['1'],
            ];
        }
        return $rows;
    }
}