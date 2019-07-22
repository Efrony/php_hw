<?php

namespace app\controllers;

abstract class Controller
{
    private $action;
    private $defaultAction = 'default';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo 'no method';
        }
    }

    public function render($template, array $paramsContent = [])
    {
        if ($this->useLayout) {
            $layout = $this->layout;
            $isAuth = false;
            $inLayout = $this->renderTemplates(LAYOUTS_DIR . $layout, [
                'header' => $this->renderTemplates('header', ['isAuth' => $isAuth]),
                'menu' => $this->renderTemplates('menu'),
                'content' => $this->renderTemplates($template, $paramsContent),
                'footer' => $this->renderTemplates('footer'),
            ]);
            return $inLayout;
        } else {
            return $this->renderTemplates($template, $params = []);
        }
    }

    public function renderTemplates($template, $params = [])
    {
        extract($params);
        $filename = TEMPLATES_DIR . "{$template}.php";
        ob_start();
        if (file_exists($filename)) {
            include $filename;
        } else {
            echo 'no template';
        }
        return ob_get_clean();
    }
}
