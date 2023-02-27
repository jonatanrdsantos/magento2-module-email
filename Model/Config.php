<?php
/**
 * Config
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

use Magento\Framework\Encryption\EncryptorInterface;
use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Jonatanrdsantos\Email\Api\Data\SmtpOptionsInterface;
use Jonatanrdsantos\Email\Api\Data\SmtpOptionsInterfaceFactory;
use Jonatanrdsantos\Email\Api\Data\ConnectionConfigInterfaceFactory;
use Jonatanrdsantos\Email\Model\Config\Provider\Collection;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config implements ConfigInterface
{
    /**
     * Path to the developer mode configuration from admin panel
     */
    public const DEVELOPER = 'system/email/developer_mode';

    /**
     * Path to the provider configuration from admin panel
     */
    public const PROVIDER = 'system/email/provider';

    /**
     * Path to the protocol configuration from admin panel
     */
    public const PROTOCOL = 'system/email/protocol';

    /**
     * Path to the authentication configuration from admin panel
     */
    public const AUTHENTICATION = 'system/email/authentication';

    /**
     * Path to the host configuration from admin panel
     */
    public const HOST = 'system/email/host';

    /**
     * Path to the port configuration from admin panel
     */
    public const PORT = 'system/email/port';

    /**
     * Path to the username configuration from admin panel
     */
    public const USERNAME = 'system/email/username';

    /**
     * Path to the provider configuration from admin panel
     */
    public const PASSWORD = 'system/email/password';

    /**
     * Path to the set_return_path configuration from admin panel
     */
    public const SET_RETURN_PATH = 'system/email/set_return_path';

    /**
     * Path to the return_path_email configuration from admin panel
     */
    public const RETURN_PATH_EMAIL = 'system/email/return_path_email';

    /**
     * Initializes Config
     *
     * @param EncryptorInterface               $encryptor               For decrypting password
     * @param ScopeConfigInterface             $scopeConfig             To retrieve admin configuration
     * @param Collection                       $collection              To retrieve provider list
     * @param ConnectionConfigInterfaceFactory $connectionConfigFactory ConnectionConfig Factory
     * @param SmtpOptionsInterfaceFactory      $smtpOptionsFactory      SmtpOptions Factory
     */
    public function __construct(
        private readonly EncryptorInterface $encryptor,
        private readonly ScopeConfigInterface $scopeConfig,
        private readonly Collection $collection,
        private readonly ConnectionConfigInterfaceFactory $connectionConfigFactory,
        private readonly SmtpOptionsInterfaceFactory $smtpOptionsFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function isDeveloper(): bool
    {
        return (bool)$this->scopeConfig->getValue(self::DEVELOPER);
    }

    /**
     * @inheritDoc
     */
    public function getProvider(): string
    {
        return $this->scopeConfig->getValue(self::PROVIDER) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getProtocol(): string
    {
        return $this->scopeConfig->getValue(self::PROTOCOL) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getHost(): string
    {
        return $this->scopeConfig->getValue(self::HOST) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getPort(): int
    {
        return $this->scopeConfig->getValue(self::PORT) ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getUsername(): string
    {
        return $this->scopeConfig->getValue(self::USERNAME) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getPassword(): string
    {
        return $this->scopeConfig->getValue(self::PASSWORD) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function shouldReturnPath(): int
    {
        return $this->scopeConfig->getValue(self::SET_RETURN_PATH) ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getReturnPathEmail(): string
    {
        return $this->scopeConfig->getValue(self::RETURN_PATH_EMAIL) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function getAuthentication(): string
    {
        return $this->scopeConfig->getValue(self::AUTHENTICATION) ?? '';
    }

    /**
     * @inheritDoc
     */
    public function isUsingCustomProvider(): bool
    {
        return $this->getProvider() != '';
    }

    /**
     * @inheritDoc
     */
    public function getSmtpOptions(): SmtpOptionsInterface
    {
        $connectionConfig = $this->connectionConfigFactory->create();
        $smtpOptions = $this->smtpOptionsFactory->create();

        $connectionConfig->setSsl($this->getProtocol());
        $smtpOptions->setHost($this->getHost());
        $smtpOptions->setPort($this->getPort());

        if ($authentication = $this->getAuthentication()) {
            $smtpOptions->setConnectionClass($authentication);
        }

        if ($this->isUsingCustomProvider()) {
            $provider = $this->collection->getItemById($this->getProvider());
            if ($provider != null) {
                $smtpOptions->setHost($provider->getHost());
                $smtpOptions->setPort($provider->getPort());
                $connectionConfig->setSsl($provider->getProtocol());
            }
        }
        $connectionConfig->setUsername($this->getUsername());
        $connectionConfig->setPassword($this->encryptor->decrypt($this->getPassword()));

        $smtpOptions->setConnectionConfig($connectionConfig);

        return $smtpOptions;
    }
}
