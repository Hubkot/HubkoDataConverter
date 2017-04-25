<?php
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
            var_dump($_FILES);
            $uploads_dir = '/var/www/html/converter/upload';
            
            //WALIDACJA
            $file = $_FILES;
            #$plikXML = simplexml_load_file($file['uploadFile']['tmp_name']);
            $uploadFileExt = pathinfo($file['uploadFile']['name'], PATHINFO_EXTENSION);
            echo '<h1>',$uploadFileExt,'</h1>';
            

//Czyta plik
            switch ($uploadFileExt)
            {
                case 'xml':
                    echo '<pre>', print_r(simplexml_load_file($file['uploadFile']['tmp_name'])),'</pre>'; 
                    break;
                case 'json':
                    $json = file_get_contents($file['uploadFile']['tmp_name']);
                    $data = json_decode($json, true);
                    echo '<pre>', print_r($data),'</pre>'; 
                    break;
                case 'csv':
                    echo 'To jest plik CSV!';
                    $csvFile = $file['uploadFile']['tmp_name'];
                    $file_handle = fopen($csvFile, 'r');
                    while (!feof($file_handle) ) {
                        $line_of_text[] = fgetcsv($file_handle, 1024);
                    }
                    fclose($file_handle);
                    echo '<pre>', print_r($line_of_text),'</pre>'; 
                     $line_of_text;
                    break;
        }
        

            
} 
        #move_uploaded_file($tmp_name, "$uploads_dir/$name");
        ;?>
    </body>
</html>