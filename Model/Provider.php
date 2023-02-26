<?php
/**
 * Provider
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */
declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model;

use Magento\Framework\DataObject;
use Jonatanrdsantos\Email\Api\Data\ProviderInterface;

class Provider extends DataObject implements ProviderInterface
{
    /**
     * Id key
     */
    private const ID = 'id';

    /**
     * Label key
     */
    private const LABEL = 'label';

    /**
     * Host address key
     */
    private const HOST = 'host';

    /**
     * Port number Key
     */
    private const PORT = 'port';

    /**
     * Protocol used key
     */
    private const PROTOCOL = 'protocol';

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return (string)$this->_getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId(string $id): ProviderInterface
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getLabel(): string
    {
        return (string)$this->_getData(self::LABEL);
    }

    /**
     * @inheritDoc
     */
    public function setLabel(string $label): ProviderInterface
    {
        return $this->setData(self::LABEL, $label);
    }

    /**
     * @inheritDoc
     */
    public function getHost(): string
    {
        return (string)$this->_getData(self::HOST);
    }

    /**
     * @inheritDoc
     */
    public function setHost(string $host): ProviderInterface
    {
        return $this->setData(self::HOST, $host);
    }

    /**
     * @inheritDoc
     */
    public function getPort(): int
    {
        return (int)$this->_getData(self::PORT);
    }

    /**
     * @inheritDoc
     */
    public function setPort(int $port): ProviderInterface
    {
        return $this->setData(self::PORT, $port);
    }

    /**
     * @inheritDoc
     */
    public function getProtocol(): string
    {
        return (string)$this->_getData(self::PROTOCOL);
    }

    /**
     * @inheritDoc
     */
    public function setProtocol(string $protocol): ProviderInterface
    {
        return $this->setData(self::PROTOCOL, $protocol);
    }
}
