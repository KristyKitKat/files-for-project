<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="includes/jquery-3.6.0.min.js"></script>
</head>
<body>
    <script>
        function validaLogin(){
            var emailInputTxt = $('.loginForm .email').val();
            var passwordInputTxt = $('.loginForm .password').val();
            
            $.post(
                'actions.php?act=login',
                {
                    email: emailInputTxt,
                    password: passwordInputTxt
                },
                function(data){
                    var json = $.parseJSON(data);

                    if(json.status == 'OK'){
                        alert(json.msg);

                        //esperar 2 segundos para redirecionar
                        //setTimeout(() => {  
                            window.location.href = 'index.php';
                        //}, 500);
                    }
                    else {
                        $('.javaMsg').text(json.msg);
                        $('.javaMsg').slideDown(100);
                    }
                }
            );
        }
    </script>

    <div style="background: red; color:white; display: none; padding:20px" class="javaMsg"></div>

    <!-- <form action="actions.php?act=login" method="POST"> -->
    <div class="loginForm">
        <label>
            Username: <input type="email" name="email" class="email">
        </label><br>
        <label>
            Password: <input type="password" name="password" class="password">
        </label>
        <input type="button" value="login" onclick="validaLogin()">
    </div>
    <!-- </form> -->
</body>
</html>