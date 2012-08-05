<?php

class News_NewController extends Application_Controllers_Action
{
    public function viewAction() {
        $model_news = new News();
        $new = $model_news->findByIdent($this->request->getParam('new'));

        if (empty($new)) {
            $this->_helper->flashMessenger->addMessage('No existe tal noticia.');
            $this->_helper->redirector('index', 'index', 'frontpage');
        }
        
        $this->view->new = $new;
        $this->view->author = $new->getAuthor();
    }

    public function editAction() {
        $this->acl('new:add');

        $model_news = new News();
        $new = $model_news->findByIdent($this->request->getParam('new'));

        if ($new->author <> $this->user->ident) {
            $this->_helper->flashMessenger->addMessage('Tu debes ser el autor de la noticia para editarla.');
            $this->_helper->redirector('index', 'index', 'frontpage');
        }

        $form = new News_Form_Write();
        $form->setNew($new);

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $title = $form->getElement('title')->getValue();
                $text = $form->getElement('text')->getValue();

                $new->title = $title;
                $new->text = $text;
                $new->author = $this->user->ident;
                $new->tsmodified = time();
                $new->save();

                $this->_helper->flashMessenger->addMessage('Mensaje editado');
                $this->_helper->redirector('index', 'index', 'frontpage');
            }
        }

        $this->view->form = $form;
    }

    public function deleteAction() {
        $this->acl('new:add');

        $model_news = new News();
        $new = $model_news->findByIdent($this->request->getParam('new'));

        if ($new->author <> $this->user->ident) {
            $this->_helper->flashMessenger->addMessage('Tu debes ser el autor de la noticia para eliminarla.');
            $this->_helper->redirector('index', 'index', 'frontpage');
        }

        if ($this->request->isPost()) {
            $new->delete();

            $this->_helper->flashMessenger->addMessage('Mensaje eliminado');
        }

        $this->_helper->redirector('index', 'index', 'frontpage');
    }
}
