<?php namespace Kloos\Notify\Components;

use Kloos\Notify\Models\Post;
use Cms\Classes\ComponentBase;

class Posts extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Posts',
            'description' => 'Get posts from the Kloos.Notify Post model'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function prepareVars()
    {
    }

    public function get($id = null)
    {
        $this->prepareVars();

        if (!$id) {
            return Post::all();
        }

        return Post::find($id);
    }
}
