<?php

require_once '../vendor/autoload.php';

error_reporting(E_ALL);

// create twig instance

$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

// register extension

$extension = new \RauweBieten\TwigPhpRef\Extension(true);
$twig->addExtension($extension);

// render a template

echo $twig->render('hello-world.html.twig',[
    'user' => [
        'firstname' => 'Homer',
        'lastname' => 'Simpson',
        'is_father' => true,
        'num_children' => 3
    ]
]);