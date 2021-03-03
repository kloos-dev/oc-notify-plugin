<?php namespace Kloos\Notify\Components;

use Kloos\Notify\Models\Post;
use Cms\Classes\ComponentBase;
use Codecycler\Toolbox\Models\Tag;

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
        $options = Tag::all()
            ->pluck('name', 'code')
            ->toArray();

        return [
            'tag' => [
                'title'             => 'Tag',
                'description'       => 'Only show posts with this tag',
                'type'              => 'dropdown',
                'options'           => $options,
                'emptyOption'       => 'Empty option',
            ]
        ];
    }

    public function prepareVars()
    {
    }

    public function get($id = null)
    {
        $this->prepareVars();
        if (!$id) {
            if ($this->property('tag')) {
                // Filter to only show posts with this tag
                $post = Post::first();   // Todo: Need to make a better way for reverse automatic relations

                $tag = Tag::byCode($this->property('tag'));

                if (!$tag) {
                    return collect([]);
                }

                return $tag->posts;
            }

            return Post::where('is_published', true)
                ->get();
        }

        return Post::find($id);
    }
}
