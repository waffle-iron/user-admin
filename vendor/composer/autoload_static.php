<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita1ee94dff7ada898fb73f2cb2d698bc2
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'erdiko\\users\\' => 13,
            'erdiko\\doctrine\\' => 16,
            'erdiko\\core\\' => 12,
            'erdiko\\authorize\\' => 17,
            'erdiko\\authenticate\\' => 20,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Cache\\' => 22,
            'Doctrine\\Common\\Annotations\\' => 28,
            'Doctrine\\Common\\' => 16,
        ),
        'A' => 
        array (
            'AC\\Kalinka\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'erdiko\\users\\' => 
        array (
            0 => __DIR__ . '/..' . '/erdiko/users/src',
        ),
        'erdiko\\doctrine\\' => 
        array (
            0 => __DIR__ . '/..' . '/erdiko/doctrine/src',
        ),
        'erdiko\\core\\' => 
        array (
            0 => __DIR__ . '/..' . '/erdiko/core/src',
        ),
        'erdiko\\authorize\\' => 
        array (
            0 => __DIR__ . '/..' . '/erdiko/authorize/src',
        ),
        'erdiko\\authenticate\\' => 
        array (
            0 => __DIR__ . '/..' . '/erdiko/authenticate/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'Doctrine\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/common/lib/Doctrine/Common',
        ),
        'AC\\Kalinka\\' => 
        array (
            0 => __DIR__ . '/..' . '/ac/kalinka/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\ORM\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/orm/lib',
            ),
            'Doctrine\\DBAL\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/dbal/lib',
            ),
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
            'Doctrine\\Common\\Collections\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/collections/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita1ee94dff7ada898fb73f2cb2d698bc2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita1ee94dff7ada898fb73f2cb2d698bc2::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita1ee94dff7ada898fb73f2cb2d698bc2::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
