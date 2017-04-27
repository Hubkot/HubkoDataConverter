<?php
namespace Converter;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

/**
 * Description of Converter
 * Klasa obługująca konwersję plików do innych formatów
 * W celu rozszerzenia możliwości o kolejne formaty należy:
 * do instrukcji warunkowej switch w metodach decode()/encode() konwertery nowych formatów.
 * 
 * @author hubert
 */

class Converter{
    
    private $dataIn;
    private $dataDecoded;
    private $dataEncoded;
    private $fileExtension;
    
    public function __construct($data,$extension) {
        $this->dataIn = $data;
        $this->fileExtension = $extension;
    }
    
    public function getDataIn(){
        return $this->dataIn;
    }
    public function getDataDecoded(){
        return $this->dataDecoded;
    }
    public function getDataEncoded(){
        return $this->dataEncoded;
    }
    public function getFileExtension(){
        return $this->fileExtension;
    }
    
    /**
     * Decodes the the file data and return array[$data]
     * @param type $extension of the uploaded file
     * @return array
     */
    public function decodeData($extension)
    {
        switch ($this->fileExtension)
        {
            case 'xml':
                $xmlEncoder = new XmlEncoder();
                $this->dataDecoded = $xmlEncoder->decode($this->dataIn, $this->fileExtension);
                break;
            case 'json':
                $jsonEncoder = new JsonEncoder();
                $this->dataDecoded = $jsonEncoder->decode($this->dataIn, $this->fileExtension);
                break;
            case 'csv':
                $csvEncoder = new CsvEncoder();
                $this->dataDecoded = $csvEncoder->decode($this->dataIn, $this->fileExtension);
                break;
        }
        return $this->dataDecoded;
    }
    /**
     * Encode the array[$data] into $format type
     * @param string $format //one of the listed in switch condition
     * @return encoded Data
     */
    public function encodeData($format)
    {
        switch ($format)
        {
            case 'xml':
                $xmlEncoder = new XmlEncoder();
                $this->dataEncoded = $xmlEncoder->encode($this->dataDecoded, $format);
                break;
            case 'json':
                $jsonEncoder = new JsonEncoder();
                $this->dataEncoded = $jsonEncoder->encode($this->dataDecoded, $format);
                break;
             case 'csv':
                $csvEncoder = new CsvEncoder();
                $this->dataEncoded = $csvEncoder->encode($this->dataDecoded, $format);
                break;
            }
            return $this->dataEncoded;
    }
    /**
     * Saves data into the file 
     * @param type $convertTo is the extension of the saved file
     * @return 
     */
    public function saveToFile($filename,$convertTo)
    {
        $encodedFile = fopen('./web/'.$filename.'.'.$convertTo, 'w');
        fwrite($encodedFile,$this->dataEncoded);
        fclose($encodedFile);
        return;
    }
    public function saveWithLongPathName($pathName,$convertTo)
    {
        $filename = end(explode('/', $pathName));
        $encodedFile = fopen('./web/'.$filename.'.'.$convertTo, 'w');
        fwrite($encodedFile,$this->dataEncoded);
        fclose($encodedFile);
        return;
    }

}
