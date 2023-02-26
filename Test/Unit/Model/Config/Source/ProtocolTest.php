<?php
/**
 * ProtocolTest
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
use Jonatanrdsantos\Email\Model\Config\Source\Protocol;

class ProtocolTest extends TestCase
{
    /**
     * The expected result of toOptionArray
     */
    private const OPTION_ARRAY = [
        ['value' => '', 'label' => 'None'],
        ['value' => 'ssl', 'label' => 'SSL'],
        ['value' => 'tls', 'label' => 'TLS']
    ];

    /**
     * @var Protocol
     */
    private Protocol $protocol;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->protocol = new Protocol();
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
            $this->protocol->toOptionArray()
        );
        $this->assertInstanceOf(
            OptionSourceInterface::class,
            $this->protocol
        );
    }
}
