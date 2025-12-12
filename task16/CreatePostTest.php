<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /**
     *
     * @return void
     */
    public function test_user_can_create_post_via_form()
    {
        //подготовка данных формы
        $postData = [
            'title' => 'Мой новый пост',
            'content' => 'Это содержимое моего поста.',
        ];

        //послать POST-запрос на маршрут создания поста
        $response = $this->post('/posts', $postData);

        //проверка редиректа или успешного ответа
        $response->assertStatus(302);
        $response->assertRedirect('/posts');

        //проверка, что пост создан в базе данных
        $this->assertDatabaseHas('posts', [
            'title' => 'Мой новый пост',
            'content' => 'Это содержимое моего поста.',
        ]);
    }
}