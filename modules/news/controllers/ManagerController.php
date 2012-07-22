<?php

class News_ManagerController extends Application_Controllers_Action
{
    public function addAction() {
        //$this->requireAdmin();

        $request = $this->getRequest();

        $form = new News_Form_Write();

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                $title = $form->getElement('title')->getValue();
                $text = $form->getElement('text')->getValue();

                $model_news = new News();
                $new = $model_news->createRow();

                $new->title = $title;
                $new->text = $text;
                $new->author = $this->user->ident;
                $new->tsregister = time();
                $new->save();

                $this->_helper->flashMessenger->addMessage('Mensaje agregado');
//                $this->_helper->flashMessenger->addMessage(array(
//                    'pwd' => '/',
//                    'cmd' => 'sh crear_noticia.sh',
//                    'user' => $this->user->username,
//                    'message' => str_pad('Registrando noticia ', 99, '.', STR_PAD_RIGHT) . '<span class="bold green">[OK]</span><br />',
//                ));
                $this->_helper->redirector('index', 'index', 'frontpage');
            }
        }

        $this->view->form = $form;
    }
}