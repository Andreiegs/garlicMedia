<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../css/tiny-slider.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/tiny-slider.js"></script>
    <script src="../js/custom.js"></script>

</head>
<body>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-4">
                <select id="statusFilter" class="form-control">
                    <option value="">Show All</option>
                    <option value="pending">Pending</option>
                    <option value="shipping">Shipping</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </div>
    <div class="container">
        <table id="orderTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Products</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th></th><th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>shipping</td><td></td><td></td>
                </tr>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>cancelled</td><td></td><td></td>
                </tr>
                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>pending 
                        <td><button class="badge bg-success mx-3">Approve</button></td>
                        <td><button class="badge bg-danger mx-3">Deny</button></td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            let table = new DataTable('#orderTable');
        
            
            $('#statusFilter').val('pending');
            table.column(4).search('^pending$', true, false).draw();
            $('#statusFilter').on('change', function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    table.column(4).search('^' + selectedValue + '$', true, false).draw();
                } else {
                    table.column(4).search('').draw();
                }
            });
        });
    </script>
</body>
</html>