<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use Yii\Asset\FlowbiteCdn;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\AssetBundle;

final class FlowbiteCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FlowbiteCdn::class));

        $this->assetManager->register(FlowbiteCdn::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FlowbiteCdn::class));

        $bundle = $this->assetManager->getBundle(FlowbiteCdn::class);

        $this->assertInstanceOf(AssetBundle::class, $bundle);
        $this->assertSame(
            [
                'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css',
                    'integrity' => 'sha512-75dkJxTte+gUDJlkLYrVF5u55sGUQpYuGiDaMtsSq+jmblR1yBv1QgKNi3vDcjo4E2Nk/7LOYV65Cq8gkfQGJw==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertSame(
            [
                'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js',
                    'integrity' => 'sha512-khqZ6XB3gzYqfJvXI2qevflbsTvd+aSpMkOVQUvXKyhRgEdORMefo3nNOvCM8584/mUoq/oBG3Vb3gfGzwQgkw==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getJsFiles()
        );
    }
}
