<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'product';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Product::factory()->make();
    }

    /** @test */
    public function can_view_create_product()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_product()
    {
        $response = $this->post(
            route('product.store', [], false),
            $this->testModel->toArray() + []
        );

        $Product = Product::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'product.edit',
                'param' => ['product' => $product->id],
            ]);
    }

    /** @test */
    public function can_update_product()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('product.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('product.options', [
            'query' => $this->testModel->name,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['name' => $this->testModel->name]);
    }
}
