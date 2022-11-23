<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova Desenvolvimento para Servidores</title>
    <link rel="stylesheet" href="./css/perguntas.css">
</head>

<body>

    <form action="./perguntas.php" method="post">
        <h3>Insira sua Pergunta</h3>
        <input type="text" name="pergunta" />
        <br>
        <br>
        <button type="submit" class="button">Salvar</button>
        <a href="." class="button">Voltar</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Perguntas Cadastradas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "./repository/conexao.php";
            include "./repository/PerguntaRepository.php";

            $perguntaRepository = new PerguntaRepository($conexao);

            if (isset($_POST) && !empty($_POST)) {
                $pergunta = $_POST['pergunta'];
                $perguntaRepository->inserePergunta($pergunta);
            }
            $perguntas = $perguntaRepository->listaPerguntas();
            foreach ($perguntas as $pergunta) {

                echo "<tr style='border: 1px solid black'>";
                echo "<td width='100px'>" . $pergunta->id . "</td>";
                echo "<td>" . $pergunta->pergunta . "</td>";
                echo "<td width='250px'> <a href='./alternativas.php?pergunta_id=" . $pergunta->id . "'>Alternativas</a> </td>";
                echo "<td> <button type='submit' id='delete' class='deletar button'>Excluir</button> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
    <script src="./js/perguntas.js"></script>
</body>

</html>