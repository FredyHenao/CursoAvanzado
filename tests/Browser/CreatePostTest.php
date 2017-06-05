<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Foro\User;

class CreatePostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    //tenemos una pregunta
    protected $title = 'Esta es una pregunta';
    protected $content = 'Este es el contenido';

    public function test_a_user_create_a_post()
    {

        $this->browse(function (Browser $browser ) {
            //tenemos un usuario conectado
            $browser->loginAs($user = $this->defaultUser());
            $browser->visitRoute('post.create')
                ->type('title', $this->title)
                ->type('content', $this->content)
                ->press('Publicar');
                //el usuario es rediregido al detalle del post
               // ->assertPathIs('/post/1-esta-es-una-pregunta');

        });
        $user = $this->actingAs($this->defaultUser());
        $this->assertDatabaseHas('tb_posts', [
            'title' => $this->title,
            'content' => $this->content,
            'pending' => true,
            'user_id' => $user->id
        ]);
        //el usuario es rediregido al detalle del post
        //$this->seeInElement('h1',$title);
    }
}
