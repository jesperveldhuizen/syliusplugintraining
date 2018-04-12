<?php
/**
 * Created by PhpStorm.
 * User: chrustu
 * Date: 12/04/2018
 * Time: 11:36
 */

namespace Acme\SyliusExamplePlugin\Service;

interface UnwrapServiceInterface
{
    public function unwrap(int $id): void;
}