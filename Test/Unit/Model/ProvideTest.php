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

use PHPUnit\Framework\TestCase;
use Jonatanrdsantos\Email\Model\Provider;

class ProvideTest extends TestCase
{
    /**
     *
     */
    private const ID_ATTRIBUTE_KEY = 'id';
    /**
     *
     */
    private const LABEL_ATTRIBUTE_KEY = 'label';
    /**
     *
     */
    private const HOST_ATTRIBUTE_KEY = 'host';
    /**
     *
     */
    private const PORT_ATTRIBUTE_KEY = 'port';
    /**
     *
     */
    private const PROTOCOL_ATTRIBUTE_KEY = 'protocol';
    /**
     *
     */
    private const MAGIC_METHOD_MESSAGE = 'Failed to retrieve via magic method';
    /**
     *
     */
    private const METHOD_MESSAGE = 'Failed to retrieve via getData() method';
    /**
     *
     */
    private const ARRAY_ACCESS_MESSAGE = 'Failed to retrieve via array access';

    /**
     * The provider attributes
     */
    private const ATTRIBUTES = [
        self::ID_ATTRIBUTE_KEY => 'gmail',
        self::LABEL_ATTRIBUTE_KEY => 'Gmail, GSuite',
        self::HOST_ATTRIBUTE_KEY => 'smtp.gmail.com',
        self::PORT_ATTRIBUTE_KEY => 465,
        self::PROTOCOL_ATTRIBUTE_KEY => 'ssl',
    ];

    /**
     * The provider updated attributes
     */
    private const ATTRIBUTES_UPDATED = [
        self::ID_ATTRIBUTE_KEY => 'zoho',
        self::LABEL_ATTRIBUTE_KEY => 'Zoho Mail',
        self::HOST_ATTRIBUTE_KEY => 'smtp.zoho.com',
        self::PORT_ATTRIBUTE_KEY => 25,
        self::PROTOCOL_ATTRIBUTE_KEY => '',
    ];

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
        $this->provider = new Provider(self::ATTRIBUTES);
    }

    /**
     * Test getId
     *
     * @return void
     */
    public function testGetId(): void
    {
        $this->assertEquals(
            self::ATTRIBUTES[self::ID_ATTRIBUTE_KEY],
            $this->provider->getId(),
            self::MAGIC_METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::ID_ATTRIBUTE_KEY],
            $this->provider->getData(self::ID_ATTRIBUTE_KEY),
            self::METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::ID_ATTRIBUTE_KEY],
            $this->provider[self::ID_ATTRIBUTE_KEY],
            self::ARRAY_ACCESS_MESSAGE
        );
    }

    /**
     * Test setId
     *
     * @return void
     */
    public function testSetId(): void
    {
        $this->provider->setId(self::ATTRIBUTES_UPDATED[self::ID_ATTRIBUTE_KEY]);
        $this->assertEquals(
            self::ATTRIBUTES_UPDATED[self::ID_ATTRIBUTE_KEY],
            $this->provider->getId(),
            self::MAGIC_METHOD_MESSAGE
        );
    }

    /**
     * Test getLabel
     *
     * @return void
     */
    public function testGetLabel(): void
    {
        $this->assertEquals(
            self::ATTRIBUTES[self::LABEL_ATTRIBUTE_KEY],
            $this->provider->getLabel(),
            self::MAGIC_METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::LABEL_ATTRIBUTE_KEY],
            $this->provider->getData(self::LABEL_ATTRIBUTE_KEY),
            self::METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::LABEL_ATTRIBUTE_KEY],
            $this->provider[self::LABEL_ATTRIBUTE_KEY],
            self::ARRAY_ACCESS_MESSAGE
        );
    }

    /**
     * Test setLabel
     *
     * @return void
     */
    public function testSetLabel(): void
    {
        $this->provider->setLabel(self::ATTRIBUTES_UPDATED[self::LABEL_ATTRIBUTE_KEY]);
        $this->assertEquals(
            self::ATTRIBUTES_UPDATED[self::LABEL_ATTRIBUTE_KEY],
            $this->provider->getLabel(),
            self::MAGIC_METHOD_MESSAGE
        );
    }

    /**
     * Test getHost
     *
     * @return void
     */
    public function testGetHost(): void
    {
        $this->assertEquals(
            self::ATTRIBUTES[self::HOST_ATTRIBUTE_KEY],
            $this->provider->getHost(),
            self::MAGIC_METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::HOST_ATTRIBUTE_KEY],
            $this->provider->getData(self::HOST_ATTRIBUTE_KEY),
            self::METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::HOST_ATTRIBUTE_KEY],
            $this->provider[self::HOST_ATTRIBUTE_KEY],
            self::ARRAY_ACCESS_MESSAGE
        );
    }

    /**
     * Test setHost
     *
     * @return void
     */
    public function testSetHost(): void
    {
        $this->provider->setHost(self::ATTRIBUTES_UPDATED[self::HOST_ATTRIBUTE_KEY]);
        $this->assertEquals(
            self::ATTRIBUTES_UPDATED[self::HOST_ATTRIBUTE_KEY],
            $this->provider->getHost(),
            self::MAGIC_METHOD_MESSAGE
        );
    }

    /**
     * Test getPort
     *
     * @return void
     */
    public function testGetPort(): void
    {
        $this->assertEquals(
            self::ATTRIBUTES[self::PORT_ATTRIBUTE_KEY],
            $this->provider->getPort(),
            self::MAGIC_METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::PORT_ATTRIBUTE_KEY],
            $this->provider->getData(self::PORT_ATTRIBUTE_KEY),
            self::METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::PORT_ATTRIBUTE_KEY],
            $this->provider[self::PORT_ATTRIBUTE_KEY],
            self::ARRAY_ACCESS_MESSAGE
        );
    }

    /**
     * Test setPort
     *
     * @return void
     */
    public function testSetPort(): void
    {
        $this->provider->setPort(self::ATTRIBUTES_UPDATED[self::PORT_ATTRIBUTE_KEY]);
        $this->assertEquals(
            self::ATTRIBUTES_UPDATED[self::PORT_ATTRIBUTE_KEY],
            $this->provider->getPort(),
            self::MAGIC_METHOD_MESSAGE
        );
    }

    /**
     * Test getProtocol
     *
     * @return void
     */
    public function testGetProtocol(): void
    {
        $this->assertEquals(
            self::ATTRIBUTES[self::PROTOCOL_ATTRIBUTE_KEY],
            $this->provider->getProtocol(),
            self::MAGIC_METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::PROTOCOL_ATTRIBUTE_KEY],
            $this->provider->getData(self::PROTOCOL_ATTRIBUTE_KEY),
            self::METHOD_MESSAGE
        );
        $this->assertEquals(
            self::ATTRIBUTES[self::PROTOCOL_ATTRIBUTE_KEY],
            $this->provider[self::PROTOCOL_ATTRIBUTE_KEY],
            self::ARRAY_ACCESS_MESSAGE
        );
    }

    /**
     * Test setProtocol
     *
     * @return void
     */
    public function testSetProtocol(): void
    {
        $this->provider->setProtocol(self::ATTRIBUTES_UPDATED[self::PROTOCOL_ATTRIBUTE_KEY]);
        $this->assertEquals(
            self::ATTRIBUTES_UPDATED[self::PROTOCOL_ATTRIBUTE_KEY],
            $this->provider->getProtocol(),
            self::MAGIC_METHOD_MESSAGE
        );
    }
}
