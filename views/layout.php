<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
    </head>

    <body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="uploadFile" accept="file_extension/,.xml,.json,.csv">
            <input type="radio" required="true" name="convertTo" value="xml"> XML
            <input type="radio" required="true" name="convertTo" value="json"> JSON
            <input type="radio" required="true" name="convertTo" value="csv"> CSV
            <br />
            <input type="submit">
    </form>
