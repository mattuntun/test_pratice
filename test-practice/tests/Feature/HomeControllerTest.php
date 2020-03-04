<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testExample2() {
    $response = $this->get('/home'); // 変更(ホーム画面のパスに変更)

    $response->assertStatus(200)
        ->assertViewIs('home') // 追加(ここでの'home'は、ホーム画面で使われているビュー名)
        ->assertSee('You are logged in!'); // 追加(ホーム画面で表示されているメッセージ)
    }

    public function testExample3() 
    {
        $response = $this
            ->actingAs(User::find(1)) // 追加
            ->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('You are logged in!');
    }




}