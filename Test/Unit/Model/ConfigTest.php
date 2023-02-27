<?php
/**
 * ProvideTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model;

use Jonatanrdsantos\Email\Model\Config\Provider;
use Jonatanrdsantos\Email\Model\Mail\Transport\Smtp\Options;
use Jonatanrdsantos\Email\Model\Mail\Transport\Smtp\Options\ConnectionConfig;
use Jonatanrdsantos\Email\Api\Data\ConnectionConfigInterfaceFactory;
use Jonatanrdsantos\Email\Api\Data\SmtpOptionsInterfaceFactory;
use Jonatanrdsantos\Email\Model\Config;
use Jonatanrdsantos\Email\Model\Config\Provider\Collection;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * Path to the developer mode configuration from admin panel
     */
    public const DEVELOPER_KEY = 'system/email/developer_mode';

    /**
     * Value of the developer mode configuration from admin panel
     */
    public const DEVELOPER_VALUE = 0;

    /**
     * Path to the provider configuration from admin panel
     */
    public const PROVIDER_KEY = 'system/email/provider';

    /**
     * Value of the provider configuration from admin panel
     */
    public const PROVIDER_VALUE = 'gmail';

    /**
     * Path to the protocol configuration from admin panel
     */
    public const PROTOCOL_KEY = 'system/email/protocol';

    /**
     * Value of the protocol configuration from admin panel
     */
    public const PROTOCOL_VALUE = 'ssl';

    /**
     * Path to the authentication configuration from admin panel
     */
    public const AUTHENTICATION_KEY = 'system/email/authentication';

    /**
     * Value of the authentication configuration from admin panel
     */
    public const AUTHENTICATION_VALUE = 'plain';

    /**
     * Path to the host configuration from admin panel
     */
    public const HOST_KEY = 'system/email/host';

    /**
     * Value of the host configuration from admin panel
     */
    public const HOST_VALUE = 'smtp.gmail.com';

    /**
     * Path to the port configuration from admin panel
     */
    public const PORT_KEY = 'system/email/port';

    /**
     * Value of the port configuration from admin panel
     */
    public const PORT_VALUE = 465;

    /**
     * Path to the username configuration from admin panel
     */
    public const USERNAME_KEY = 'system/email/username';

    /**
     * Value of the username configuration from admin panel
     */
    public const USERNAME_VALUE = 'testing';

    /**
     * Path to the provider configuration from admin panel
     */
    public const PASSWORD_KEY = 'system/email/password';

    /**
     * Value of the provider configuration from admin panel
     */
    public const PASSWORD_VALUE = 'some_password';

    /**
     * Value of the password encrypted
     */
    public const PASSWORD_ENCRYPTED = 'some_password';

    /**
     * Path to the set_return_path configuration from admin panel
     */
    public const SET_RETURN_PATH_KEY = 'system/email/set_return_path';

    /**
     * Value of the set_return_path configuration from admin panel
     */
    public const SET_RETURN_PATH_VALUE = 0;

    /**
     * Path to the return_path_email configuration from admin panel
     */
    public const RETURN_PATH_EMAIL_KEY = 'system/email/return_path_email';

    /**
     * Value of the return_path_email configuration from admin panel
     */
    public const RETURN_PATH_EMAIL_VALUE = 'some@mail.com';

    /**
     * @var Config
     */
    private Config $config;

    /**
     * @var MockObject&EncryptorInterface
     */
    private $encryptorMock;

    /**
     * @var MockObject&ScopeConfigInterface
     */
    private $scopeConfigMock;

    /**
     * @var MockObject&Collection
     */
    private $collectionMock;

    /**
     * @var MockObject&ConnectionConfigInterfaceFactory
     */
    private $connectionConfigMock;

    /**
     * @var ConnectionConfig
     */
    private ConnectionConfig $connectionConfig;

    /**
     * @var MockObject&SmtpOptionsInterfaceFactory
     */
    private $smtpOptionsMock;

    /**
     * @var Options
     */
    private Options $options;

    /**
     * @var Provider
     */
    private Provider $provider;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->encryptorMock = $this->getMockForAbstractClass(EncryptorInterface::class);
        $this->scopeConfigMock = $this->getMockForAbstractClass(ScopeConfigInterface::class);
        $this->collectionMock = $this->createMock(Collection::class);
        $this->connectionConfigMock = $this->getMockBuilder(ConnectionConfigInterfaceFactory::class)
            ->onlyMethods(['create'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->smtpOptionsMock = $this->getMockBuilder(SmtpOptionsInterfaceFactory::class)
            ->onlyMethods(['create'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->connectionConfig = new ConnectionConfig();
        $this->options = new Options($this->connectionConfig);
        $this->provider = new Provider([
            'host' => self::HOST_VALUE,
            'port' => self::PORT_VALUE,
            'protocol' => self::PROTOCOL_VALUE
        ]);
        $this->config = new Config(
            $this->encryptorMock,
            $this->scopeConfigMock,
            $this->collectionMock,
            $this->connectionConfigMock,
            $this->smtpOptionsMock
        );
    }

    /**
     * Test isDeveloper
     *
     * @return void
     */
    public function testIsDeveloper(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::DEVELOPER_KEY)
            ->willReturn(self::DEVELOPER_VALUE);
        $this->assertEquals(
            self::DEVELOPER_VALUE,
            $this->config->isDeveloper()
        );
    }

    /**
     * Test getProvider
     *
     * @return void
     */
    public function testGetProvider(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::PROVIDER_KEY)
            ->willReturn(self::PROVIDER_VALUE);
        $this->assertEquals(
            self::PROVIDER_VALUE,
            $this->config->getProvider()
        );
    }

    /**
     * Test getProtocol
     *
     * @return void
     */
    public function testGetProtocol(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::PROTOCOL_KEY)
            ->willReturn(self::PROTOCOL_VALUE);
        $this->assertEquals(
            self::PROTOCOL_VALUE,
            $this->config->getProtocol()
        );
    }

    /**
     * Test getHost
     *
     * @return void
     */
    public function testGetHost(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::HOST_KEY)
            ->willReturn(self::HOST_VALUE);
        $this->assertEquals(
            self::HOST_VALUE,
            $this->config->getHost()
        );
    }

    /**
     * Test getPort
     *
     * @return void
     */
    public function testGetPort(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::PORT_KEY)
            ->willReturn(self::PORT_VALUE);
        $this->assertEquals(
            self::PORT_VALUE,
            $this->config->getPort()
        );
    }

    /**
     * Test getUsername
     *
     * @return void
     */
    public function testGetUsername(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::USERNAME_KEY)
            ->willReturn(self::USERNAME_VALUE);
        $this->assertEquals(
            self::USERNAME_VALUE,
            $this->config->getUsername()
        );
    }

    /**
     * Test getPassword
     *
     * @return void
     */
    public function testGetPassword(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::PASSWORD_KEY)
            ->willReturn(self::PASSWORD_VALUE);
        $this->assertEquals(
            self::PASSWORD_VALUE,
            $this->config->getPassword()
        );
    }

    /**
     * Test shouldReturnPath
     *
     * @return void
     */
    public function testShouldReturnPath(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::SET_RETURN_PATH_KEY)
            ->willReturn(self::SET_RETURN_PATH_VALUE);
        $this->assertEquals(
            self::SET_RETURN_PATH_VALUE,
            $this->config->shouldReturnPath()
        );
    }

    /**
     * Test getReturnPathEmail
     *
     * @return void
     */
    public function testGetReturnPathEmail(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::RETURN_PATH_EMAIL_KEY)
            ->willReturn(self::RETURN_PATH_EMAIL_VALUE);
        $this->assertEquals(
            self::RETURN_PATH_EMAIL_VALUE,
            $this->config->getReturnPathEmail()
        );
    }

    /**
     * Test getAuthentication
     *
     * @return void
     */
    public function testGetAuthentication(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::AUTHENTICATION_KEY)
            ->willReturn(self::AUTHENTICATION_VALUE);
        $this->assertEquals(
            self::AUTHENTICATION_VALUE,
            $this->config->getAuthentication()
        );
    }

    /**
     * Test isUsingCustomProvider
     *
     * @return void
     */
    public function testIsUsingCustomProvider(): void
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(self::PROVIDER_KEY)
            ->willReturn('');
        $this->assertEquals(
            false,
            $this->config->isUsingCustomProvider()
        );
    }

    /**
     * Test getSmtpOptions
     *
     * @return void
     */
    public function testGetSmtpOptions(): void
    {
        $this->connectionConfigMock->expects($this->once())
            ->method('create')
            ->willReturn($this->connectionConfig);
        $this->smtpOptionsMock->expects($this->once())
            ->method('create')
            ->willReturn($this->options);
        $this->scopeConfigMock->expects($this->any())
            ->method('getValue')
            ->withConsecutive(
                [self::PROTOCOL_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::HOST_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::PORT_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::AUTHENTICATION_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::PROVIDER_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::PROVIDER_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::USERNAME_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
                [self::PASSWORD_KEY, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, null],
            )
            ->willReturnOnConsecutiveCalls(
                self::PROTOCOL_VALUE,
                self::HOST_VALUE,
                self::PORT_VALUE,
                self::AUTHENTICATION_VALUE,
                self::PROVIDER_VALUE,
                self::PROVIDER_VALUE,
                self::USERNAME_VALUE,
                self::PASSWORD_VALUE,
            );

        $this->collectionMock->expects($this->once())
            ->method('getItemById')
            ->willReturn($this->provider);
        $this->encryptorMock->expects($this->once())
            ->method('decrypt')->willReturn(self::PASSWORD_ENCRYPTED);

        $this->assertEquals(
            [
                'host'              => self::HOST_VALUE,
                'connection_class'  => self::AUTHENTICATION_VALUE,
                'port'              => self::PORT_VALUE,
                'connection_config' => [
                    'username'  => self::USERNAME_VALUE,
                    'password'  => self::PASSWORD_ENCRYPTED,
                    'ssl'       => self::PROTOCOL_VALUE
                ],
            ],
            $this->config->getSmtpOptions()->toArray()
        );
    }
}
