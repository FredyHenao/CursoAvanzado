<?php

namespace Tests\Feature;


use Tests\FeatureTestCase;
class CreatePostTest extends FeatureTestCase
{
    /**
     *
     */
    public function test_a_user_create_a_post()
    {
        //tenemos una pregunta
        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        //tenemos un usuario conectado
        $this->actingAs($this->defaultUser());

        //Eventos de la prueba
        $this->get('post.create')
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Publicar');

        //resultado
        $this->assertDatabaseHas('post',[
            'title' => $title,
            'content' => $content,
            'pending' => true,
        ]);

        //el usuario es rediregido al detalle del post
        $this->seeInElement('h1',$title);

    }
}