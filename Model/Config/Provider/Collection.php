<?php
/**
 * Collection
 * php version 8.1.*
 *
 * @category  Jonatanrdsantos
 * @package   Jonatanrdsantos_Email
 * @author    Jonatan Santos <jonatan.zarowny+github@gmail.com>
 * @copyright 2023 Jonatanrdsantos
 * @license   https://opensource.org/license/mit/ MIT License
 */
declare(strict_types=1);

namespace Jonatanrdsantos\Email\Model\Config\Provider;

use Exception;
use Jonatanrdsantos\Email\Api\Data\ProviderInterface;
use Magento\Framework\Data\Collection\EntityFactoryInterface;

class Collection extends \Magento\Framework\Data\Collection
{
    /**
     * Item object class name
     *
     * @var string
     */
    protected $_itemObjectClass = ProviderInterface::class;

    /**
     * Initializes Collection
     *
     * @param EntityFactoryInterface   $entityFactory Factory for Collection Items
     * @param array                    $defaultItems  Array of default provider items
     *
     * @phpstan-param array<mixed>     $defaultItems
     *
     * @throws Exception
     */
    public function __construct(
        EntityFactoryInterface $entityFactory,
        array $defaultItems = []
    ) {
        parent::__construct($entityFactory);
        $this->addDefaultItems($defaultItems);
    }

    /**
     * Returns option array
     *
     * @return         array
     * @phpstan-return array<mixed>
     */
    public function toOptionArray(): array
    {
        return parent::_toOptionArray('id', 'label');
    }

    /**
     * Add default items into the collection.
     *
     * @param array $items Default provider items in array format
     *
     * @phpstan-param array<mixed> $items
     *
     * @return void
     * @throws Exception
     */
    protected function addDefaultItems(array $items): void
    {
        if (!empty($items)) {
            foreach ($items as $item) {
                $this->addItem($this->_entityFactory->create(
                    $this->_itemObjectClass,
                    ['data' => $item]
                ));
            }
        }
    }
}
