<?php
/**
 * DataTransferObjectInterface
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

interface DataTransferObjectInterface
{
    /**
     * Convert array of object data with to array with keys requested in $keys array
     *
     * @param array<mixed> $keys array of required keys
     * @return array<mixed>
     */
    public function toArray(array $keys = []);
}
