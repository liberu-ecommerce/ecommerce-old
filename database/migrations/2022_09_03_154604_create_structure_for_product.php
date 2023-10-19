<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'product.index', 'description' => 'Show index for products', 'is_default' => true],
        ['name' => 'product.create', 'description' => 'Create product', 'is_default' => false],
        ['name' => 'product.store', 'description' => 'Store a new product', 'is_default' => true],
        ['name' => 'product.edit', 'description' => 'Edit product', 'is_default' => true],
        ['name' => 'product.update', 'description' => 'Update product', 'is_default' => false],
        ['name' => 'product.destroy', 'description' => 'Delete product', 'is_default' => false],
        ['name' => 'product.initTable', 'description' => 'Init table for products', 'is_default' => true],
        ['name' => 'product.tableData', 'description' => 'Get table data for products', 'is_default' => true],
        ['name' => 'product.exportExcel', 'description' => 'Export excel for products', 'is_default' => true],
        ['name' => 'product.options', 'description' => 'Get product options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Product', 'icon' => 'users', 'route' => 'product.index', 'order_index' => 1001, 'has_children' => false,
    ];

};
