<?php

class Exhibitions_ManagerController extends Application_Controllers_Action
{
    public function addAction() {
        $this->acl('exhibitions:add');

        $form = new News_Form_Write();
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $title = $form->getElement('title')->getValue();
                $text = $form->getElement('text')->getValue();

                $model_news = new News();
                $new = $model_news->createRow();

                $new->title = $title;
                $new->text = $text;
                $new->author = $this->user->ident;
                $new->tsmodified = time();
                $new->tsregister = time();
                $new->save();

                $this->_helper->flashMessenger->addMessage('Mensaje agregado');
                $this->_helper->redirector('index', 'index', 'frontpage');
            }
        }

        $this->view->form = $form;
    }
}