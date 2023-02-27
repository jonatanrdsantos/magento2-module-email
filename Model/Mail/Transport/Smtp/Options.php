<?php
/**
 * Options
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Mail\Transport\Smtp;

use Jonatanrdsantos\Email\Api\Data\SmtpOptionsInterface;
use Magento\Framework\DataObject;
use Jonatanrdsantos\Email\Api\Data\ConnectionConfigInterface;

class Options extends DataObject implements SmtpOptionsInterface
{
    /**
     * Host address key
     */
    private const HOST = 'host';

    /**
     * Port number Key
     */
    private const PORT = 'port';

    /**
     * Connection Class Key
     */
    private const CONNECTION_CLASS = 'connection_class';

    /**
     * Connection Config Key
     */
    private const CONNECTION_CONFIG = 'connection_config';

    /**
     * Initializes Options
     *
     * @param         ConnectionConfigInterface $connectionConfig ConnectionConfig Data transfer object
     * @param         array                     $data             Array Containing SMTP options
     *
     * @phpstan-param array<string, mixed>      $data             Array Containing SMTP options
     */
    public function __construct(
        private ConnectionConfigInterface $connectionConfig,
        array $data = []
    ) {
        parent::__construct($data);
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
    public function setHost(string $host): SmtpOptionsInterface
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
    public function setPort(int $port): SmtpOptionsInterface
    {
        return $this->setData(self::PORT, $port);
    }

    /**
     * @inheritDoc
     */
    public function getConnectionClass(): ?string
    {
        return (string)$this->_getData(self::CONNECTION_CLASS);
    }

    /**
     * @inheritDoc
     */
    public function setConnectionClass(string $connectionClass): SmtpOptionsInterface
    {
        return $this->setData(self::CONNECTION_CLASS, $connectionClass);
    }

    /**
     * @inheritDoc
     */
    public function getConnectionConfig(): ?ConnectionConfigInterface
    {
        return $this->connectionConfig;
    }

    /**
     * @inheritDoc
     */
    public function setConnectionConfig(ConnectionConfigInterface $connectionConfig): SmtpOptionsInterface
    {
        $this->connectionConfig = $connectionConfig;
        return $this;
    }

    /**
     * Convert array of object data with to array with keys requested in $keys array
     *
     * @param array<mixed> $keys array of required keys
     *
     * @return array<mixed>
     */
    public function toArray(array $keys = []): array
    {
        $data = parent::toArray($keys);
        $data[self::CONNECTION_CONFIG] = $this->connectionConfig->toArray();
        return $data;
    }
}
