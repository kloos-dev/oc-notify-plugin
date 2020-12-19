<?php namespace Kloos\Notify\Models;

use Model;
use Kloos\Toolbox\Models\Tag;
use October\Rain\Database\Builder;
use Kloos\Toolbox\Classes\Behavior\HasTags;

/**
 * Post Model
 */
class Post extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = [
        HasTags::class,
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'kloos_notify_posts';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    protected $with = [
        'image',
    ];

    /**
     * @var array Morph to many relations
     */
    public $morphToMany = [
        'tags' => [
            Tag::class,
            'table' => 'kloos_toolbox_tags_taggables',
            'name' => 'taggable',
        ],
    ];

    public $attachOne = [
        'image' => 'System\Models\File',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::addGlobalScope('orderByPublishedAt', function (Builder $builder) {
            $builder->orderBy('published_at', 'asc');
        });
    }
}
