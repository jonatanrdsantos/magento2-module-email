<?php
/**
 * Smtp
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Mail\Transport;

use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\TransportInterface;
use Laminas\Mail\Transport\Smtp as LaminasSmtp;
use Laminas\Mail\Transport\SmtpOptionsFactory;

class Smtp implements TransportInterface
{
    /**
     * Initializes Smtp
     *
     * @param SmtpOptionsFactory $optionsFactory SmtpOptions Factory
     * @param LaminasSmtp        $laminasSmtp    Laminas SMTP transport layer
     * @param ConfigInterface    $config         To retrieve admin configuration
     */
    public function __construct(
        private readonly SmtpOptionsFactory $optionsFactory,
        private readonly LaminasSmtp $laminasSmtp,
        private readonly ConfigInterface $config
    ) {
    }

    /**
     * @inheritDoc
     */
    public function send(Message $message)
    {
        $this->laminasSmtp->setOptions(
            $this->optionsFactory->create(
                ['options' => $this->config->getSmtpOptions()->toArray()]
            )
        );
        $this->laminasSmtp->send($message);
    }
}
