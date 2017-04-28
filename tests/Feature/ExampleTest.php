<?php

namespace Tests\Feature;

use Foro\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory(User::class)->create([
          'name'=>'fredy henao',
          'email'=>'fredy@gmail.com',
        ]);
        $response = $this->actingAs($user, 'api')
                         ->withSession(['name' => 'fredy henao'])
                         ->get('api/user');

      //  $response->assertStatus(200);
    }
}
