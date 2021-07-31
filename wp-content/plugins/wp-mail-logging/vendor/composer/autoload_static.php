<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64bcd231a77bf5f7870b38c2e715eb2f
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'No3x\\WPML\\Tests\\Helper\\' => 23,
            'No3x\\WPML\\Tests\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'No3x\\WPML\\Tests\\Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/helper',
        ),
        'No3x\\WPML\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/phpunit/tests',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64bcd231a77bf5f7870b38c2e715eb2f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64bcd231a77bf5f7870b38c2e715eb2f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit64bcd231a77bf5f7870b38c2e715eb2f::$classMap;

        }, null, ClassLoader::class);
    }
}