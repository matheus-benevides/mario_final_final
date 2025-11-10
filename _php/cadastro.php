    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'crossverse_db';
    $port = 3312;

    $conn = mysqli_connect($host, $user, $password, $database, $port);

    $nome = $_POST['nome'];
    $convAluno = $_POST['conv/aluno'];
    $turma = $_POST['turma'];
    $telefone = $_POST['telefone'];

    if ($turma == null) {
        $turma = "SEM TURMA";
    }
    if ($telefone == null) {
        $telefone = "SEM TELEFONE";
    }

    $inserindo = "INSERT INTO jogador_aluno(
            jogador_nome,
            jogador_tipo,
            jogador_turma,
            jogador_telefone
        )VALUES(
            '$nome',
            '$convAluno',
            '$turma',
            '$telefone'
        );";

    mysqli_query($conn,$inserindo);
    mysqli_close($conn);
    header('Location: ../index.php');
    ?>