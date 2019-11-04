<?php
include 'autoload.php';
/**
 * Доступные страницы на сайте
 *
 * @var array $availableLinks
 */
$availableLinks = include './availableLinks.php';

$site = $_GET['site'];

$router = new Router($availableLinks);

if ($router->isAvailableLink($site)) {
    echo "вы перешли на сайт $site";
}

