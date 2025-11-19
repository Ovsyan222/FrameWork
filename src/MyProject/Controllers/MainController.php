<?php

    namespace MyProject\Controllers;

    use MyProject\View\View;

    class MainController
    {
        private $view;

        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../../templates');
        }

        public function main()
        {
            $articles = [
                ['name' => 'Cтатья 1', 'text' => 'Текст статьи 1'],
                ['name' => 'Cтатья 2', 'text' => 'Текст статьи 2'],
                ['name' => 'Cтатья 3', 'text' => 'Текст статьи 3'],
            ];

            $this->view->renderHtml('main/main.php', ['articles' => $articles]);
        }

        public function sayHello(string $name)
        {
            $this->view->renderHtml('main/hello.php', ['name' => $name]);
        }
    }