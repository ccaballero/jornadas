<?php

class Exhibitions_Form_Write extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $title = $this->createElement('text', 'title');
        $title->setRequired(true)
              ->setLabel('Titulo')
              ->setAttrib('class', 'focus')
              ->addFilter('StringTrim')
              ->addFilter('StripTags')
              ->addValidator('StringLength', false, array(1, 128));

        $exhibitor = $this->createElement('select', 'exhibitor');
        $exhibitor->setRequired(true)
                  ->setLabel('Expositor');
        
        $abstract = $this->createElement('textarea', 'abstract');
        $abstract->setRequired(false)
                 ->setLabel('Descripción')
                 ->addFilter('StringTrim');

        $this->addElement($title);
        $this->addElement($exhibitor);
        $this->addElement($abstract);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setExhibition($exhibition) {
        $this->getElement('title')->setValue($exhibition->title);
        $this->getElement('abstract')->setValue($exhibition->abstract);
    }

    public function setExhibitors($exhibitors) {
        $element = $this->getElement('exhibitor');

        $element->addMultiOption(-1, 'Seleccione expositor:');
        foreach ($exhibitors as $exhibitor) {
            $element->addMultiOption($exhibitor->ident, $exhibitor->getFullName());
        }
    }
}
