<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            if (\App::isLocale('ru')) {
                $browser->visit('/admin/news/new')
                        ->assertSee('Заголовок новости:')
                        ->type('title', '')
                        ->press('создать')
                        ->assertSee('Поле Заголовок обязательно для заполнения.')
                        ->assertSee('Поле Текст обязательно для заполнения.')
                        ->type('title', 'ф')
                        ->type('text', 'ф')
                        ->press('создать')
                        ->assertSee('Количество символов в поле Заголовок должно быть не меньше 5.')
                        ->assertSee('Количество символов в поле Текст должно быть не меньше 10.')
                        ->type('title', 'Заголовок')
                        ->type('text', 'Текст новости')
                        ->press('создать');
                        
                $browser->visit('/admin/news/new')
                        ->type('title', 'Заголовок')
                        ->type('text', 'Текст новости')
                        ->press('создать')
                        ->assertSee('Такое значение поля Заголовок уже существует.')
                        ;
            }
        });
    }
}
