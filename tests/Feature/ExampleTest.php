<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use TaskApp\DB\TaskStore;
use TaskApp\Task;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function testTaskFormIsAuthenticated()
    {
        Task::schema();
        $response = $this->get(route('tasks.create'));

        $response->assertRedirect('/login');

        $response = $this->post(route('tasks.store'));

        $this->assertTaskCountIs($count = 0);

        $response->assertRedirect('/login');
        Schema::dropIfExists('tasks');
    }

    public function testUserCanNotCreateTooManyTasks()
    {
//        Artisan::call('migrate');
        Task::schema();
        $this->login($ID = 1);

        config()->set('task.max_tasks', 2);

        $response = $this->submitForm();
        $count = 1;
        $this->assertTaskCountIs($count = 1);

        $this->checkFormValidation();

        $response = $this->submitForm();
        $this->assertTaskCountIs($count = 2);

        $response = $this->submitForm();
        $this->assertTaskCountIs($count = 2);


        $response->assertRedirect(route('tasks.index'));
        Schema::dropIfExists('tasks');
    }


    public function checkFormValidation()
    {
        $count = TaskStore::countTask(1);
        $response = $this->submitForm(['title' => '']);
        $response->assertSessionHasErrors(['title']);
        $response->assertRedirect();
        $this->assertTaskCountIs($count);
        return $response;
    }

    public function login(int $ID)
    {
        $user = new User();
        $user->id = $ID;
        $this->actingAs($user);
    }


    public function submitForm(array $data = ['title' => 'salam', 'description' => 'rhetoric'])
    {
        return $this->post(route('tasks.store'), $data);
    }


    public function assertTaskCountIs(int $count): void
    {
//        $this->assertTrue(TaskStore::countTask(1) == $count);
        $this->assertEquals(TaskStore::countTask(1), $count);
    }
}
