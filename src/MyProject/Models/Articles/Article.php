<?php 

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Comments\Comment;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    public function getAuthor(): ?User
    {
        if ($this->authorId === null) {
            return null;
        }
        return User::getById($this->authorId);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function getComments(): array
    {
        return Comment::findByColumn('article_id', $this->id);
    }

    public function getCommentsCount(): int
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT COUNT(*) as count FROM `' . Comment::getTableName() . '` WHERE article_id = :articleId;',
            [':articleId' => $this->id]
        );
        return $result[0]->count ?? 0;
    }
}