<?php

namespace Tests\Feature;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use LaravelEnso\Users\Models\User;
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
            route('invoice.store', [], false),
            $this->testModel->toArray() + []
        );

        $invoice = Invoice::where('gid', $this->testModel->gid)->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'invoice.edit',
                'param' => ['invoice' => $invoice->id],
            ]);
    }

    /** @test */
    public function can_update_invoice()
    {
        $this->testModel->save();

        $this->testModel->gid = 'updated';

        $this->patch(
            route('invoice.update', $this->testModel->id, false),
            $this->testModel->toArray() + []
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals('updated', $this->testModel->fresh()->gid);
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('invoice.options', [
            'query' => $this->testModel->name,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['name' => $this->testModel->name]);
    }
}
