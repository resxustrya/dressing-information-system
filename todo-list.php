

<! DOCTYPE html>
<html lang="en">
    <head>
        <title>Ajax test</title>
        <script src="js/jquery-1.11.2.min.js"></script>
    </head>
    <body>
        <div class="form-login">
                <table border="0">
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" name="username" id="username" />
                        <td><span class="username-err"></span></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="password" id="password" />
                        <td><span class="password-err"></span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><button id="submit">Login</button></td>
                    </tr>
                </table>
        </div>
        <div id="data">
            
        </div>
    </body>
    <script>
        $(document).ready(function (){
            $('#submit').click(function (){
                console.log($('#username').val() + ", " + $('#password').val());
                if ($('#username').val() == "" && $('#password').val()=="") {
                    $('.username-err').text('Please provide a username');
                    $('.password-err').text('Please provide a password');
                } else {
                    var data = 'username='+$('#username').val()+'&password='+$('#password').val();
                    $.ajax({
                        url : 'todo-detail.php',
                        type : 'post',
                        data : data,
                        success : function(data) {
                            $('#data').text(data);
                            console.log($('#data').text());
                        }
                    });
                }
            });
        });
    </script>
</html>