<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5dc4c78d47e84c41f8e5e9e4ec8e4f36
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit5dc4c78d47e84c41f8e5e9e4ec8e4f36', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit5dc4c78d47e84c41f8e5e9e4ec8e4f36', 'loadClassLoader'));

        $includePaths = require __DIR__ . '/include_paths.php';
        array_push($includePaths, get_include_path());
        set_include_path(join(PATH_SEPARATOR, $includePaths));

        $map = require __DIR__ . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->set($namespace, $path);
        }

        $map = require __DIR__ . '/autoload_psr4.php';
        foreach ($map as $namespace => $path) {
            $loader->setPsr4($namespace, $path);
        }

        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        $includeFiles = require __DIR__ . '/autoload_files.php';
        foreach ($includeFiles as $file) {
            composerRequire5dc4c78d47e84c41f8e5e9e4ec8e4f36($file);
        }

        return $loader;
    }
}

function composerRequire5dc4c78d47e84c41f8e5e9e4ec8e4f36($file)
{
    require $file;
}
