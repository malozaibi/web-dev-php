<?php

function my_autoloader($class)
{
    include 'src/' . $class . '.php';
}

// Register the autoload function
spl_autoload_register('my_autoloader');
