<?php namespace dales\core;

class Controller
{

    protected $controller;
    protected $model;
    protected $action;
    protected $extended_action;
    protected $template;
    public $doNotRenderHeader;
    public $render;

    public function __construct($controller, $action, $extended_action, $model)
    {
        $this->action            = $action;
        $this->controller        = $controller;
        $this->model             = $model;
        $this->doNotRenderHeader = 0;
        $this->render            = 1;
        $this->extended_action   = $extended_action;
        $this->view          = new View($controller, $action);
    }

    public function set($key, $value)
    {
        $this->view->set($key, $value);
    }

    public function __destruct()
    {
        if ($this->render) {
            $this->view->render($this->doNotRenderHeader);
        }
    }
}
