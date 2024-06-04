<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="form">
        <label for="">Email:</label>
        <input type="text" name="" id="email">
		<label for="">Password:</label>
        <input type="text" name="" id="password">
        <button id="loginBtn">Login</button>
        <a href="login.php">Register</a>
    </div>
</body>
</html>
<script>
    $(document).ready(() => {
        $("#loginBtn").on('click', () => {
            let params = [
                $("#email").val(),
                $("#password").val(),
            ];
            logAccount(params);
        });
    });

    function logAccount(params) {
            let postData = {"log": params};
            $.ajax({
                url: '../api/account.php',
                type: 'POST',
                data: postData,
                success: function (data) {
                    if(data != false) {
						// alert("Success! " + data);
                        if(data == "true") {
						    window.location.replace("request.php");
                        } else {
                            alert("Wrong credentials.");
                        }
					} else {
						alert("Failed " + data);
					}
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                }
            });
        }
</script>