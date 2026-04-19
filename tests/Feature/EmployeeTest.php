<?php

namespace Tests\Feature;

use App\Models\Companies;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_employee_page_contain_empty_table(): void
    {

        $response = $this->actingAs($this->user)->get('/employees');

        $response->assertOk();

        $response->assertSee(__('No employees found'));
    }

    public function test_employee_page_contain_non_empty_table(): void
    {

        $employees = Employees::factory()->create();


        $response = $this->actingAs($this->user)->get('/employees');

        $response->assertOk();

        $response->assertViewHas('employees', function ($collection) use ($employees) {
            return $collection->contains($employees);
        });
    }

    public function test_create_company_successful(): void
    {
        Companies::factory()->create();

        $employee = [
            'first_name' => 'onlypads limited',
            'last_name' => 'onlypads@example.com',
            'companies_id' => 1,
            'email' => 'onlypads.com',
            'phone' => '3232039029'
        ];

        $response = $this->actingAs($this->user)->post('/employees', $employee);

        $response->assertStatus(302);
        $response->assertRedirect('/employees');

        $this->assertDatabaseHas('employees', $employee);
    }

    private function createUser(): User
    {
        return User::factory()->create();
    }
}
