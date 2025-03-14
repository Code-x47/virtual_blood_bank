<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   /* public function test_my_registration(): void
    {
        $response = $this->post('/register',[
            "name"=>"Evans Dubem",
            "email"=>"evans@gmail.com",
            "phone"=>"08160497532",
            "address"=>"Enugu",
            "password"=>"password"
        ]);

        $response->assertStatus(302);
    }*/

    
    public function test_my_login_page() {

        $user = User::factory()->create([
            "name"=>"Ezema Kingsley",
            "email"=>"kings@gmail.com",
            "phone"=>"08153777284",
            "address"=>"Enugu",
            "password"=>bcrypt("password")
        ]);



        $response = $this->post('/login',[
            "email"=>"kings@gmail.com",
            "password"=>"password"
        ]);
        $response->assertStatus(302);
    }
}
