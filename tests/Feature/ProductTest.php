<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use Datatable, DestroyForm, CreateForm, EditForm, RefreshDatabase;

    private string $permissionGroup = 'product';
    private mixed $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Product::factory()->make();
        $productCat = ProductCategory::factory()->create();
        $this->testModel->category_id = $productCat->id;

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
            $this->testModel->toArray()
        );

        $response->assertStatus(200)
            ->assertJsonStructure(['message']);
    }

    /** @test */
    public function can_update_product()
    {
        $this->testModel->save();

        $this->testModel->is_variable = $this->testModel->is_variable == 1 ? 0 : 1;

        $this->patch(
            route('product.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);
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
