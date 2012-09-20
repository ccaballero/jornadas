<?php

class Exhibitions_ManagerController extends Application_Controllers_Action
{
    public function addAction() {
        $this->acl('exhibitions:add');

        $model_users = new Users();
        
        $form = new Exhibitions_Form_Write();
        $form->setExhibitors($model_users->fetchAll());
        
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $title = $form->getElement('title')->getValue();
                $exhibitor = $form->getElement('exhibitor')->getValue();
                $abstract = $form->getElement('abstract')->getValue();

                $convert = new Application_Views_Helpers_Convert();

                $model_exhibitions = new Exhibitions();
                $exhibition = $model_exhibitions->createRow();

                $exhibition->title = $title;
                $exhibition->url = $convert->convert($exhibition->title);
                $exhibition->abstract = $abstract;
                $exhibition->tsregister = time();
                $exhibition->save();

                $model_exhibitions_users = new Exhibitions_Users();
                $exhibition_user = $model_exhibitions_users->createRow();

                $exhibition_user->exhibition = $exhibition->ident;
                $exhibition_user->user = $exhibitor;
                $exhibition_user->save();

                $this->_helper->flashMessenger->addMessage('Exposición agregada');
                $this->_helper->redirector('index', 'index', 'exhibitions');
            }
        }

        $this->view->form = $form;
    }
}
