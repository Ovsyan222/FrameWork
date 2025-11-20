<?php

namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\Models\Articles\Article;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;

class CommentsController extends AbstractController
{
    public function add(int $articleId): void
    {
        $article = Article::getById($articleId);
        
        if ($article === null) {
            throw new NotFoundException('Статья не найдена');
        }

        if ($this->user === null) {
            throw new UnauthorizedException('Для добавления комментария необходимо авторизоваться');
        }

        if (!empty($_POST)) {
            try {
                $comment = new Comment();
                $comment->setAuthor($this->user);
                $comment->setArticle($article);
                $comment->setText($_POST['text']);
                $comment->createdAt = date('Y-m-d H:i:s');
                
                $comment->save();

                header('Location: /FrameWork/www/articles/' . $articleId . '#comment' . $comment->getId());
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/view.php', [
                    'article' => $article,
                    'error' => $e->getMessage(),
                    'comments' => $article->getComments()
                ]);
                return;
            }
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'comments' => $article->getComments()
        ]);
    }

    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        
        if ($comment === null) {
            throw new NotFoundException('Комментарий не найден');
        }

        if ($this->user === null) {
            throw new UnauthorizedException('Для редактирования комментария необходимо авторизоваться');
        }

        // Проверяем, что пользователь является автором комментария
        if ($comment->getAuthor()->getId() !== $this->user->getId()) {
            throw new UnauthorizedException('Вы можете редактировать только свои комментарии');
        }

        if (!empty($_POST)) {
            try {
                $comment->setText($_POST['text']);
                $comment->save();

                header('Location: /FrameWork/www/articles/' . $comment->getArticle()->getId() . '#comment' . $comment->getId());
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', [
                    'comment' => $comment,
                    'error' => $e->getMessage()
                ]);
                return;
            }
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}