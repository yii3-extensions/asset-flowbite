<?php

declare(strict_types=1);

namespace Yii\Asset;

use Yiisoft\Assets\AssetBundle;

final class FlowbiteCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css'];
    public array $cssOptions = [
        'integrity' => 'sha512-75dkJxTte+gUDJlkLYrVF5u55sGUQpYuGiDaMtsSq+jmblR1yBv1QgKNi3vDcjo4E2Nk/7LOYV65Cq8gkfQGJw==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
    public array $js = ['https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js'];
    public array $jsOptions = [
        'integrity' => 'sha512-khqZ6XB3gzYqfJvXI2qevflbsTvd+aSpMkOVQUvXKyhRgEdORMefo3nNOvCM8584/mUoq/oBG3Vb3gfGzwQgkw==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
}
