<?php
// Verifica se os dados da tabela foram recebidos
if (isset($_POST['tableData'])) {
    // Obtém os dados da tabela do corpo da requisição POST
    $tableData = json_decode($_POST['tableData'], true);

    // Conecta ao banco de dados (ajuste as configurações conforme necessário)
    include "conn.php";

    // Itera sobre os dados da tabela e executa a inserção no banco de dados
    foreach ($tableData as $rowData) {
        $numNota = $rowData[2];
        $dataCompra = $rowData[3];
        $fornecedor = $rowData[4];
        $fornecedorCnpj = $rowData[5];
        $itemProduto = $rowData[0];
        $codProduto = $rowData[1];
        $descProduto = $rowData[6];
        $unProduto = $rowData[7];
        $valUniProduto = $rowData[8];
        $quantProduto = $rowData[9];
        $aliqNfOrigemProduto = $rowData[10];
        $valorIcmsOrigem = $rowData[11];
        $valorIcmsPara = $rowData[12];
        $valorAPagarDifIcms = $rowData[13];
        $custoTransporte = $rowData[14];
        $custoTotalProduto = $rowData[15];

        // verificando se há duplicidade de produto cadastrado
        $sql_check = "SELECT * FROM tab_produtos WHERE COD_PRODUTO = '$codProduto'";
        $result_check = $conn->query($sql_check);
    
        if ($result_check->num_rows > 0) {
            // Registro já existe, então você pode atualizar em vez de inserir
            // ... Código de atualização aqui ...
            echo "Registro já existe, então você pode atualizar em vez de inserir";
        } else {
            // Registro não existe, proceda com a inserção
            // ... Código de inserção aqui ...

            // Query SQL de inserção (ajuste de acordo com sua tabela)
            $sql = "INSERT INTO tab_produtos (NUM_NOTA_FISCAL_ORIGEM, DATA_COMPRA, FORNECEDOR, CNPJ_FORNECEDOR, ITEM_PRODUTO, COD_PRODUTO, DESC_PRODUTO, UN_PRODUTO, VAL_UNI_PRODUTO, QUANT_PRODUTO, ALIQ_NF_ORIGEM_PRODUTO, VALOR_ICMS_ORIGEM, VALOR_ICMS_PARA, CUSTO_TOTAL_PRODUTO, CUSTO_TRANSPORTE, VALOR_A_PAGAR_DIF_ICMS) 
            VALUES ('$numNota', '$dataCompra', '$fornecedor', '$fornecedorCnpj', '$itemProduto', '$codProduto', '$descProduto', '$unProduto', '$valUniProduto', '$quantProduto', '$aliqNfOrigemProduto', '$valorIcmsOrigem', '$valorIcmsPara', '$valorAPagarDifIcms', '$custoTransporte', '$custoTotalProduto')";

            // Executa a query
            $result = $conn->query($sql);

            // Verifica se a inserção foi bem-sucedida
            if (!$result) {
                echo "Erro na inserção: " . $conn->error;
            }
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Se os dados da tabela não foram recebidos, emite uma mensagem de erro
    echo "Dados da tabela não recebidos.";
}
?>
