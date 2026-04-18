<?php

namespace Tests\Feature;

use App\Models\Employees;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_employee_page_contain_empty_table(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/employees');

        $response->assertOk();

        $response->assertSee(__("No employees found"));
    }

    public function test_employee_page_contain_non_empty_table(): void
    {

        $employees = Employees::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/employees');

        $response->assertOk();

        $response->assertViewHas('employees', function ($collection) use ($employees) {
            return $collection->contains($employees);
        });
    }
}
