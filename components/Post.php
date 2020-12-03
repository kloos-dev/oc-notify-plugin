<?php namespace Kloos\Notify\Components;

use Cms\Classes\ComponentBase;

class Post extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Post Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'post_id' => [
                'title' => 'Post id',
                'type'  => 'string',
            ],
        ];
    }

    public function onRun()
    {
        $this->page['post'] = $this->get();
    }

    public function get()
    {
        $post = \Kloos\Notify\Models\Post::find($this->property('post_id'));

        return $post;
    }
}
