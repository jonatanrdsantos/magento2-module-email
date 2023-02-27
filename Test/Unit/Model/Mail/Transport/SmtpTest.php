<?php
/**
 * SmtpTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Mail\Transport;

use Jonatanrdsantos\Email\Api\Data\ConnectionConfigInterface;
use Jonatanrdsantos\Email\Model\Mail\Transport\Smtp;
use Laminas\Mail\Message;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Laminas\Mail\Transport\Smtp as LaminasSmtp;
use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Laminas\Mail\Transport\SmtpOptionsFactory;
use Jonatanrdsantos\Email\Model\Mail\Transport\Smtp\Options;
use Laminas\Mail\Transport\SmtpOptions;

class SmtpTest extends TestCase
{
    /**
     * @var MockObject&SmtpOptionsFactory
     */
    private $smtpOptionsFactoryMock;

    /**
     * @var MockObject&LaminasSmtp
     */
    private $laminasSmtpMock;

    /**
     * @var MockObject&Options
     */
    private $optionsMock;

    /**
     * @var MockObject&SmtpOptions
     */
    private $smtpOptionsMock;

    /**
     * @var MockObject&ConfigInterface
     */
    private $configMock;

    /**
     * @var Smtp
     */
    private Smtp $smtp;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->smtpOptionsFactoryMock = $this->getMockBuilder(SmtpOptionsFactory::class)
            ->onlyMethods(['create'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->laminasSmtpMock = $this->createMock(LaminasSmtp::class);
        $this->optionsMock = $this->createMock(Options::class);
        $this->smtpOptionsMock = $this->createMock(SmtpOptions::class);
        $this->configMock = $this->getMockForAbstractClass(ConfigInterface::class);
        $this->smtp = new Smtp($this->smtpOptionsFactoryMock, $this->laminasSmtpMock, $this->configMock);
    }

    /**
     * Test send
     *
     * @return void
     */
    public function testSend(): void
    {
        $this->configMock->expects($this->once())
            ->method('getSmtpOptions')
            ->willReturn($this->optionsMock);
        $this->smtpOptionsFactoryMock->expects($this->once())
            ->method('create')->willReturn($this->smtpOptionsMock);
        $this->laminasSmtpMock->expects($this->once())
            ->method('setOptions');
        $this->laminasSmtpMock->expects($this->once())
            ->method('send');

        $this->smtp->send(new Message());
    }
}
