<?php
function load(array $data)
{
    $inc = $_GET['inc'] ?? 'home';

    $patch = BASE . '/app/views/' . $inc . '.php';

    if (!file_exists($patch)) {

        if (ENVIRONMENT === 'development') {
            var_dump("Página {$inc} não encontrada.");
        } else {
            require BASE . '/app/views/404.php';
        }
    } else {
        extract($data);

        require $patch;
    }
}
