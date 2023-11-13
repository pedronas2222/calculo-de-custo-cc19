<?php
// salvarProd.php

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do POST
    $jsonInvoiceData = $_POST['invoiceData'];

    // Converte os dados JSON para um array associativo
    $invoiceData = json_decode($jsonInvoiceData, true);

    // Agora você pode usar $invoiceData como um array associativo normal
    // Exemplo de uso: $invoiceNumber = $invoiceData['nfeProc']['NFe']['infNFe']['ide']['nNF'];

    // Conecte ao seu banco de dados e insira os dados, ajuste conforme necessário
    include "conn.php";

    // Exemplo de inserção no banco de dados, ajuste conforme necessário
    $sql = "INSERT INTO sua_tabela (NUM_NOTA_FISCAL_ORIGEM, DATA_COMPRA, FORNECEDOR, ITEM_PRODUTO, COD_PRODUTO, DESC_PRODUTO, UN_PRODUTO, VAL_UNI_PRODUTO, QUANT_PRODUTO, ALIQ_NF_ORIGEM_PRODUTO, VALOR_ICMS_ORIGEM, VALOR_ICMS_PARA, VALOR_A_PAGAR_DIF_ICMS, CUSTO_TRANSPORTE, CUSTO_TOTAL_PRODUTO) 
    VALUES (
        '{$invoiceData['nfeProc']['NFe']['infNFe']['ide']['nNF']}',
        '{$invoiceData['nfeProc']['NFe']['infNFe']['ide']['dhEmi']}',
        '{$invoiceData['nfeProc']['NFe']['infNFe']['emit']['xNome']}',
        '".($index + 1)."',  // Você pode precisar ajustar isso dependendo de como deseja inserir o número do item
        '{$produto['cProd']}',
        '{$produto['xProd']}',
        '{$produto['uCom']}',
        '{$produto['vUnCom']}',
        '{$produto['qCom']}',
        '{$imposto['pICMS']}',
        '{$imposto['vICMS']}',
        '".($produto['vProd'] * 0.19)."',  // Você pode precisar ajustar isso dependendo de como deseja calcular esse valor
        '".($imposto['vICMS'] - ($produto['vProd'] * 0.19))."',  // Você pode precisar ajustar isso dependendo de como deseja calcular esse valor
        'Calcular',  // Você pode precisar ajustar isso dependendo de como deseja calcular esse valor
        'Calcular'  // Você pode precisar ajustar isso dependendo de como deseja calcular esse valor
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro na inserção de dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método não permitido.";
}
?>
