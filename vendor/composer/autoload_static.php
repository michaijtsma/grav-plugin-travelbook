<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06434a36419ab390d50b70fad2e2fc93
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Grav\\Plugin\\DirGallery\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Grav\\Plugin\\DirGallery\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Grav\\Plugin\\TravelbookPlugin' => __DIR__ . '/../..' . '/travelbook.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit06434a36419ab390d50b70fad2e2fc93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit06434a36419ab390d50b70fad2e2fc93::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit06434a36419ab390d50b70fad2e2fc93::$classMap;

        }, null, ClassLoader::class);
    }
}
