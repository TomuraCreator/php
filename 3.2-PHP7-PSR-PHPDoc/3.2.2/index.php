<?php
/**
 * frontfile of menu
 *
 * @var array $menu
 * @var array $post
 */

require 'const.php';
require 'loadJSON.php';
require 'renderView.php';
$menu = loadJSON('menu');
renderView('default', 'main', ['menu' => $menu]);