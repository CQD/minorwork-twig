<?php

namespace MinorWork\View;

use PHPUnit\Framework\TestCase;
use MinorWork\App;

class TwigViewTest extends TestCase
{
    public function testTwig()
    {
        $app = new App();
        $app->view = '\MinorWork\View\TwigView';

        $app->view->basePath(dirname(__FILE__));
        $app->view->prepare('test.twig', ['job' => 'Doctor', 'not_my_job' => 'magician']);

        $this->assertEquals("I am a Doctor, not a magician!\n", (string) $app->view);
    }

    public function testTemplateNotSet()
    {
        $app = new App();
        $app->view = '\MinorWork\View\TwigView';
        $this->assertEquals("", (string) $app->view);
    }
}
