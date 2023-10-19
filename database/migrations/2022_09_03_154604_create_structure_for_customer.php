<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'customer.index', 'description' => 'Show index for customers', 'is_default' => true],
        ['name' => 'customer.create', 'description' => 'Create customer', 'is_default' => false],
        ['name' => 'customer.store', 'description' => 'Store a new customer', 'is_default' => true],
        ['name' => 'customer.edit', 'description' => 'Edit customer', 'is_default' => true],
        ['name' => 'customer.update', 'description' => 'Update customer', 'is_default' => false],
        ['name' => 'customer.destroy', 'description' => 'Delete customer', 'is_default' => false],
        ['name' => 'customer.initTable', 'description' => 'Init table for customers', 'is_default' => true],
        ['name' => 'customer.tableData', 'description' => 'Get table data for customers', 'is_default' => true],
        ['name' => 'customer.exportExcel', 'description' => 'Export excel for customers', 'is_default' => true],
        ['name' => 'customer.options', 'description' => 'Get customer options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Customer', 'icon' => 'users', 'route' => 'customer.index', 'order_index' => 1001, 'has_children' => false,
    ];

};
