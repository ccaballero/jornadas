<?php

class News_NewController extends Application_Controllers_Action
{
    public function editAction() {
        $this->requireAdmin();

        $request = $this->getRequest();
        $ident = $request->getParam('new');

        $model_news = new News();
        $new = $model_news->findByIdent($ident);

        if ($new->author <> $this->user->ident) {
//            $this->_helper->flashMessenger->addMessage(array(
//                'only_message' => true,
//                'message' => 'Tu debes ser el autor de la noticia para editarla.',
//            ));
            $this->_helper->flashMessenger->addMessage('Tu debes ser el autor de la noticia para editarla.');
            $this->_helper->redirector('index', 'index', 'frontpage');
        }

        $form = new News_Form_Write();
        $form->setNew($new);

        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {

                $title = $form->getElement('title')->getValue();
                $text = $form->getElement('text')->getValue();

                $new->title = $title;
                $new->text = $text;
                $new->author = $this->user->ident;
                $new->save();

                $this->_helper->flashMessenger->addMessage('Mensaje editado');
//                $this->_helper->flashMessenger->addMessage(array(
//                    'pwd' => '/',
//                    'cmd' => 'sh editar_noticia.sh ' . $new->ident,
//                    'user' => $this->user->username,
//                    'message' => str_pad('Actualizando noticia ', 99, '.', STR_PAD_RIGHT) . '<span class="bold green">[OK]</span><br />',
//                ));
                $this->_helper->redirector('index', 'index', 'frontpage');
            }
        }

        $this->view->form = $form;
    }

    public function deleteAction() {
        $this->requireAdmin();

        $request = $this->getRequest();
        $ident = $request->getParam('new');

        $model_news = new News();
        $new = $model_news->findByIdent($ident);

        if ($new->author <> $this->user->ident) {
//            $this->_helper->flashMessenger->addMessage(array(
//                'only_message' => true,
//                'message' => 'Tu debes ser el autor de la noticia para editarla.',
//            ));
            $this->_helper->flashMessenger->addMessage('Tu debes ser el autor de la noticia para eliminarla.');
            $this->_helper->redirector('index', 'index', 'frontpage');
        }

        if ($request->isPost()) {
            $new->delete();

            $this->_helper->flashMessenger->addMessage('Mensaje eliminado');
//                $this->_helper->flashMessenger->addMessage(array(
//                    'pwd' => '/',
//                    'cmd' => 'sh editar_noticia.sh ' . $new->ident,
//                    'user' => $this->user->username,
//                    'message' => str_pad('Actualizando noticia ', 99, '.', STR_PAD_RIGHT) . '<span class="bold green">[OK]</span><br />',
//                ));
        }

        $this->_helper->redirector('index', 'index', 'frontpage');
    }
}
