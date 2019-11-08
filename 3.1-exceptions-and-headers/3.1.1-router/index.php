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

try {
    $router->isAvailableLink($site);
    echo "вы перешли на сайт $site";
} catch (EmptyDate $e){
    header('Location: errors/error.php');
} catch (NotPage $e) {
    header('Location: errors/404page.php?name='. $e->getMessage());
}
