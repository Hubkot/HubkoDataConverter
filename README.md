# HubkoDataConverter

Simple converter XML/JSON/CSV with easy append new file format extension.

If you want to append new file format just add in Converter.php class on methods decode()/encode() new format encoders.
And add new extension in views/layout.php under <input type="file" accept=[accepted_file_extensions]> line.

Converted files are saved into ./web format with same name as original file.
Just make sure that application have permisions save file there.

@author hubert 2017
