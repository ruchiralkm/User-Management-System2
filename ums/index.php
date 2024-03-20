<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a href="create.php" class = "btn btn-primary" role = "button">New Clients</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ums";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //read all row from database
                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);

                if (!$result){
                    die("Invalid query: " . $conn->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                   echo "
                   <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='edit.php?id=$row[id]' class = 'btn btn-primary btn-sm'>Edit</a>
                        <a href='delete.php?id=$row[id]' class = 'btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>
                   ";
                }
                ?>

                
            </tbody>
        </table>
    </div>
</body>
</html>