<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b22fc1b352539887d78c51c69cb338d
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Geometry\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Geometry\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Geometry',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b22fc1b352539887d78c51c69cb338d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b22fc1b352539887d78c51c69cb338d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7b22fc1b352539887d78c51c69cb338d::$classMap;

        }, null, ClassLoader::class);
    }
}
