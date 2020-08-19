<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Chapter;

class ChapterDAO extends DAO
{
    private function buildObject($row)
    {
        $chapter = new Chapter();
        $chapter->setId($row['id']);
        $chapter->setTitle($row['title']);
        $chapter->setContent($row['content']);
        $chapter->setAuthor($row['author']);
        $chapter->setCreatedAt($row['createdAt']);
        return $chapter;
    }

    public function getChapters()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM chapter ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $chapters = [];
        foreach ($result as $row){
            $chapterId = $row['id'];
            $chapters[$chapterId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $chapters;
    }

    public function getChapter($chapterId)
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM chapter WHERE id = ?';
        $result = $this->createQuery($sql, [$chapterId]);
        $chapter = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($chapter);
    }

    public function addChapter(Parameter $post)
    {
        $sql = 'INSERT INTO chapter (title, content, author, createdAt) VALUES (?, ?, ?, NOW())';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $post->get('author')]);
    }

    public function editChapter(Parameter $post, $chapterId)
    {
        $sql = 'UPDATE chapter SET title=:title, content=:content, author=:author WHERE id=:chapterId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'author' => $post->get('author'),
            'chapterId' => $chapterId
        ]);
    }

    public function deleteChapter($chapterId)
    {
        $sql = 'DELETE FROM chapter WHERE id = ?';
        $this->createQuery($sql, [$chapterId]);
    }
}