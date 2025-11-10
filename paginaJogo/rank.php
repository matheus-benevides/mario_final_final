<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking - Crossverse XYZ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<style>
    body {
        background: var(--corFundo);
        width: 100%;
        min-height: 100vh;
        color: var(--corTexto);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .btn-voltar-container {
        margin-top: 2rem;
        text-align: center;
    }

    .btn-voltar {
        display: inline-block;
        padding: 10px 30px;
        font-size: 1rem;
        font-family: "Pixelify Sans", sans-serif;
        text-decoration: none;
        color: var(--corTexto);
        background-color: var(--corLinks);
        border: var(--padraoBorda) var(--corDestaque);
        border-radius: var(--arredondamento);
        cursor: pointer;
    }

    .btn-voltar:hover {
        background-color: var(--corDestaque);
        transform: scale(1.05);
    }
</style>

<body>

    <section class="caixa-rank" id="ranking">
        <h2>🏆 Rank TOP 10 🏆</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 15%;">Posição</th>
                    <th>Jogador</th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclui o arquivo de conexão
                require '../_php/conectar.php';

                // Busca o Top 10 do ranking
                $sql = "SELECT name, score FROM Rank ORDER BY score DESC LIMIT 10";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $posicao = 1;
                    $medalhas = ['🥇', '🥈', '🥉']; // Medalhas para o Top 3
                
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Define a medalha ou a posição normal
                        $display_posicao = ($posicao <= 3) ? '<span class="medal">' . $medalhas[$posicao - 1] . '</span>' : $posicao . 'º';

                        echo "<tr>";
                        echo "<td>" . $display_posicao . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . number_format($row['score'], 0, ',', '.') . "</td>"; // Formata os pontos
                        echo "</tr>";
                        $posicao++;
                    }
                } else {
                    // Mensagem para quando a tabela está vazia
                    echo '<tr><td colspan="3">Nenhum recorde encontrado. Jogue para ser o primeiro!</td></tr>';
                }

                // Fecha a conexão
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <div class="btn-voltar-container">
            <a href="index.html" class="btn-voltar">Voltar ao Jogo</a>
        </div>
    </section>

</body>

</html>