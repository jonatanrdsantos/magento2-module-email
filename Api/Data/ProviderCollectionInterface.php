<?php
/**
 * ProviderCollectionInterface
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

interface ProviderCollectionInterface
{
    /**
     * Return Item by id
     *
     * @param int|string $idValue
     *
     * @return DataTransferObjectInterface|null
     */
    public function getItemById(int|string $idValue): DataTransferObjectInterface|null;
}
