<?php
namespace App\Services\Admin;

use App\Models\Category;

class CategoryAdminService
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getall()
    {
        return $this->category->all();
    }
}
?>