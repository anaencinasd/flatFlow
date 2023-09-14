<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use SebastianBergmann\FileIterator\Factory;
use Illuminate\Support\Facades\DB;
use CreatesApplication;


class TaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    

    public function setUp(): void
    {
        parent::setUp();

        
        DB::beginTransaction();
    }

    public function tearDown(): void
    {
        
        DB::rollBack();

        parent::tearDown();
    }


    public function testIndexTask(){
        $task = Task::factory(20)->make();

        $response = $this->get('/api/task');
        $response->assertJsonStructure([
            'data'=>[
                '*'=>['id', 'title', 'description', 'id_user', 'id_status']
            ]
        ])->assertStatus(200);
    }

    public function testStoreTask(){
        $task = Task::factory()->make();

        $response = $this->post('/api/task',[
            "title"=>$task->title,
            "description"=>$task->description,
            "id_user"=>$task->id_user,
            "id_status"=>$task->id_status,
        ]);

        $response->assertJsonStructure([
            'success',
            'data'=>[
                'title', 
                'description', 
                'id_user',
                'id_status'
            ],

        ])->assertJson([
            'success'=>true,
            'data'=>[
                "title"=>$task->title,
                "description"=>$task->description,
                "id_user"=>$task->id_user,
                "id_status"=>$task->id_status,
            ]
        ])->assertStatus(201);

        $this->assertDatabaseHas('tasks', [
                "title"=>$task->title,
                "description"=>$task->description,
                "id_user"=>$task->id_user,
                "id_status"=>$task->id_status,]);
    }

    public function testUpdateTask()
{
    $task = Task::factory()->create(); 

    $updated = [
        'title' => 'new title',
        'description' => 'new description',
        'id_user'=>100,
        'id_status'=>5
        
    ];

    $this->putJson("api/task/$task->id", $updated)
 
    ->assertStatus(200);
    $this->assertDatabaseHas('tasks',[
        'title' => 'new title',
        'description' => 'new description',
        'id_user'=>100,
        'id_status'=>5
        
    ]);
}

public function testShowTask()
{
    
        $task=Task::factory()->create();
    
        $response=$this->json('GET', "/api/task/$task->id");
        $response->assertStatus(200);
        $response->assertJson([
            'title'=>$task->title,
            'description'=>$task->description,
            'id_user'=>$task->id_user,
            'id_status'=>$task->id_status]);
    }

    public function testDestroyTask()
{
    $task = Task::factory()->create();

    $this->json('DELETE', "/api/task/$task->id" )
    ->assertOk();
    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
}
}


    

