<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita88d269bcc755c7d43c0e0e36f5200d1
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

        spl_autoload_register(array('ComposerAutoloaderInita88d269bcc755c7d43c0e0e36f5200d1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita88d269bcc755c7d43c0e0e36f5200d1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita88d269bcc755c7d43c0e0e36f5200d1::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
