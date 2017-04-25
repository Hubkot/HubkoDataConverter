<?php

/**
 * Description of CSV
 *
 * @author hubert
 */
class CSV implements ConvertInterface {
    
     public function convert($file) {
        echo 'JESTEM INSTANCJĄ KLASY CSV i pracuję na pliku: ',$file;
    }

    public function readFile() {
        
    }

}
