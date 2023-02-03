<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1001a3010f6e83160a06d8995e37bf66
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Deljdlx\\WPForge\\Plugin\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Deljdlx\\WPForge\\Plugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1001a3010f6e83160a06d8995e37bf66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1001a3010f6e83160a06d8995e37bf66::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1001a3010f6e83160a06d8995e37bf66::$classMap;

        }, null, ClassLoader::class);
    }
}
