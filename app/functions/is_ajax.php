<?php 
function is_ajax()
{
    return isset($_SERVER['X-Requested-With']) and $_SERVER['X-Requested-With'] === 'XMLHttpRequest';
}