<?php
/**
 * ConnectionConfigTest
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Test\Unit\Model\Mail\Transport\Smtp\Options;

use Jonatanrdsantos\Email\Model\Mail\Transport\Smtp\Options\ConnectionConfig;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ConnectionConfigTest extends TestCase
{
    /**
     * Key of the ssl attribute in the data container
     */
    public const KEY_SSL = 'ssl';

    /**
     * Value of the ssl attribute in the data container
     */
    public const VALUE_SSL = 'tls';

    /**
     * Value of the ssl updated attribute in the data container
     */
    public const VALUE_UPDATED_SSL = 'ssl';

    /**
     * Key of the username attribute in the data container
     */
    public const KEY_USERNAME = 'username';

    /**
     * Value of the username attribute in the data container
     */
    public const VALUE_USERNAME = 'some_username';

    /**
     * Value of the username updated attribute in the data container
     */
    public const VALUE_UPDATED_USERNAME = 'another_username';

    /**
     * Key of the password attribute in the data container
     */
    public const KEY_PASSWORD = 'password';

    /**
     * Value of the password attribute in the data container
     */
    public const VALUE_PASSWORD = 'some_password';

    /**
     * Value of the password updated attribute in the data container
     */
    public const VALUE_UPDATED_PASSWORD = 'another_password';

    /**
     * @var ConnectionConfig
     */
    private ConnectionConfig $connectionConfig;

    /**
     * Setup test
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->connectionConfig = new ConnectionConfig([
                self::KEY_SSL => self::VALUE_SSL,
                self::KEY_USERNAME => self::VALUE_USERNAME,
                self::KEY_PASSWORD => self::VALUE_PASSWORD,
        ]);
    }

    /**
     * Test getSsl
     *
     * @return void
     */
    public function testGetSsl(): void
    {
        $this->assertEquals(self::VALUE_SSL, $this->connectionConfig->getSsl());
    }

    /**
     * Test setSsl
     *
     * @return void
     */
    public function testSetSsl(): void
    {
        $this->connectionConfig->setSsl(self::VALUE_UPDATED_SSL);
        $this->assertEquals(self::VALUE_UPDATED_SSL, $this->connectionConfig->getSsl());
    }

    /**
     * Test getUsername
     *
     * @return void
     */
    public function testGetUsername(): void
    {
        $this->assertEquals(self::VALUE_USERNAME, $this->connectionConfig->getUsername());
    }

    /**
     * Test setUsername
     *
     * @return void
     */
    public function testSetUsername(): void
    {
        $this->connectionConfig->setUsername(self::VALUE_UPDATED_USERNAME);
        $this->assertEquals(self::VALUE_UPDATED_USERNAME, $this->connectionConfig->getUsername());
    }

    /**
     * Test getPassword
     *
     * @return void
     */
    public function testGetPassword(): void
    {
        $this->assertEquals(self::VALUE_PASSWORD, $this->connectionConfig->getPassword());
    }

    /**
     * Test setPassword
     *
     * @return void
     */
    public function testSetPassword(): void
    {
        $this->connectionConfig->setPassword(self::VALUE_UPDATED_PASSWORD);
        $this->assertEquals(self::VALUE_UPDATED_PASSWORD, $this->connectionConfig->getPassword());
    }
}
