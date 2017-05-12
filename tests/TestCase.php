<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Foro\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    /*
     * @var User
     */
    protected $defaultUser;

    public function defaultUser()
    {
        if($this->defaultUser){
            return $this->defaultUser();
        }
        return $this->defaultUser = $user = factory(User::class)->create();
    }
}
