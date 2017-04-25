<?php

/**
 * Description of Converter
 *
 * @author hubert
 */
include 'ConvertInterface.php';
include 'Formats/CSV.php';
include 'Formats/XML.php';
include 'Formats/JSON.php';

class Converter{
    
    private $data;
    public function __construct($data) {
        $this->data = $data;
#        $this->toFormat = $toFormat;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function convert($convertTo){
         switch ($convertTo)
            {
                case 'xml':
                    $newFile = '<zapisane_dane_w_XML>';
                    return $newFile;
                    break;
                
                case 'json':
                    $newFile = json_encode($this->data);
                    return $newFile;
                    break;
                
                 case 'csv':
                    $view = new CSV($file);
                    $view->convert($file);
                    #print_r($view->getService());
                    break;
            }
    }

}
