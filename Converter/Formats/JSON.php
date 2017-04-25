<?php

/**
 * Description of JSON
 *
 * @author hubert
 */
class JSON implements ConvertInterface{
    
    public function convert($file) {
        echo 'JESTEM INSTANCJĄ KLASY JSON i pracuję na pliku: ',$file;
    }

    public function readFile() {
        
    }

}
