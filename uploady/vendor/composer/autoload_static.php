<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5945ad3276d7348e01910cc39dd50b7b
{
    public static $files = array (
        '9b38cf48e83f5d8f60375221cd213eee' => __DIR__ . '/..' . '/phpstan/phpstan/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Uploady\\' => 8,
        ),
        'R' => 
        array (
            'RobThree\\Auth\\' => 14,
            'ReCaptcha\\' => 10,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Farisc0de\\PhpMigration\\' => 23,
            'Farisc0de\\PhpFileUploading\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Uploady\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Uploady',
        ),
        'RobThree\\Auth\\' => 
        array (
            0 => __DIR__ . '/..' . '/robthree/twofactorauth/lib',
        ),
        'ReCaptcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/google/recaptcha/src/ReCaptcha',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Farisc0de\\PhpMigration\\' => 
        array (
            0 => __DIR__ . '/..' . '/farisc0de/phpmigration/src',
        ),
        'Farisc0de\\PhpFileUploading\\' => 
        array (
            0 => __DIR__ . '/..' . '/farisc0de/phpfileuploading/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Wolfcast\\BrowserDetection' => __DIR__ . '/..' . '/wolfcast/browser-detection/lib/BrowserDetection.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5945ad3276d7348e01910cc39dd50b7b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5945ad3276d7348e01910cc39dd50b7b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5945ad3276d7348e01910cc39dd50b7b::$classMap;

        }, null, ClassLoader::class);
    }
}
