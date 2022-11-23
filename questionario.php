<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova Desenvolvimento para Servidores</title>
    <link rel="stylesheet" href="./css/questionario.css">
</head>

<body>

    <?php include "./header.php"; ?>
    <?php include "./repository/conexao.php"; ?>
    <?php include "./repository/perguntaRepository.php"; ?>
    <?php include "./repository/AlternativaRepository.php"; ?>
    <?php
    $perguntaRepository = new PerguntaRepository($conexao);
    $alternativaRepository = new AlternativaRepository($conexao);

    $perguntas = $perguntaRepository->listaPerguntasAleatorias();
    foreach ($perguntas as $pergunta) {
        $alternativas = $alternativaRepository->buscaAlternativasDePergunta($pergunta->id);
        $pergunta->alternativas = $alternativas;
    }

    ?>
    <form action="questionario.php" method="post">
        <ul>
            <?php
            $resposta = 0;

            foreach ($perguntas as $pergunta) {
                if (isset($_POST) && !empty($_POST)) {
                    $resposta = $_POST['pergunta-' . $pergunta->id];
                }

                echo '<li class="pergunta">';

                echo "<h3 class='titulo'>";
                echo $pergunta->pergunta;
                echo "</h3>";

                if ($resposta == 0) {

                    echo '<ol class="alternativas">';
                } else {
                    echo '<ol class="alternativas respondido" >';
                }
                foreach ($pergunta->alternativas as $alternativa) {
                    $classe = "alternativa";
                    $marcado = $resposta == $alternativa->id;

                    if ($marcado) {
                        if ($alternativa->correta == "1") {
                            $classe = $classe . " alternativa-correta";
                        } else {
                            $classe = $classe . " alternativa-incorreta";
                        }
                    } else if ($alternativa->correta == "1" && $resposta != 0) {
                        $classe = $classe . " alternativa-correta";
                    }

                    echo '<li class="' . $classe . '">';
                    $input = '<input type="radio" id="' . $alternativa->id . '" name="pergunta-' . $pergunta->id . '" value="' . $alternativa->id . '"';

                    if ($marcado) {
                        $input = $input . ' checked';
                    }
                    if ($resposta != 0) {
                        $input = $input . ' disabled';
                    }
                    echo $input . '/>';

                    echo '<label for="' . $alternativa->id . '">';
                    echo $alternativa->texto;
                    echo '</label>';
                    echo '</li>';
                }
                echo '</ol>';

                echo "</li>";
            }
            ?>
        </ul>
        <?php
        if ($resposta == 0) {

            echo '<button id="enviar" disabled class="button" type="submit">Enviar Respostas</button>';
        } else
            echo '<a href="." class="button">Voltar</a>';
        ?>
    </form>
</body>
<script src="./js/questionario.js"></script>

</html>