<?php
/**
 * TransporTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Mail;

use Exception;
use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Jonatanrdsantos\Email\Model\Mail\Message\Builder as MessageBuilder;
use Jonatanrdsantos\Email\Model\Mail\Transport;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\Sendmail;
use Laminas\Mail\Transport\TransportInterface;
use Magento\Framework\Exception\MailException;
use Magento\Framework\Mail\TransportInterface as MagentoTransportInterface;
use Magento\Framework\Mail\EmailMessageInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;

class TransportTest extends TestCase
{
    private const RAW_MESSAGE = 'From: sender@example.com
To: recipient@example.com
Subject: Test Email

This is the body of the email message.

--boundary-123456789
Content-Type: application/pdf
Content-Disposition: attachment; filename="example.pdf"
Content-Transfer-Encoding: base64

JVBERi0xLjUNCiW1tbW1DQoxIDAgb2JqDQo8PA0KL1R5cGUgL0NhdGFsb2cNCi9QYWdlcyAzIDAgUg0KL1
BhcmVudCA5IDAgUg0KL0NvdW50IDIgMCBSDQovVHlwZSAvUGFnZQ0KPj4NCnN0cmVhbQ0KZW5kb2JqDQoN';

    /**
     * @var MockObject&Sendmail
     */
    private $sendMailMock;

    /**
     * @var MockObject&MessageBuilder
     */
    private $messageBuilderMock;

    /**
     * @var MockObject&EmailMessageInterface
     */
    private $emailMessageMock;

    /**
     * @var MockObject&TransportInterface
     */
    private $transportInterfaceMock;

    /**
     * @var MockObject&ConfigInterface
     */
    private $configMock;

    /**
     * @var MockObject&LoggerInterface
     */
    private $loggerMock;

    /**
     * @var MagentoTransportInterface
     */
    private MagentoTransportInterface $transport;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->sendMailMock = $this->createMock(Sendmail::class);
        $this->messageBuilderMock = $this->createMock(MessageBuilder::class);
        $this->emailMessageMock = $this->getMockForAbstractClass(EmailMessageInterface::class);
        $this->transportInterfaceMock = $this->getMockForAbstractClass(TransportInterface::class);
        $this->configMock = $this->getMockForAbstractClass(ConfigInterface::class);
        $this->loggerMock = $this->getMockForAbstractClass(LoggerInterface::class);
        $this->transport = new Transport(
            $this->emailMessageMock,
            $this->transportInterfaceMock,
            $this->sendMailMock,
            $this->configMock,
            $this->messageBuilderMock,
            $this->loggerMock,
        );
    }

    /**
     * Test sendMessage
     *
     * @return void
     * @throws MailException
     */
    public function testSendMessage(): void
    {
        $this->emailMessageMock->expects($this->once())->method('getRawMessage')
            ->willReturn(self::RAW_MESSAGE);
        $this->messageBuilderMock->expects($this->once())->method('build')
            ->willReturn(new Message());
        $this->configMock->expects($this->once())->method('isDeveloper')
            ->willReturn(false);
        $this->transportInterfaceMock->expects($this->once())->method('send');
        $this->transport->sendMessage();
    }

    /**
     * Test sendMessage
     *
     * @return void
     * @throws MailException
     */
    public function testSendMessageDeveloper(): void
    {
        $this->emailMessageMock->expects($this->once())->method('getRawMessage')
            ->willReturn(self::RAW_MESSAGE);
        $this->messageBuilderMock->expects($this->once())->method('build')
            ->willReturn(new Message());
        $this->sendMailMock->expects($this->once())->method('send');
        $this->configMock->expects($this->once())->method('isDeveloper')
            ->willReturn(true);
        $this->transport->sendMessage();
    }

    /**
     * Test sendMessage
     *
     * @return void
     * @throws MailException
     */
    public function testSendMessageFailure(): void
    {
        $this->configMock->expects($this->once())->method('isDeveloper')
            ->willReturn(false);
        $this->emailMessageMock->expects($this->once())->method('getRawMessage')
            ->willReturn(self::RAW_MESSAGE);
        $this->messageBuilderMock->expects($this->once())->method('build')
            ->willReturn(new Message());
        $this->transportInterfaceMock->expects($this->once())->method('send')
            ->willThrowException(new Exception());
        $this->expectException(Exception::class);
        $this->transport->sendMessage();
    }

    /**
     * Test getMessage
     *
     * @return void
     */
    public function testGetMessage(): void
    {
        $this->assertInstanceOf(
            EmailMessageInterface::class,
            $this->transport->getMessage()
        );
    }
}
