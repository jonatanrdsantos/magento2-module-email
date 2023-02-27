<?php
/**
 * Provider
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
use Jonatanrdsantos\Email\Model\Config\Provider\Collection;

class Provider implements OptionSourceInterface
{
    /**
     * Custom option value
     */
    private const CUSTOM = '';

    /**
     * Initializes Provider
     *
     * @param Collection $collection Provider Collection
     */
    public function __construct(
        private readonly Collection $collection
    ) {
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return array<mixed>
     */
    public function toOptionArray(): array
    {
        return array_merge(
            [['value' => self::CUSTOM, 'label' => __('Custom')]],
            $this->collection->toOptionArray()
        );
    }
}
