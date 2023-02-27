<?php
/**
 * BuilderTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Mail\Message;

use Laminas\Mail\Address\AddressInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Laminas\Mail\Message;
use Laminas\Mail\AddressList;
use Laminas\Mail\Address;
use Jonatanrdsantos\Email\Model\Mail\Message\Builder;

class BuilderTest extends TestCase
{
    private const SENDER_EMAIL = 'sender@example.com';

    /**
     * @var MockObject&ConfigInterface
     */
    private $configMock;

    /**
     * @var Builder
     */
    private $builder;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->configMock = $this->getMockForAbstractClass(ConfigInterface::class);
        $this->builder = new Builder($this->configMock);
    }

    /**
     * Test build
     *
     * @return void
     */
    public function testBuildWithReturnPath(): void
    {
        $message = new Message();
        $email = 'some@email.com';
        $this->configMock->expects($this->any())
            ->method('shouldReturnPath')
            ->willReturn(1);
        $this->configMock->expects($this->any())
            ->method('getReturnPathEmail')
            ->willReturn($email);

        $builtMessage = $this->builder->build($message);

        if ($builtMessage->getSender() != null) {
            $this->assertEquals(
                $email,
                $builtMessage->getSender()->getEmail()
            );
        }
        $this->assertInstanceOf(
            AddressInterface::class,
            $builtMessage->getSender()
        );
    }

    /**
     * Test build
     *
     * @return void
     */
    public function testBuildWithSpecifiedReturnPath(): void
    {
        $message = new Message();
        $message->getFrom();

        $addressList = new AddressList();
        $addressList->add(new Address(self::SENDER_EMAIL));
        $message->setFrom($addressList);

        $this->configMock->expects($this->any())
            ->method('shouldReturnPath')
            ->willReturn(2);

        $builtMessage = $this->builder->build($message);

        if ($builtMessage->getSender() != null) {
            $this->assertEquals(
                self::SENDER_EMAIL,
                $builtMessage->getSender()->getEmail()
            );
        }
        $this->assertInstanceOf(
            AddressInterface::class,
            $builtMessage->getSender()
        );
    }
}
