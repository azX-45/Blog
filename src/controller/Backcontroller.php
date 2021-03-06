<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    private function checkLoggedIn()
    {
        if (!$this->session->get('pseudo')) {
            $this->session->set('need_login', '');
            header('Location: ../index.php?route=login');
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if (!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', '');
            header('Location: ../index.php?route=profile');
        } else {
            return true;
        }
    }
    public function administration()
    {
        if ($this->checkAdmin()) {
            $chapters = $this->chapterDAO->getChapters();
            $comments = $this->commentDAO->getFlagComments();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'chapters' => $chapters,
                'comments' => $comments,
                'users' => $users
            ]);
        }
    }
    public function addChapter(Parameter $post)
    {
        if ($this->checkAdmin()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Chapter');
                if (!$errors) {
                    $this->chapterDAO->addChapter($post, $this->session->get('id'));
                    $this->session->set('add_chapter', 'Le nouveau chapitre a bien été ajouté');
                    header('Location: ../index.php?route=administration');
                }
                return $this->view->render('add_chapter', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_chapter');
        }
    }

    public function editChapter(Parameter $post, $chapterId)
    {
        if ($this->checkAdmin()) {
            $chapter = $this->chapterDAO->getChapter($chapterId);
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Chapter');
                if (!$errors) {
                    $this->chapterDAO->editChapter($post, $chapterId, $this->session->get('id'));
                    $this->session->set('edit_chapter', 'Le chapitre a bien été modifié');
                    header('Location: ../index.php?route=administration');
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
    }

    public function deleteChapter($chapterId)
    {
        if ($this->checkAdmin()) {
            $this->chapterDAO->deleteChapter($chapterId);
            $this->session->set('delete_chapter', 'Le chapitre a bien été supprimé');
            header('Location: ../index.php?route=administration');
        }
    }

    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../index.php?route=administration');
    }

    public function deleteComment($commentId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->deleteComment($commentId);
            $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
            header('Location: ../index.php?route=administration');
        }
    }

    public function profile()
    {
        if ($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
                $this->session->set('update_password', 'Le mot de passe a été mis à jour');
                header('Location: ../index.php?route=profile');
            }
            return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->logoutOrDelete('logout');
        }
    }


    public function deleteAccount()
    {
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteAccount($this->session->get('pseudo'));
            $this->logoutOrDelete('delete_account');
        }
    }

    public function deleteUser($userId)
    {
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
            header('Location: ../index.php?route=administration');
        }
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->set($param, '');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../index.php');
    }
}
