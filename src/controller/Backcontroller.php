<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function administration()
    {
        $chapters = $this->chapterDAO->getChapters();
        $comments = $this->commentDAO->getFlagComments();
        return $this->view->render('administration', [
            'chapters' => $chapters,
            'comments' => $comments
        ]);
    }
    public function addChapter(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Chapter');
            if(!$errors) {
                $this->chapterDAO->addChapter($post, $this->session->get('id'));
                $this->session->set('add_chapter', 'Le nouveau chapitre a bien été ajouté');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('add_chapter', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_chapter');
    }

    public function editChapter(Parameter $post, $chapterId)
    {
        $chapter = $this->chapterDAO->getChapter($chapterId);
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Chapter');
            if(!$errors) {
                $this->chapterDAO->editChapter($post, $chapterId, $this->session->get('id'));
                $this->session->set('edit_chapter', 'Le chapitre a bien été modifié');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('edit_chapter', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        $post->set('id', $chapter->getId());
        $post->set('title', $chapter->getTitle());
        $post->set('content', $chapter->getContent());
        $post->set('author', $chapter->getAuthor());

        return $this->view->render('edit_chapter', [
            'post' => $post
        ]);
    }

    public function deleteChapter($chapterId)
    {
        $this->chapterDAO->deleteChapter($chapterId);
        $this->session->set('delete_chapter', 'Le chapitre a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../public/index.php?route=administration');
    }

    public function deleteComment($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    public function profile()
    {
        return $this->view->render('profile');
    }

    public function updatePassword(Parameter $post)
    {
        if($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
        }
        return $this->view->render('update_password');
    }

    public function logout()
    {
        $this->logoutOrDelete('logout');
    }

    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }
}
