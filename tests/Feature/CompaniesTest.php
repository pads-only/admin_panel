<?php

namespace Tests\Feature;

use App\Models\Companies;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_that_company_page_contains_empty_table(): void
    {
        // arrang
        // act
        $response = $this->actingAs($this->user)->get('/companies');
        // assert
        $response->assertOk();

        $response->assertSee(__('No companies found'));
    }

    public function test_that_company_page_contains_not_empty_table(): void
    {
        // factory arrange
        $companies = Companies::factory()->create();

        // act
        $response = $this->actingAs($this->user)->get('/companies');

        $response->assertOk();

        $response->assertDontSee(__('No companies found'));

        $response->assertViewHas('companies', function ($collection) use ($companies) {
            return $collection->contains($companies);
        });
    }

    public function test_show_page_contain_company(): void
    {
        Companies::factory()->create();

        $response = $this->actingAs($this->user)->get('/companies/1');

        $response->assertOk();
    }

    public function test_show_page_contain_company_not_found(): void

    {
        $response = $this->actingAs($this->user)->get('/companies/1');

        $response->assertNotFound();
    }

    public function test_company_create_page(): void

    {
        $response = $this->actingAs($this->user)->get('/companies/create');

        $response->assertOk();
    }

    public function test_company_edit_page(): void
    {
        Companies::factory()->create();

        $response = $this->actingAs($this->user)->get('/companies/1/edit');

        $response->assertOk();
    }

    public function test_company_edit_page_not_found_id(): void
    {
        $response = $this->actingAs($this->user)->get('/companies/1/edit');

        $response->assertNotFound();
    }

    public function test_redirect_when_guest_access_auth_pages(): void
    {
        $response = $this->get('/companies');

        $response->assertRedirect('/login');
    }

    public function test_login_redirect_to_dashboard(): void
    {

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'is_admin' => false,
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@user.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('dashboard');
    }

    // public function test_create_company_successful(): void
    // {
    //     // $company = [
    //     //     'name' => 'onlypads limited',
    //     //     'email' => 'onlypads@example.com',
    //     //     'logo' => 'image.png',
    //     //     'website' => 'onlypads.com'
    //     // ];
    //     $company = Companies::factory()->create();

    //     $company = $company->first();

    //     $response = $this->actingAs($this->user)->post('/companies', [$company]);

    //     $response->assertStatus(302);
    //     $response->assertRedirect('companies');

    //     $response->assertDataseHas('companies', $company);
    // }


    protected function createUser(): User
    {
        return User::factory()->create();
    }
}
