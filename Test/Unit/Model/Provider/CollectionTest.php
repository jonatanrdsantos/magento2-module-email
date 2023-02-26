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

namespace Jonatanrdsantos\Email\Test\Unit\Model\Provider;

use Exception;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Jonatanrdsantos\Email\Api\Data\ProviderInterfaceFactory;
use Jonatanrdsantos\Email\Model\Provider\Collection;
use Jonatanrdsantos\Email\Model\Provider;

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
     * @var ProviderInterfaceFactory&MockObject
     */
    private $providerFactoryMock;

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
        $this->providerFactoryMock = $this->createMock(
            ProviderInterfaceFactory::class
        );
        $this->entityFactoryMock = $this->getMockForAbstractClass(
            EntityFactoryInterface::class
        );

        foreach (self::DEFAULT as $provider) {
            $this->providers[] = new Provider($provider);
        }

        $this->providerFactoryMock->expects($this->any())
            ->method('create')
            ->willReturnOnConsecutiveCalls(
                $this->providers[0],
                $this->providers[1],
                $this->providers[2]
            );

        $this->collection = new Collection(
            $this->providerFactoryMock,
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
}
