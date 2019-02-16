<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitff7d20331bd4ae764c79bde59c2c5be5
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitff7d20331bd4ae764c79bde59c2c5be5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitff7d20331bd4ae764c79bde59c2c5be5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
