<?php

    namespace MyProject\Controllers;

    use MyProject\Models\Articles\Article;
    use MyProject\Models\Users\User;
    use MyProject\View\View;

    class ArticlesController
    {
        private $view;

        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../../templates');
        }

        public function view(int $articleId)
        {
            $article = Article::getById($articleId);

            // $reflector = new \ReflectionObject($article);
            // $properties = $reflector->getProperties();
            // $propertiesNames = [];
            // foreach ($properties as $property) {
            //     $propertiesNames[] = $property->getName();
            // }
            // var_dump($properties);
            // return;

            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            
            $this->view->renderHtml('articles/view.php', ['article' => $article]);

        }

        public function edit(int $articleId): void
        {
            /** @var Article $article */
            $article = Article::getById($articleId);

            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }

            $article->setName('Новое название статьи');
            $article->setText('Новый текст статьи');

            $article->save();
        }

        public function add(): void
        {
            $author = User::getById(1);
            $article = new Article();
            $article->setAuthor($author);
            $article->setName('Новое название статьи');
            $article->setText('Новый текст статьи');

            $article->save();

            var_dump($article);
        }
    }