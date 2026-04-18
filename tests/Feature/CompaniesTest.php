<?php

namespace Tests\Feature;

use App\Models\Companies;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_that_company_page_contains_empty_table(): void
    {
        //arrange
        $user = User::factory()->create();
        //act
        $response = $this
            ->actingAs($user)
            ->get('/companies');
        //assert
        $response->assertOk();

        $response->assertSee(__("No companies found"));
    }

    public function test_that_company_page_contains_not_empty_table(): void
    {
        //factory arrange
        $companies = Companies::factory()->create();

        $user = User::factory()->create();

        // act
        $response = $this->actingAs($user)->get('/companies');

        $response->assertOk();

        $response->assertDontSee(__("No companies found"));

        $response->assertViewHas('companies', function ($collection) use ($companies) {
            return $collection->contains($companies);
        });
    }

    public function test_show_page_contain_company(): void
    {
        Companies::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/companies/1');

        $response->assertOk();
    }

    public function test_show_page_contain_company_not_found(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/companies/1');

        $response->assertNotFound();
    }

    public function test_company_create_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/companies/create');

        $response->assertOk();
    }

    public function test_company_edit_page(): void
    {
        Companies::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/companies/1/edit');

        $response->assertOk();
    }

    public function test_company_edit_page_not_found_id(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/companies/1/edit');

        $response->assertNotFound();
    }

    public function test_redirect_when_guest_access_auth_pages(): void
    {
        $response = $this->get('/companies');

        $response->assertRedirect('/login');
    }
}
