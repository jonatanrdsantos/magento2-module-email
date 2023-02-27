<?php
/**
 * ProviderTest
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

use Exception;
use Jonatanrdsantos\Email\Model\Config\Provider\Collection;
use Jonatanrdsantos\Email\Model\Config\Source\Provider;
use Magento\Framework\Data\OptionSourceInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    /**
     * The expected result of toOptionArray from Provider
     */
    private const OPTION_ARRAY = [
        ['value' => '', 'label' => 'Custom'],
        ['value' => 'gmail', 'label' => 'Gmail']
    ];

    /**
     * The expected result of toOptionArray from Collection
     */
    private const COLLECTION_OPTION_ARRAY = [
        ['value' => 'gmail', 'label' => 'Gmail']
    ];

    /**
     * @var Provider
     */
    private Provider $provider;

    /**
     * @var MockObject&Collection
     */
    private $collectionMock;

    /**
     * Setup test
     *
     * @return void
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->collectionMock = $this->createMock(Collection::class);
        $this->provider = new Provider($this->collectionMock);
    }

    /**
     * Test toOptionArray
     *
     * @return void
     */
    public function testToOptionArray(): void
    {
        $this->collectionMock->expects($this->once())
            ->method('toOptionArray')
            ->willReturn(self::COLLECTION_OPTION_ARRAY);

        $this->assertEquals(
            self::OPTION_ARRAY,
            $this->provider->toOptionArray()
        );
        $this->assertInstanceOf(
            OptionSourceInterface::class,
            $this->provider
        );
    }
}
