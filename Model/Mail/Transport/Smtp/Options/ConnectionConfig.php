<?php
/**
 * ConnectionConfig
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Mail\Transport\Smtp\Options;

use Jonatanrdsantos\Email\Api\Data\ConnectionConfigInterface;
use Magento\Framework\DataObject;

class ConnectionConfig extends DataObject implements ConnectionConfigInterface
{
    /**
     * SSL key
     */
    public const SSL = 'ssl';

    /**
     * Username key
     */
    public const USERNAME = 'username';

    /**
     * Password key
     */
    public const PASSWORD = 'password';

    /**
     * @inheritDoc
     */
    public function getSsl(): string
    {
        return (string)$this->_getData(self::SSL);
    }

    /**
     * @inheritDoc
     */
    public function setSsl(string $ssl): ConnectionConfigInterface
    {
        return $this->setData(self::SSL, $ssl);
    }

    /**
     * @inheritDoc
     */
    public function getUsername(): string
    {
        return (string)$this->_getData(self::USERNAME);
    }

    /**
     * @inheritDoc
     */
    public function setUsername(string $username): ConnectionConfigInterface
    {
        return $this->setData(self::USERNAME, $username);
    }

    /**
     * @inheritDoc
     */
    public function getPassword(): string
    {
        return (string)$this->_getData(self::PASSWORD);
    }

    /**
     * @inheritDoc
     */
    public function setPassword(string $password): ConnectionConfigInterface
    {
        return $this->setData(self::PASSWORD, $password);
    }
}
