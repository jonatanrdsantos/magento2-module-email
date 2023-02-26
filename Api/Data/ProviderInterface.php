<?php
/**
 * ProviderInterface
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

interface ProviderInterface
{
    /**
     * Get id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set id
     *
     * @param string $id provider identifier
     *
     * @return $this
     */
    public function setId(string $id): self;

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel(): string;

    /**
     * Set label
     *
     * @param string $label provider label
     *
     * @return $this
     */
    public function setLabel(string $label): self;

    /**
     * Get host
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Set host
     *
     * @param string $host provider host
     *
     * @return $this
     */
    public function setHost(string $host): self;

    /**
     * Get port
     *
     * @return int
     */
    public function getPort(): int;

    /**
     * Set port
     *
     * @param int $port provider port
     *
     * @return $this
     */
    public function setPort(int $port): self;

    /**
     * Get protocol
     *
     * @return string
     */
    public function getProtocol(): string;

    /**
     * Set protocol
     *
     * @param string $protocol provider protocol
     *
     * @return $this
     */
    public function setProtocol(string $protocol): self;
}
