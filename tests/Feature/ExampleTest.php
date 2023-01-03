<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use TaskApp\DB\TaskStore;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaskFormIsAuthenticated()
    {
//        $this->withoutExceptionHandling();
        $response = $this->get(route('tasks.create'));

//        $response->assertStatus(302);
        $response->assertRedirect('/login');

        $response = $this->post(route('tasks.store'));
        $response->assertRedirect('/login');
    }

    public function testUserCanNotCreateTooManyTasks()
    {
        Artisan::call('migrate');
        $user = new User(['id' => 1]);
        $this->actingAs($user);

        config()->set('task.max_tasks', 2);
        $data = ['name' => 'salam', 'description' => 'chetori'];

        $response = $this->post(route('tasks.store'), $data);
        $this->assertTrue(TaskStore::countTask(1) == 1);

        $response = $this->post(route('tasks.store'), $data);
        $this->assertTrue(TaskStore::countTask(1) == 2);

        $response = $this->post(route('tasks.store'), $data);
        $this->assertTrue(TaskStore::countTask(1) == 2);


        $response->assertRedirect(route('tasks.index'));
    }
}
