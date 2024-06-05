<?php
    include_once '../class/AccountView.php';
    include_once '../class/RequestView.php';

    

    $accView = new AccountView();

    $request = $accView->getAccByCode($_SESSION['account_id']);

	if($request[0]['role'] != "admin") {
		// header("Location: shop.php");
	}

    $requestView = new RequestView();
?>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $reqs = $requestView->getAllReqsAdmin();
                    foreach($reqs as $r):
                ?>
                <tr>
                    <td><?= $r['request_id'];?></td>
                    <td><img src="../images/<?= $r['img_path'];?>" alt="" style="height: 10vw"><?= $r['name'];?></td>
                    <td><?= ($r['price'] * $r['quantity']);?></td>
                    <td><?= $r['quantity'];?></td>
                    <td><?= $r['status'];?></td>
                    <td>
                        <button class="badge bg-success mx-3" onclick="updateStatus(<?= $r['request_id']; ?>, 'Approved')">Approve</button>
                        <button class="badge bg-danger mx-3" onclick="updateStatus(<?= $r['request_id']; ?>, 'Denied')">Deny</button>
                    </td>
                </tr>
                <?php 
                    endforeach
                ?>
            </tbody>
        </table>
		  <a href="logout.php"><button class="btn bg-danger">Log out</button></a>
    </div>

    <script>
        $(document).ready(function() {
            let table = new DataTable('#orderTable');
        });

        function updateStatus(id, status) {
		let params = [
            status, 
            id
        ];
        let postData = {"update": params};
        $.ajax({
            url: '../api/request.php',
            type: 'POST',
            data: postData,
            success: function (data) {
                alert("Succesfully Updated");
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
	}
    </script>
</body>
</html>