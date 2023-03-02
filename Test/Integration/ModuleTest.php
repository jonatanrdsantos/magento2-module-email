<?php
/**
 * ModuleConfigTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Integration;

use Magento\Framework\Component\ComponentRegistrar;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    private const NAME = 'Jonatanrdsantos_Email';

    /**
     * Tests for the existence of a registration.php file
     */
    public function testTheModuleIsRegistered(): void
    {
        $registrar = new ComponentRegistrar();
        $this->assertArrayHasKey(
            self::NAME,
            $registrar->getPaths(ComponentRegistrar::MODULE),
            'Module is not registered with Magento 2. Does registration.php exist?'
        );
    }
}
