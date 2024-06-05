<?php 
    session_start();
    echo $_SESSION['student_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        table, th, td {
            border: 1px solid black;
            padding: 1vh;
        }
    </style>
</head>
<body>
    <div id="form">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    $(document).ready(() => {

        getItems();
        
    });

    function addRequest(i, id, price) {
        let params = [
            <?php echo $_SESSION['account_id']; ?>,
            id,
            $("#qty" + i).val(),
            price * $("#qty" + i).val(),
        ];
        let postData = {"insert": params};
        $.ajax({
            url: '../api/request.php',
            type: 'POST',
            data: postData,
            success: function (data) {
                alert(data);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
    }

    function getItems() {
        let postData = {"get": ['']};
        $.ajax({
            url: '../api/item.php',
            type: 'POST',
            data: postData,
            success: function (data) {
                for(i = 0; i < data.length; i++) {
                    let row = JSON.parse(data)[i];
                    $('tbody').append("<tr><td>" + row['name'] + "</td>" + "<td>" + row['description'] + "</td>" + "<td>" + row['price'] + "</td><td><button onclick='addRequest(" + [
                        i + 1,
                        row['id'], 
                        row['price']
                    ] + ")'>Order</button><input id='qty" + (i + 1) + "' type='number' value='1'></td></tr>");
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
    }
</script>