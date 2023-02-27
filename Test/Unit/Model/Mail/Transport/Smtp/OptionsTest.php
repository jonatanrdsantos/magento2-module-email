<?php
/**
 * OptionsTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Mail\Transport\Smtp;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Jonatanrdsantos\Email\Api\Data\ConnectionConfigInterface;
use Jonatanrdsantos\Email\Model\Mail\Transport\Smtp\Options;

class OptionsTest extends TestCase
{
    /**
     * Key of the host attribute in the data container
     */
    public const KEY_HOST = 'host';

    /**
     * Value of the host attribute in the data container
     */
    public const VALUE_HOST = 'smtp.google.com';

    /**
     * Value of the host updated attribute in the data container
     */
    public const VALUE_UPDATED_HOST = 'smtp2.google.com';

    /**
     * Key of the port attribute in the data container
     */
    public const KEY_PORT = 'port';

    /**
     * Value of the port attribute in the data container
     */
    public const VALUE_PORT = 25;

    /**
     * Value of the port updated attribute in the data container
     */
    public const VALUE_UPDATED_PORT = 587;

    /**
     * Key of the connection_class attribute in the data container
     */
    public const KEY_CONNECTION_CLASS = 'connection_class';

    /**
     * Value of the connection_class attribute in the data container
     */
    public const VALUE_CONNECTION_CLASS = 'plain';

    /**
     * Value of the connection_class updated attribute in the data container
     */
    public const VALUE_UPDATED_CONNECTION_CLASS = 'login';

    /**
     * Key of the connection_config attribute in the data container
     */
    public const KEY_CONNECTION_CONFIG = 'connection_config';

    /**
     * @var ConnectionConfigInterface&MockObject
     */
    private $conectionConfigMock;

    /**
     * @var Options
     */
    private Options $options;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->conectionConfigMock = $this->getMockForAbstractClass(ConnectionConfigInterface::class);
        $this->options = new Options(
            $this->conectionConfigMock,
            [
                self::KEY_HOST => self::VALUE_HOST,
                self::KEY_PORT => self::VALUE_PORT,
                self::KEY_CONNECTION_CLASS => self::VALUE_CONNECTION_CLASS,
            ]
        );
    }

    /**
     * Test getHost
     *
     * @return void
     */
    public function testGetHost(): void
    {
        $this->assertEquals(self::VALUE_HOST, $this->options->getHost());
    }

    /**
     * Test setHost
     *
     * @return void
     */
    public function testSetHost(): void
    {
        $this->options->setHost(self::VALUE_UPDATED_HOST);
        $this->assertEquals(self::VALUE_UPDATED_HOST, $this->options->getHost());
    }

    /**
     * Test getPort
     *
     * @return void
     */
    public function testGetPort(): void
    {
        $this->assertEquals(self::VALUE_PORT, $this->options->getPort());
    }

    /**
     * Test setPort
     *
     * @return void
     */
    public function testSetPort(): void
    {
        $this->options->setPort(self::VALUE_UPDATED_PORT);
        $this->assertEquals(self::VALUE_UPDATED_PORT, $this->options->getPort());
    }

    /**
     * Test getConnectionClass
     *
     * @return void
     */
    public function testGetConnectionClass(): void
    {
        $this->assertEquals(self::VALUE_CONNECTION_CLASS, $this->options->getConnectionClass());
    }

    /**
     * Test setConnectionClass
     *
     * @return void
     */
    public function testSetConnectionClass(): void
    {
        $this->options->setConnectionClass(self::VALUE_UPDATED_CONNECTION_CLASS);
        $this->assertEquals(self::VALUE_UPDATED_CONNECTION_CLASS, $this->options->getConnectionClass());
    }

    /**
     * Test getConnectionConfig
     *
     * @return void
     */
    public function testGetConnectionConfig(): void
    {
        $this->assertEquals($this->conectionConfigMock, $this->options->getConnectionConfig());
    }

    /**
     * Test setConnectionConfig
     *
     * @return void
     */
    public function testSetConnectionConfig(): void
    {
        $this->options->setConnectionConfig($this->conectionConfigMock);
        $this->assertEquals($this->conectionConfigMock, $this->options->getConnectionConfig());
    }
}
