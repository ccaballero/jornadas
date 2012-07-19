<?php

class News_Form_Write extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $title = $this->createElement('text', 'title');
        $title->setRequired(true)
                ->setLabel('Titulo:')
                ->setAttrib('class', 'focus')
                ->addFilter('StringTrim')
                ->addFilter('StripTags')
                ->addValidator('StringLength', false, array(1, 512));

        $text = $this->createElement('textarea', 'text');
        $text->setRequired(false)
              ->setLabel('Texto:')
              ->addFilter('StringTrim')
              ->addValidator('StringLength', false, array(1, 1024 * 3));

        $this->addElement($title);
        $this->addElement($text);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setNew($new) {
        $this->getElement('title')->setValue($new->title);
        $this->getElement('text')->setValue($new->text);
    }
}
