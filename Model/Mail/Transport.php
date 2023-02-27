<?php
/**
 * Transport
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */

declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Mail;

use Jonatanrdsantos\Email\Api\Data\ConfigInterface;
use Jonatanrdsantos\Email\Model\Mail\Message\Builder as MessageBuilder;
use Laminas\Mail\Message;
use Laminas\Mail\Transport\TransportInterface;
use Laminas\Mail\Transport\Sendmail;
use Magento\Framework\Exception\MailException;
use Magento\Framework\Mail\EmailMessageInterface;
use Magento\Framework\Mail\MessageInterface;
use Magento\Framework\Mail\TransportInterface as MagentoTransportInterface;
use Magento\Framework\Phrase;
use Psr\Log\LoggerInterface;

class Transport implements MagentoTransportInterface
{
    /**
     * Initializes Transport
     *
     * @param EmailMessageInterface $message           EmailMessage with all content
     * @param TransportInterface    $transport         Transport layer
     * @param Sendmail              $sendmailTransport Default transport *developer mode*
     * @param ConfigInterface       $config            To retrieve admin configuration
     * @param MessageBuilder        $messageBuilder    To build some message params
     * @param LoggerInterface       $logger            To log errors in case of any
     */
    public function __construct(
        private readonly EmailMessageInterface $message,
        private readonly TransportInterface $transport,
        private readonly Sendmail $sendmailTransport,
        private readonly ConfigInterface $config,
        private readonly MessageBuilder $messageBuilder,
        private readonly LoggerInterface $logger
    ) {
    }

    /**
     * @inheritdoc
     */
    public function sendMessage()
    {
        try {
            $message = $this->messageBuilder->build(
                Message::fromString($this->message->getRawMessage())
                    ->setEncoding('utf-8')
            );
            if ($this->config->isDeveloper()) {
                $this->sendmailTransport->send($message);
            } else {
                $this->transport->send($message);
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new MailException(
                new Phrase('Unable to send mail. Please try again later.'),
                $e
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function getMessage(): MessageInterface|EmailMessageInterface
    {
        return $this->message;
    }
}
