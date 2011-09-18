<?php

class News_New extends Zend_Db_Table_Row_Abstract
{
    public function getAuthor() {
        $model_users = new Users();
        return $model_users->findByIdent($this->author);
    }
}
