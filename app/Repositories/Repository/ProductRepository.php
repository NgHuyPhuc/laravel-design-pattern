<?php

namespace App\Repositories\Repository;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $Product)
    {
        parent::__construct($Product);
    }
}
?>