<?php

class News_New extends Zend_Db_Table_Row_Abstract
{
    public function getAuthor() {
        $model_users = new Users();
        $user = $model_users->findByIdent($this->author);
        if (!empty($user)) {
            return $user;
        }
        
        return new Users_Guest();
    }
}
