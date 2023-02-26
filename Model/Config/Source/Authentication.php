<?php
/**
 * Authentication
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

class Authentication implements OptionSourceInterface
{
    /**
     * SMTP option value
     */
    private const SMTP = 'smtp';

    /**
     * Plain option value
     */
    private const PLAIN = 'plain';

    /**
     * Login option value
     */
    private const LOGIN = 'login';

    /**
     * Return array of options as value-label pairs
     *
     * @return array{
     *          array{value: 'smtp', label: \Magento\Framework\Phrase},
     *          array{value: 'plain', label: \Magento\Framework\Phrase},
     *          array{value: 'login', label: \Magento\Framework\Phrase}
     *      }
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::SMTP, 'label' => __('SMTP')],
            ['value' => self::PLAIN, 'label' => __('Plain')],
            ['value' => self::LOGIN, 'label' => __('Login')]
        ];
    }
}
