<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c2a3f96143293bb4db673b95b585709
{
    public static $files = array (
        'e471bf351add62873bc0289ccd6a937f' => __DIR__ . '/..' . '/league/plates/src/Template/match.php',
        '152c98af9456eeb8f53697d6a7dfd689' => __DIR__ . '/..' . '/league/plates/src/Extension/Data/data.php',
        'e20239a76b73b9912f51f0005956d1db' => __DIR__ . '/..' . '/league/plates/src/Extension/Path/path.php',
        'd513f8e004e152493580ca1917e308ba' => __DIR__ . '/..' . '/league/plates/src/Extension/RenderContext/func.php',
        '27980683f1626a3fd1405d27b171c0fe' => __DIR__ . '/..' . '/league/plates/src/Extension/RenderContext/render-context.php',
        'bdc465a053da7f7ddb072631f6d41d45' => __DIR__ . '/..' . '/league/plates/src/Extension/LayoutSections/layout-sections.php',
        'afa76803f24616d7599be3b7b0846adc' => __DIR__ . '/..' . '/league/plates/src/Extension/Folders/folders.php',
        '16c5be35e32c6cf916d875518b909210' => __DIR__ . '/..' . '/league/plates/src/Util/util.php',
        '55fb336536ae5bc31a7b01dce8d1b0c7' => __DIR__ . '/../..' . '/source/Support/Config.php',
        'aca327319da60b4dfe47e4ecc58b9ec7' => __DIR__ . '/../..' . '/source/Support/Helpers.php',
        'e86c975ba76d39ec5e93cb856cf95239' => __DIR__ . '/../..' . '/source/Support/MInify.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'C' => 
        array (
            'CoffeeCode\\Router\\' => 18,
            'CoffeeCode\\Paginator\\' => 21,
            'CoffeeCode\\Optimizer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
        'CoffeeCode\\Paginator\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/paginator/src',
        ),
        'CoffeeCode\\Optimizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/optimizer/src',
        ),
    );

    public static $classMap = array (
        'CSSTest' => __DIR__ . '/..' . '/matthiasmullie/minify/tests/CSSTest.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'JSTest' => __DIR__ . '/..' . '/matthiasmullie/minify/tests/JSTest.php',
        'MatthiasMullie\\Minify\\CSS' => __DIR__ . '/..' . '/matthiasmullie/minify/CSS.php',
        'MatthiasMullie\\Minify\\Exception' => __DIR__ . '/..' . '/matthiasmullie/minify/Exception.php',
        'MatthiasMullie\\Minify\\JS' => __DIR__ . '/..' . '/matthiasmullie/minify/JS.php',
        'MatthiasMullie\\Minify\\Minify' => __DIR__ . '/..' . '/matthiasmullie/minify/Minify.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c2a3f96143293bb4db673b95b585709::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c2a3f96143293bb4db673b95b585709::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c2a3f96143293bb4db673b95b585709::$classMap;

        }, null, ClassLoader::class);
    }
}
