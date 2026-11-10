<?php
// Redireciona para index.html preservando query string (ex: ?ref=10)
// Sem isso, o parâmetro de indicação era perdido antes do JS capturá-lo.
$qs = !empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
if ($qs) {
    header("Location: /" . $qs);
    exit;
}
// Sem parâmetros: serve index.html diretamente para evitar loop
if (file_exists(__DIR__ . '/index.html')) {
    include __DIR__ . '/index.html';
    exit;
}
header("Location: /");
exit;