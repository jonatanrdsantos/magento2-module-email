<?php
/**
 * ConnectionConfigInterface
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

interface ConnectionConfigInterface extends DataTransferObjectInterface
{
    /**
     * Get the smtp options connection config ssl
     *
     * @return string
     */
    public function getSsl(): string;

    /**
     * Set the smtp options connection config ssl
     *
     * @param string $ssl
     *
     * @return $this
     */
    public function setSsl(string $ssl): self;

    /**
     * Get the smtp options connection config username
     *
     * @return string|null
     */
    public function getUsername(): ?string;

    /**
     * Set the smtp options connection config username
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username): self;

    /**
     * Get the smtp options connection config password
     *
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * Set the smtp options connection config password
     *
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password): self;
}
