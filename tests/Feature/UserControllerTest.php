<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use SebastianBergmann\FileIterator\Factory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use CreatesApplication;


// class UserControllerTest extends TestCase
// {

    

//     public function setUp(): void
//     {
//         parent::setUp();

        
//         DB::beginTransaction();
//     }

//     public function tearDown(): void
//     {
        
//         DB::rollBack();

//         parent::tearDown();
//     }



//     public function testIndexUser()
//     {
//         $user = User::factory(10)->create();

//         $response = $this->get('/api/user');
//         $response->assertJsonStructure([
//             'data' => [
//                 '*' => ['id', 'username', 'email']
//             ]
//         ])->assertStatus(200);
//     }



//     public function testStoreUser()
//     {
//         $user = User::factory()->make();

//         $response = $this->post('/api/user', [
//             "username" => $user->username,
//             "email" => $user->email,
//             "password" => $user->password

//         ]);

//         $response->assertJsonStructure([
//             'success',
//             'data' => [
//                 'username',
//                 'email',

//             ],
//         ])->assertJson([
//             'success' => true,
//             'data' => [
//                 'username' => $user->username,
//                 'email' => $user->email,

//             ],
//         ])->assertStatus(201);


//         $this->assertDatabaseHas('users', ['username' => $user->username, "email" => $user->email]);
//     }


//     public function testUpdateUser()
// {
//     $user = User::factory()->create(); 

//     $updated = [
//         'username' => 'new username',
//         'email' => 'new_email200errores@example.com',
//         'password'=>'new password',
        
//     ];

//     $this->putJson("api/user/$user->id", $updated)
 
//     ->assertStatus(200);
//     $this->assertDatabaseHas('users',[
//         'username' => 'new username',
//         'email' => 'new_email200errores@example.com',
        
//     ]);
// }

// public function testShowUser()
// {
//     $user=User::factory()->create();

//     $response=$this->json('GET', "/api/user/$user->id");
//     $response->assertStatus(200);
//     $response->assertJson([
//         'username'=>$user->username,
//         'email'=>$user->email]);
// }

// public function testDestroyUser()
//     {
//         $user=User::factory()->create();
        
//         $response = $this->json('DELETE', "/api/user/$user->id");
//         $response->assertStatus(200);
//         $this->assertDatabaseMissing('users', ['id'=>$user->id]);

//     }



// } 
