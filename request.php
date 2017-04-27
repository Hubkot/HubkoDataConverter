<?php 
use Converter\Converter\Converter;
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $file = $_FILES;
    $convertTo = $_POST['convertTo'];
    $uploadFileExt = pathinfo($file['uploadFile']['name'], PATHINFO_EXTENSION);
    $uploadFile = file_get_contents($file['uploadFile']['tmp_name']);
    echo 'Załadowano plik z roszerzeniem: <h1>',$uploadFileExt,'</h1>';
    echo 'Wybrano jako format wyjściowy: <h2>'.$convertTo.'</h2>';

    if($uploadFileExt !== $convertTo){
        $fileToConvert = new Converter($uploadFile, $uploadFileExt);
        $conva = $fileToConvert->decodeData($uploadFile);
        $encoded = $fileToConvert->encodeData($convertTo);
        $fileToConvert->saveToFile($file['uploadFile']['name'], $convertTo);
    }
    elseif($uploadFileExt === $convertTo)
    {
        throw new Exception('Plik już jest zapisany w podanym formacie. Wybierz inny format wyjściowy');
    }
    else{throw new Exception('Wykryto nieznany błąd');}
     

} 
;?>