<?php

namespace Tests\Feature;

use Foro\User;
use Tests\FeatureTestCase;

class ExampleTest extends FeatureTestCase
{
    function test_basic_example()
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
