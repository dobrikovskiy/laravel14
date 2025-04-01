<?php

namespace App\Admin\Widgets;

use App\Models\Category;
use TCG\Voyager\Widgets\BaseDimmer;

class CategoriesWidget extends BaseDimmer
{
    protected $config = [];

    public function run()
    {
        $count = Category::count();
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-categories',
            'title'  => "Категории",
            'text'   => "У вас {$count} категорий",
            'button' => [
                'text' => 'Просмотреть все категории',
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    public function shouldBeDisplayed()
    {
        return auth()->user()->can('browse', app(Category::class));
    }
}