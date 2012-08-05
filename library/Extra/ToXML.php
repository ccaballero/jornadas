<?php

class Extra_ToXML
{
    private $_dom = null;
    private $_root = 'service';

    public function  __construct($root = null) {
        $implementation = new DOMImplementation();

        $this->_dom = $implementation->createDocument('', '');
        $this->_dom->version = '1.0';
        $this->_dom->encoding = 'utf-8';

        if (!empty($root)) {
            $this->_root = $root;
        }
    }

//  $key = preg_replace('/[^a-z]/i', '', $key);
    public function toDOM($content, $parent) {
        if (is_array($content)) {
            $element = $this->_dom->createElement($parent);
            foreach ($content as $key => $value) {
                if (is_numeric($key)) {
                    $key = 'item';
                }

                $element->appendChild($this->toDOM($value, $key));
            }
        } else if (is_object($content)) {
            $element = $this->_dom->createElement($parent);
            $reflect = new ReflectionObject($content);

            $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($properties as $property) {
                $element->appendChild($this->toDOM($property->getValue($content), $property->getName()));
            }
        } else {
            $element = $this->_dom->createElement($parent, $content);
        }
        
        return $element;
    }

    public function toXML($content) {
        $this->_dom->appendChild($this->toDOM($content, $this->_root));
        return $this->_dom->saveXML();

    }
}
