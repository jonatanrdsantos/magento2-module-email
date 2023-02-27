<?php
/**
 * CollectionTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Config\Provider;

use Exception;
use Jonatanrdsantos\Email\Model\Config\Provider;
use Jonatanrdsantos\Email\Model\Config\Provider\Collection;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /**
     * The expected result of toOptionArray
     */
    private const OPTION_ARRAY = [
        ['value' => 'gmail', 'label' => 'Gmail'],
        ['value' => 'mailgun', 'label' => 'Mailgun'],
        ['value' => 'mandrill', 'label' => 'Mandrill']
    ];

    /**
     * The default providers
     */
    private const DEFAULT = [
        'gmail' => [
            'id' => 'gmail',
            'label' => 'Gmail'
        ],
        'mailgun' => [
            'id' => 'mailgun',
            'label' => 'Mailgun'
        ],
        'mandrill' => [
            'id' => 'mandrill',
            'label' => 'Mandrill'
        ]
    ];

    /**
     * @var EntityFactoryInterface&MockObject
     */
    private $entityFactoryMock;

    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * @var Provider[]
     */
    private array $providers;

    /**
     * Setup test
     *
     * @return void
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->entityFactoryMock = $this->getMockForAbstractClass(
            EntityFactoryInterface::class
        );

        foreach (self::DEFAULT as $provider) {
            $this->providers[] = new Provider($provider);
        }

        $this->entityFactoryMock->expects($this->exactly(3))
            ->method('create')
            ->willReturnOnConsecutiveCalls(
                $this->providers[0],
                $this->providers[1],
                $this->providers[2]
            );

        $this->collection = new Collection(
            $this->entityFactoryMock,
            self::DEFAULT
        );
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
            $this->collection->toOptionArray()
        );
    }

    /**
     * Test getItemById
     *
     * @return void
     */
    public function testGetItemById(): void
    {
        if ($this->collection->getItemById(self::OPTION_ARRAY[0]['value']) != null) {
            $this->assertEquals(
                self::DEFAULT[self::OPTION_ARRAY[0]['value']],
                $this->collection->getItemById(self::OPTION_ARRAY[0]['value'])->toArray()
            );
        }
        $this->assertInstanceOf(
            Provider::class,
            $this->collection->getItemById(self::OPTION_ARRAY[0]['value'])
        );
    }
}
