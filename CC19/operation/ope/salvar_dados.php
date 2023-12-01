<?php
// Verifica se os dados da tabela foram recebidos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o corpo da requisição como string
    $jsonData = file_get_contents("php://input");

    // Decodifica a string JSON para um array associativo
    $dadosRecebidos = json_decode($jsonData, true);

    // Verifica se a decodificação foi bem-sucedida
    if ($dadosRecebidos === null) {
        echo "Erro ao decodificar o JSON.";
    } else {
        // Agora, $dadosRecebidos contém os dados do JSON
        // Faça o que for necessário com os dados recebidos
        // var_dump($dadosRecebidos);

    // Conecta ao banco de dados (ajustar posteriormente)
    include "conn.php";

    // Itera sobre os dados do JSON e executa a inserção no banco de dados
    foreach ($dadosRecebidos as $item) {
        // Extrai os dados do item do JSON
        $totalItens = $item['i'];
        $itemProduto = $item['ITEM'];
        $codProduto = $item['CODIGO_PRODUTO'];
        $numNota = $item['NUMERO_NF'];
        $dataCompra = date('Y-m-d H:i:s', strtotime($item['DATA_EMISSAO']));
        $fornecedor = $item['NOME_FORNECEDOR'];
        $fornecedorCnpj = $item['CNPJ_FORNECEDOR'];
        $descProduto = $item['DESCRICAO_PRODUTO'];
        $unProduto = $item['UND_COMERCIAL'];
        $valUniProduto = $item['VALOR_UNITARIO'];
        $quantProduto = $item['QTD_PRODUTO'];
        $aliqNfOrigemProduto = $item['PERCENTUAL_ICMS'];
        $valorIcmsOrigem = $item['VALOR_ICMS'];
        $valorIPIOrigem = $item['VALOR_IPI'];
        // Adicione outros campos conforme necessário

        // verificando se há duplicidade de produto cadastrado
        $sql_check = "SELECT * FROM tab_produtos WHERE NUM_NOTA_FISCAL_ORIGEM = '$numNota'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > $totalItens) {
            // Registro já existe, então você pode atualizar em vez de inserir
            $retorno = json_encode("Registro já existe, então você pode atualizar o estoque ao invés de inserir um novo produto");
            var_dump($retorno);
        } else {
            // Registro não existe, proceda com a inserção
            // Query SQL de inserção (ajuste de acordo com sua tabela)
            $sql = "INSERT INTO tab_produtos (ITEM_PRODUTO, COD_PRODUTO, NUM_NOTA_FISCAL_ORIGEM, DATA_COMPRA, FORNECEDOR, CNPJ_FORNECEDOR, DESC_PRODUTO, UN_PRODUTO, VAL_UNI_PRODUTO, QUANT_PRODUTO, ALIQ_NF_ORIGEM_PRODUTO, VALOR_ICMS_ORIGEM, VALOR_IPI_ORIGEM) 
            VALUES ('$itemProduto', '$codProduto', '$numNota', '$dataCompra', '$fornecedor', '$fornecedorCnpj', '$descProduto', '$unProduto', '$valUniProduto', '$quantProduto', '$aliqNfOrigemProduto', '$valorIcmsOrigem', '$valorIPIOrigem')";

            // Executa a query
            $result = $conn->query($sql);

            // Verifica se a inserção foi bem-sucedida
            if (!$result) {
                echo "Erro na inserção: " . $conn->error;
            }
        }
    }
    }
} else {
   // Se não for uma requisição POST, emite uma mensagem de erro
   echo "Apenas requisições POST são permitidas.";
}
    // Fecha a conexão com o banco de dados
    $conn->close();

?>
