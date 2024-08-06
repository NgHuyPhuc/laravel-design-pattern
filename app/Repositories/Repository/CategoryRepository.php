<?php

namespace App\Repositories\Repository;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $Category)
    {
        parent::__construct($Category);
    }
}
?>