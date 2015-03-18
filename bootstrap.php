<?php
/*
 * This file is part of the namshiApi package.
 *
 * (c) mauromurru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Created: 18/03/15 21:29
 */

require_once __DIR__.'/vendor/symfony/class-loader/Symfony/Component/ClassLoader/Psr4ClassLoader.php';

use Symfony\Component\ClassLoader\Psr4ClassLoader;

$loader = new Psr4ClassLoader();


$loader->addPrefix('brainrepo\\namshiApp', __DIR__."/src");

$loader->register();
