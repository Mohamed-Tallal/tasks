<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_view_with_tasks()
    {
        Task::factory()->count(5)->create();
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('task');

        $tasks = $response->viewData('tasks');
        $this->assertNotEmpty($tasks);

        $this->assertTrue($tasks->first()->relationLoaded('assignedBy'));
        $this->assertTrue($tasks->first()->relationLoaded('assignedTo'));
    }


    public function test_returns_no_tasks_message_when_no_tasks_available()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('there is no tasks');
    }


    public function test_returns_view_create_page_with_admins_and_users_data()
    {
        $admins = Admin::factory()->count(5)->create();
        $users = User::factory()->count(5)->create();

        $response = $this->get('/create');
        $response->assertStatus(200);

        $response->assertViewIs('create');
        $response->assertViewHas('admins', $admins);

        $response->assertViewHas('users', $users);
    }


    public function test_store_with_valid_data()
    {
        $user = User::factory()->create();
        $admin = Admin::factory()->create();

        $response = $this->post('/', [
            'assigned_by' => $admin->id,
            'title' => 'Task',
            'description' => 'Description',
            'assigned_to' => $user->id,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('index'));
    }


    public function test_store_with_invalid_data()
    {
        $response = $this->post('/', [
             'title' => 'Test Task',
             'description' => 'Test Description',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();
    }

}
