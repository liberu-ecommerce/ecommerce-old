<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'customer';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Customer::factory()->make();
    }

    /** @test */
    public function can_view_create_customer()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_customer()
    {
        $response = $this->post(
            route($this->permissionGroup.'.store', [], false),
            $this->testModel->toArray()
        );

        $customer = Customer::where('email', $this->testModel->email)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'customer.edit',
                'param' => ['customer' => $customer->id],
            ]);
    }

    /** @test */
    public function can_update_customer()
    {
        $this->testModel->save();

        $this->testModel->city = 'updatedCity';


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

        $response = $this->get(route($this->permissionGroup . '.options', [
            'query' => $this->testModel->email,
            'limit' => 10,
        ], false));

        $response->assertStatus(200)
            ->assertJsonFragment([
                'email' => $this->testModel->email,
            ]);
    }
}
