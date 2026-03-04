<?php

include_once BASE . '/app/functions/cart.php';
require_once BASE . '/app/functions/mail.php';
include_once BASE . '/app/functions/redirect.php';

$inc = $_REQUEST['inc'] ?? 'home';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    return require BASE . '/app/controllers/get.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    return require BASE . '/app/controllers/post.php';
}
