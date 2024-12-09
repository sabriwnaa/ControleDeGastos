<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5fcf46d9e5a3dbb46da5b0c2f0516c4b
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit5fcf46d9e5a3dbb46da5b0c2f0516c4b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5fcf46d9e5a3dbb46da5b0c2f0516c4b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5fcf46d9e5a3dbb46da5b0c2f0516c4b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}