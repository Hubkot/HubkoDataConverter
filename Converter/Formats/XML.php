<?php

/**
 * Description of XML
 *
 * @author hubert
 */
class XML implements ConvertInterface{
    //put your code here

    public function convert($file) {
        echo 'JESTEM INSTANCJĄ KLASY XML i pracuję na pliku: ','<pre>', print_r($file),'</pre>';
    }

    public function readFile() {
        echo 'Czytam plik ... <br />';
        $xml = simplexml_load_file();
    }

}
