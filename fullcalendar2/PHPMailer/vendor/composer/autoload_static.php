<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit039cc5f55d730cfa11ee7a42862c1329
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit039cc5f55d730cfa11ee7a42862c1329::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit039cc5f55d730cfa11ee7a42862c1329::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
