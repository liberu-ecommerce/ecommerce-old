<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'invoice';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Invoice::factory()->make();
        $customer = Customer::factory()->create();
        $order = Order::factory()->make();
        $order->customer_id = $customer->id;
        $order = Order::create($order->toArray());
        $this->testModel->customer_id = $customer->id;
        $this->testModel->order_id = $order->id;
    }

    /** @test */
    public function can_view_create_invoice()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_invoice()
    {
        $response = $this->post(
            route($this->permissionGroup.'.store', [], false),
            $this->testModel->toArray()
        );


        $response->assertStatus(200)
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function can_update_invoice()
    {
        $this->testModel->save();

        $this->testModel->total_amount = ($this->testModel->total_amount  + 50);

        $this->patch(
            route($this->permissionGroup.'.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('invoice.options', [
            'query' => $this->testModel->customer_id,
            'limit' => 10,
        ], false))
            ->assertStatus(200);
    }
}
