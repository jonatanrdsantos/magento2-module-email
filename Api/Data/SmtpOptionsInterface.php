<?php
/**
 * SmtpOptionsInterface
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Api\Data;

interface SmtpOptionsInterface extends DataTransferObjectInterface
{
    /**
     * Get the smtp options host
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Set the smtp options host
     *
     * @param string $host
     *
     * @return $this
     */
    public function setHost(string $host): self;

    /**
     * Get the smtp options port
     *
     * @return int
     */
    public function getPort(): int;

    /**
     * Set the smtp options host
     *
     * @param int $port
     *
     * @return $this
     */
    public function setPort(int $port): self;

    /**
     * Get the smtp options connection class
     *
     * @return string|null
     */
    public function getConnectionClass(): ?string;

    /**
     * Get the smtp options connection class
     *
     * @param string $connectionClass
     *
     * @return $this
     */
    public function setConnectionClass(string $connectionClass): self;

    /**
     * Get the smtp options connection config
     *
     * @return ConnectionConfigInterface|null
     */
    public function getConnectionConfig(): ?ConnectionConfigInterface;

    /**
     * Set the smtp options connection config
     *
     * @param ConnectionConfigInterface $connectionConfig
     *
     * @return $this
     */
    public function setConnectionConfig(ConnectionConfigInterface $connectionConfig): self;
}
