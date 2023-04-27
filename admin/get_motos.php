<?php
$host = 'localhost'; // Endereço do servidor de banco de dados
$user = 'root'; // Nome de usuário do banco de dados
$password = 'automacao'; // Senha do banco de dados
$dbname = 'granncar'; // Nome do banco de dados

// Conexão com o banco de dados
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if (!$conn) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}

// Consulta para buscar o nome, id e a foto de todos os carros na tabela 'carros'
$sql = 'SELECT id, nome, imagem FROM motos';
$result = mysqli_query($conn, $sql);

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
    // Início da tabela


        echo '<a href="adicionarmoto.php" class="adicionar">Adicionar Moto</a>';

    $output = '<table class="table">';

    $output .= '<tbody>';

    // Loop para exibir os carros na tabela
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr class="carro">';
        $output .= '<td>' . $row['id'] . '</td>';
        $output .= '<td><img src="' . $row['imagem'] . '" width="80"></td>';
        $output .= '<td>' . substr($row['nome'], 0, 30) . '</td>';
        $output .= '<td><a href="editarmoto.php?id=' . $row['id'] . '" class="editar">Editar</a></td>';
        $output .= '<td><a href="excluirmoto.php?id=' . $row['id'] . '" class="excluir">Excluir</a></td>';    
        $output .= '</tr>';
    }
    

    // Fim da tabela
    $output .= '</tbody>';
    $output .= '</table>';

    // Exibe a tabela na seção 'carros-container'
    echo '<div id="motos-container">' . $output . '</div>';
} else {
    echo 'Nenhum carro encontrado.';
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
