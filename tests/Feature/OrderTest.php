<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'order';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $customer = Customer::factory()->create();
        $this->testModel = Order::factory()->make();
        $this->testModel->customer_id = $customer->id;
    }

    /** @test */
    public function can_view_create_order()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_order()
    {
        $response = $this->post(
            route($this->permissionGroup.'.store', [], false),
            $this->testModel->toArray()
        );

        $response->assertStatus(200)
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function can_update_order()
    {
        $this->testModel->save();

        $this->testModel->total_amount =   $this->testModel->total_amount + 20;

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

        $response = $this->get(route($this->permissionGroup.'.options', [
            'query' => $this->testModel->payment_status,
            'limit' => 10,
        ], false));
        //dd($response->json());
        $response->assertStatus(200);
    }
}
