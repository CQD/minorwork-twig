<?php

namespace MinorWork\View;

use Twig_Loader_Filesystem as FileLoader;
use Twig_Environment as Twig;

class TwigView
{
    private $template = '';
    private $params = [];
    private $basePath = null;
    private $twig = null;
    private $twigOptions = [];

    /**
     * Prepare to render result
     *
     * The framework will call `toString()` to get rendered result.
     *
     * @param string $template
     * @param string $params
     */
    public function prepare($template, $params = [])
    {
        $this->template = $template;
        $this->params = $params;
    }

    /**
     * Set base path for Twig to load templates
     *
     * @params string $basePath
     */
    public function basePath($basePath)
    {
        $this->basePath = $basePath;
        $this->twig = null;
    }

    /**
     * Set options to pass to twig
     *
     * @param array $options
     */
    public function options($options)
    {
        $this->twigOptions = $options;
        $this->twig = null;
    }

    /**
     * Actually render the template
     * @return string rendered result
     */
    public function __toString()
    {
        if (!$this->template) {
            return '';
        }

        $this->twig = $this->twig ?: new Twig(new FileLoader($this->basePath), $this->twigOptions);

        return $this->twig->render($this->template, $this->params);
    }
}
