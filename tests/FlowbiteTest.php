<?php

declare(strict_types=1);

namespace Yii\Asset\Tests;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Flowbite;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

use function runkit_constant_redefine;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FlowbiteTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(Flowbite::class));

        $this->assetManager->register(Flowbite::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(Flowbite::class));
        $this->assertSame(
            [
                '/55145ba9/flowbite.css' => ['/55145ba9/flowbite.css'],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertSame(
            [
                '/55145ba9/flowbite.js' => ['/55145ba9/flowbite.js'],
            ],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/flowbite.css');
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/flowbite.js');
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/flowbite.js.map');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/flowbite.min.css');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/flowbite.min.js');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/flowbite.min.js.map');
    }

    /**
     * @throws InvalidConfigException
     */
    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $this->assertFalse($this->assetManager->isRegisteredBundle(Flowbite::class));

        $this->assetManager->register(Flowbite::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(Flowbite::class));
        $this->assertSame(
            [
                '/55145ba9/flowbite.min.css' => ['/55145ba9/flowbite.min.css'],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertSame(
            [
                '/55145ba9/flowbite.min.js' => ['/55145ba9/flowbite.min.js'],
            ],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/flowbite.min.css');
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/flowbite.min.js');
        $this->assertFileExists(__DIR__ . '/Support/runtime/55145ba9/flowbite.min.js.map');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/flowbite.css');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/flowbite.js');
        $this->assertFileDoesNotExist(__DIR__ . '/Support/runtime/55145ba9/flowbite.js.map');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
