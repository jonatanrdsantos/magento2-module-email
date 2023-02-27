<?php
/**
 * Builder
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Mail\Message;

use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Laminas\Mail\Message;

class Builder
{
    /**
     * Initializes Builder
     *
     * @param ConfigInterface $config
     */
    public function __construct(
        private readonly ConfigInterface $config
    ) {
    }

    /**
     * Build Message sender return path based on configuration
     *
     * @param Message $message
     *
     * @return Message
     */
    public function build(Message $message): Message
    {
        switch ($this->config->shouldReturnPath()) {
            case 1:
                if ($this->config->getReturnPathEmail()) {
                    $message->setSender($this->config->getReturnPathEmail());
                }
                break;
            case 2:
                if ($message->getFrom()->count()) {
                    $fromAddressList = $message->getFrom();
                    $fromAddressList->rewind();
                    $message->setSender($fromAddressList->current()->getEmail());
                }
                break;
        }
        return $message;
    }
}
