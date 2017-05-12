<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function test_a_user_create_a_post()
    {
        //tenemos una pregunta
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';
        $this->browse(function (Browser $browser ,$title,$content) {
            //tenemos un usuario conectado
            $browser->loginAs($this->defaultUser());
            $browser->visit('post.create')
                ->type('title', $title)
                ->type('content', $content)
                ->press('Publicar');
                //el usuario es rediregido al detalle del post
               // ->assertPathIs('/post/1-esta-es-una-pregunta');

        });
        $this->assertDatabaseHas('post', [
            'title' => $this->$title,
            'content' => $this->$content,
            'pending' => true,
        ]);
        //el usuario es rediregido al detalle del post
        //$this->seeInElement('h1',$title);
    }
}
