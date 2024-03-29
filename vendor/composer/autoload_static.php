<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3eeee65fe4442d1f263155fa8688ea12
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Felix\\MyFirstPhpProject\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Felix\\MyFirstPhpProject\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3eeee65fe4442d1f263155fa8688ea12::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3eeee65fe4442d1f263155fa8688ea12::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3eeee65fe4442d1f263155fa8688ea12::$classMap;

        }, null, ClassLoader::class);
    }
}
