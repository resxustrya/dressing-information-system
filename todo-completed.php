<!DOCTYPE html>
<html>
    <head>
        <title>JQUERY</title>
        <script src="js/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.min.css">
    <style>
        .section1 {
            border : 1px solid #333;
            width : 100px;
            height : 100px;
        }
    </style>
    </head>
    <body>
        <button id="load">Load ajax</button>
        <div id="ajaxload">
            <div id="remove">
                <p>This page will be remove when ajax load function is called</p>
            </div>
        </div>
    </body>
    <script src="jquery-ui/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function (){
           $('#load').click(function () {
               $('#remove').remove();
               $('#ajaxload').load('todo-complete.php?sum=2');
           });
        });
    </script>
</html>