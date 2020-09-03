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
        $chapter->setAuthor($row['pseudo']);
        $chapter->setCreatedAt($row['createdAt']);
        return $chapter;
    }

    public function getChapters()
    {
        $sql = 'SELECT chapter.id, chapter.title, chapter.content, user.pseudo, chapter.createdAt FROM chapter INNER JOIN user ON chapter.user_id = user.id ORDER BY chapter.id DESC';
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
        $sql = 'SELECT chapter.id, chapter.title, chapter.content, user.pseudo, chapter.createdAt FROM chapter INNER JOIN user ON chapter.user_id = user.id ORDER BY chapter.id DESC';
        $result = $this->createQuery($sql, [$chapterId]);
        $chapter = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($chapter);
    }

    public function addChapter(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO chapter (title, content, createdAt, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $userId]);
    }

    public function editChapter(Parameter $post, $chapterId, $userId)
    {
        $sql = 'UPDATE chapter SET title=:title, content=:content, user_id=:user_id WHERE id=:chapterId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'user_id' => $userId,
            'chapterId' => $chapterId
        ]);
    }

    public function deleteChapter($chapterId)
    {
        $sql = 'DELETE FROM comment WHERE chapter_id = ?';
        $this->createQuery($sql, [$chapterId]);
        $sql = 'DELETE FROM chapter WHERE id = ?';
        $this->createQuery($sql, [$chapterId]);
    }
}