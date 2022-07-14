<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf40b378c0c86252c440c19f46a76d558
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf40b378c0c86252c440c19f46a76d558::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf40b378c0c86252c440c19f46a76d558::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf40b378c0c86252c440c19f46a76d558::$classMap;

        }, null, ClassLoader::class);
    }
}
