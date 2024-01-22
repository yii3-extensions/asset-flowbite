<?php

declare(strict_types=1);

namespace Yii\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class Flowbite extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@npm/flowbite/dist';

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $environment = defined('YII_ENV') ? YII_ENV : 'prod';
        $cssFiles = $environment === 'prod' ? 'flowbite.min.css' : 'flowbite.css';
        $jsFiles = $environment === 'prod' ? 'flowbite.min.js' : 'flowbite.js';

        $this->css = [$cssFiles];
        $this->js = [$jsFiles];
        $this->publishOptions = [
            'filter' => $pathMatcher->only("**/{$cssFiles}", "**/{$jsFiles}", "**/{$jsFiles}.map"),
        ];
    }
}
