<?php

    namespace MyProject\Controllers;

    use MyProject\Models\Articles\Article;
    use MyProject\Models\Users\User;

    class ArticlesController extends AbstractController
    {
        public function view(int $articleId)
        {
            $article = Article::getById($articleId);

            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            
            // Получаем комментарии для этой статьи
            $comments = $article->getComments();
            
            $this->view->renderHtml('articles/view.php', [
                'article' => $article,
                'comments' => $comments
            ]);
        }

        public function quickEdit(int $articleId): void
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
            
            echo "Статья быстро отредактирована!";
        }

        public function add(): void
        {
            if ($this->user === null) {
                throw new UnauthorizedException('Для добавления статьи необходимо авторизоваться');
            }

            if (!empty($_POST)) {
                try {
                    if (empty($_POST['name'])) {
                        throw new InvalidArgumentException('Не передано название статьи');
                    }
                    
                    if (empty($_POST['text'])) {
                        throw new InvalidArgumentException('Не передан текст статьи');
                    }

                    $article = new Article();
                    $article->setAuthor($this->user);
                    $article->setName($_POST['name']);
                    $article->setText($_POST['text']);
                    $article->createdAt = date('Y-m-d H:i:s');
                    $article->save();

                    // Редирект на страницу статьи вместо var_dump
                    header('Location: /FrameWork/www/articles/' . $article->getId());
                    exit();
                    
                } catch (InvalidArgumentException $e) {
                    $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                    return;
                }
            }

            $this->view->renderHtml('articles/add.php');
        }

        public function edit(int $articleId): void
        {
            $article = Article::getById($articleId);

            if ($article === null) {
                throw new NotFoundException('Статья не найдена');
            }

            if ($this->user === null) {
                throw new UnauthorizedException('Для редактирования статьи необходимо авторизоваться');
            }

            // Проверяем, что пользователь является автором статьи или администратором
            if ($article->getAuthor()->getId() !== $this->user->getId() && !$this->user->isAdmin()) {
                throw new UnauthorizedException('Вы можете редактировать только свои статьи');
            }

            if (!empty($_POST)) {
                try {
                    if (empty($_POST['name'])) {
                        throw new InvalidArgumentException('Не передано название статьи');
                    }
                    
                    if (empty($_POST['text'])) {
                        throw new InvalidArgumentException('Не передан текст статьи');
                    }
                    
                    $article->setName($_POST['name']);
                    $article->setText($_POST['text']);
                    $article->save();

                    header('Location: /FrameWork/www/articles/' . $article->getId());
                    exit();
                } catch (InvalidArgumentException $e) {
                    $this->view->renderHtml('articles/edit.php', [
                        'article' => $article,
                        'error' => $e->getMessage()
                    ]);
                    return;
                }
            }

            $this->view->renderHtml('articles/edit.php', ['article' => $article]);
        }

        public function delete(int $articleId): void
        {
            $article = Article::getById($articleId);

            if ($article === null) {
                throw new NotFoundException('Статья не найдена');
            }

            if ($this->user === null) {
                throw new UnauthorizedException('Для удаления статьи необходимо авторизоваться');
            }

            // Проверяем, что пользователь является автором статьи или администратором
            if ($article->getAuthor()->getId() !== $this->user->getId() && !$this->user->isAdmin()) {
                throw new UnauthorizedException('Вы можете удалять только свои статьи');
            }

            $article->delete();

            header('Location: /FrameWork/www/');
            exit();
        }
    }