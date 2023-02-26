<?php
/**
 * Protocol
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */
declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Protocol implements OptionSourceInterface
{
    /**
     * None option value
     */
    private const NONE = '';

    /**
     * SSL option value
     */
    private const SSL = 'ssl';

    /**
     * TLS option value
     */
    private const TLS = 'tls';

    /**
     * Return array of options as value-label pairs
     *
     * @return array{
     *          array{value: '', label: \Magento\Framework\Phrase},
     *          array{value: 'ssl', label: \Magento\Framework\Phrase},
     *          array{value: 'tls', label: \Magento\Framework\Phrase}
     *      }
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::NONE, 'label' => __('None')],
            ['value' => self::SSL, 'label' => __('SSL')],
            ['value' => self::TLS, 'label' => __('TLS')]
        ];
    }
}
