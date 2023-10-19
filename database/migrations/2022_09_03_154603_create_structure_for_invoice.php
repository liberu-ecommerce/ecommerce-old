<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected array $permissions = [
        ['name' => 'invoice.index', 'description' => 'Show index for invoices', 'is_default' => true],
        ['name' => 'invoice.create', 'description' => 'Create invoice', 'is_default' => false],
        ['name' => 'invoice.store', 'description' => 'Store a new invoice', 'is_default' => true],
        ['name' => 'invoice.edit', 'description' => 'Edit invoice', 'is_default' => true],
        ['name' => 'invoice.update', 'description' => 'Update invoice', 'is_default' => false],
        ['name' => 'invoice.destroy', 'description' => 'Delete invoice', 'is_default' => false],
        ['name' => 'invoice.initTable', 'description' => 'Init table for invoices', 'is_default' => true],
        ['name' => 'invoice.tableData', 'description' => 'Get table data for invoices', 'is_default' => true],
        ['name' => 'invoice.exportExcel', 'description' => 'Export excel for invoices', 'is_default' => true],
        ['name' => 'invoice.options', 'description' => 'Get invoice options for select', 'is_default' => true],
    ];

    protected array $menu = [
        'name' => 'Invoice', 'icon' => 'users', 'route' => 'invoice.index', 'order_index' => 1001, 'has_children' => false,
    ];

};
