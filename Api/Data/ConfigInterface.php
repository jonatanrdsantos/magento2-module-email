<?php
/**
 * ConfigInterface
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

interface ConfigInterface
{
    /**
     * Get provider
     *
     * @return string
     */
    public function getProvider(): string;

    /**
     * Get is developer
     *
     * @return bool
     */
    public function isDeveloper(): bool;

    /**
     * Get protocol
     *
     * @return string
     */
    public function getProtocol(): string;

    /**
     * Get authentication
     *
     * @return string
     */
    public function getAuthentication(): string;

    /**
     * Get host
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Get port
     *
     * @return int
     */
    public function getPort(): int;

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername(): string;

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword(): string;

    /**
     * Get Should Return-Path
     *
     * @return int
     */
    public function shouldReturnPath(): int;

    /**
     * Get Return-Path Email
     *
     * @return string
     */
    public function getReturnPathEmail(): string;

    /**
     * Check if it is using custom provider
     *
     * @return bool
     */
    public function isUsingCustomProvider(): bool;

    /**
     * Get the SMTP option to be used to send email
     *
     * @return SmtpOptionsInterface
     */
    public function getSmtpOptions(): SmtpOptionsInterface;
}
