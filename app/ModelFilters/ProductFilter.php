<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public $relations = [];

    /**
     * Search by Name match
     * @param $name
     * @return ProductFilter
     */
    public function name($name)
    {
        return $this->where('name', 'like', "%$name%");
    }

    /**
     * Search by price from
     * @param $from
     * @return ProductFilter
     */
    public function priceFrom($from)
    {
        return $this->where('price', '>=', $from);
    }

    /**
     * Search by price before
     * @param $before
     * @return ProductFilter
     */
    public function priceBefore($before)
    {
        return $this->where('price', '<=', $before);
    }

    /**
     * Search by published
     * @param $active
     * @return ProductFilter
     */
    public function active($active)
    {
        return $this->where('active', $active);
    }

    /**
     * Not deleted
     * @return ProductFilter
     */
    public function notDeleted()
    {
        return $this->where('deleted_at', '=', null);
    }

    /**
     * Search by category id
     * @param $catecoryId
     * @return ProductFilter
     */
    public function categoryId($catecoryId)
    {
        return $this->related('categories', 'category_id', '=', $catecoryId);
    }

    /**
     * Search by category name
     * @param $categoryName
     * @return ProductFilter
     */
    public function categoryName($categoryName)
    {
        return $this->related('categories', 'name', 'like', "%$categoryName%");
    }
}
