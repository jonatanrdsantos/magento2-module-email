<?php
/**
 * AuthenticationTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */
declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Config\Source;

use PHPUnit\Framework\TestCase;
use Magento\Framework\Data\OptionSourceInterface;
use Jonatanrdsantos\Email\Model\Config\Source\Authentication;

class AuthenticationTest extends TestCase
{
    /**
     * The expected result of toOptionArray
     */
    private const OPTION_ARRAY = [
        ['value' => '', 'label' => 'NONE'],
        ['value' => 'plain', 'label' => 'Plain'],
        ['value' => 'login', 'label' => 'Login']
    ];

    /**
     * @var Authentication
     */
    private Authentication $authentication;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->authentication = new Authentication();
    }

    /**
     * Test toOptionArray
     *
     * @return void
     */
    public function testToOptionArray(): void
    {
        $this->assertEquals(
            self::OPTION_ARRAY,
            $this->authentication->toOptionArray()
        );
        $this->assertInstanceOf(
            OptionSourceInterface::class,
            $this->authentication
        );
    }
}
