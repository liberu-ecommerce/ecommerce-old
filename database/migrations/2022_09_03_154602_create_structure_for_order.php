<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'order.index', 'description' => 'Show index for orders', 'is_default' => true],
        ['name' => 'order.create', 'description' => 'Create order', 'is_default' => false],
        ['name' => 'order.store', 'description' => 'Store a new order', 'is_default' => true],
        ['name' => 'order.edit', 'description' => 'Edit order', 'is_default' => true],
        ['name' => 'order.update', 'description' => 'Update order', 'is_default' => false],
        ['name' => 'order.destroy', 'description' => 'Delete order', 'is_default' => false],
        ['name' => 'order.initTable', 'description' => 'Init table for orders', 'is_default' => true],
        ['name' => 'order.tableData', 'description' => 'Get table data for orders', 'is_default' => true],
        ['name' => 'order.exportExcel', 'description' => 'Export excel for orders', 'is_default' => true],
        ['name' => 'order.options', 'description' => 'Get order options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Order', 'icon' => 'users', 'route' => 'order.index', 'order_index' => 1001, 'has_children' => false,
    ];

};
