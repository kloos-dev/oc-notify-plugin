<?php namespace Kloos\Notify\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Posts Back-end Controller
 */
class Posts extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Kloos.Notify', 'notify', 'posts');
    }

    public function create()
    {
        $this->bodyClass = 'compact-container';
        $this->asExtension('FormController')->create();
    }

    public function update($id)
    {
        $this->bodyClass = 'compact-container';
        $this->asExtension('FormController')->update($id);
    }
}
