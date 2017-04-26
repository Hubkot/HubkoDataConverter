<?php

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
require __DIR__ . '/vendor/autoload.php';

require 'Converter/Converter.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="uploadFile">
            <input type="radio" required="true" name="convertTo" value="xml"> XML
            <input type="radio" required="true" name="convertTo" value="json"> JSON
            <input type="radio" required="true" name="convertTo" value="csv"> CSV
            <br />
            <input type="submit">
        </form>
        
        <?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $file = $_FILES;
            #var_dump($_FILES);
            $uploads_dir = '/var/www/html/converter/upload';
            $convertTo = $_POST['convertTo'];
            //WALIDACJA
            $file = $_FILES;
            #$plikXML = simplexml_load_file($file['uploadFile']['tmp_name']);
            $uploadFileExt = pathinfo($file['uploadFile']['name'], PATHINFO_EXTENSION);
            $uploadFile = file_get_contents($file['uploadFile']['tmp_name']);
            echo '<h1>Załadowano plik z roszerzeniem',$uploadFileExt,'</h1>';
            echo '<h2>Wybrano jako format wyjściowy: '.$convertTo.'</h2>';
            
//Czyta plik
            switch ($uploadFileExt)
            {
                case 'xml':
                       $decoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizer = array(new ObjectNormalizer());
             $plik = new Serializer($normalizer, $decoders);
             
                    $xmlDecoder = new XmlEncoder();
                    $jsonDecoder = new JsonEncoder();
                    $csvDecoder = new CsvEncoder();
                    $fileDecoded = $xmlDecoder->decode($uploadFile, 'xml');
                    $file_return = $jsonDecoder->encode($fileDecoded, 'json');
                    $file_return2 = $csvDecoder->encode($fileDecoded, 'csv');
 #                   echo '<pre>', print_r($jsonDecoder->decode($uploadFile, 'xml')),'</pre>';
                    echo '<pre>', print_r($xmlDecoder->decode($uploadFile, 'xml')),'</pre>';
                    echo '<pre>', print_r($file_return),'</pre>';
                    echo '<pre>', print_r($file_return2),'</pre>';
                    echo 'Line by line 1';
                    #print_r($uploadFile);
                    echo '<br/>--------</br>';
                    echo 'Line by line 3';
                   
                case 'json':
                       $decoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizer = array(new ObjectNormalizer());
             $plik = new Serializer($normalizer, $decoders);
             
                    $xmlDecoder = new XmlEncoder();
                    $jsonDecoder = new JsonEncoder();
                    $csvDecoder = new CsvEncoder();
                    print_r($uploadFile);
                    $fileDecoded = $jsonDecoder->decode($uploadFile, 'json');
                    print_r($fileDecoded);
                    $file_return = $xmlDecoder->encode($fileDecoded, 'xml');
                     $przemieniony = fopen('przemieniony.xml', 'w');
                    fwrite($przemieniony, $file_return);
                    $file_return2 = $csvDecoder->encode($fileDecoded, 'csv');
 #                   echo '<pre>', print_r($jsonDecoder->decode($uploadFile, 'xml')),'</pre>';
#                   echo '<pre>', $file_return,'</pre>';
                    echo '<pre>', $file_return2,'</pre>';
                   
                    echo 'Line by line 1';
                    #print_r($uploadFile);
                    echo '<br/>--------</br>';
                    echo 'Line by line 3';
                case 'csv':
                       $decoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizer = array(new ObjectNormalizer());
             $plik = new Serializer($normalizer, $decoders);
             
                    $xmlDecoder = new XmlEncoder();
                    $jsonDecoder = new JsonEncoder();
                    $csvDecoder = new CsvEncoder();
                    $fileDecoded = $csvDecoder->decode($uploadFile, 'csv');
                    $file_return = $jsonDecoder->encode($fileDecoded, 'json');
                    $file_return2 = $xmlDecoder->encode($fileDecoded, 'xml');
 #                   echo '<pre>', print_r($jsonDecoder->decode($uploadFile, 'xml')),'</pre>';
                     $przemieniony = fopen('przemieniony.json', 'w');
                    fwrite($przemieniony, $file_return);
                    echo '<pre>', print_r($file_return),'</pre>';
                    echo '<pre>', print_r($file_return2),'</pre>';
                    echo 'Line by line 1';
                    #print_r($uploadFile);
                    echo '<br/>--------</br>';
                    echo 'Line by line 3';
        }
} 
        #move_uploaded_file($tmp_name, "$uploads_dir/$name");
        ;?>
    </body>
</html>