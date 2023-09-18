<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "notes";

$connection = mysqli_connect($server, $username, $password, $database);
if(!$connection){
  echo"<h1>Failed to connect to the database ".mysqli_connect_error().". Please retry!!</h1>";
  die;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curd application</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/80a3084a21.js" crossorigin="anonymous"></script>
    <!-- datatables links -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <nav class="navbar-expand-lg fixed-top custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">NoteIT.</a>
        </div>
    </nav>
    <div class="container input" style="width: 70%">
        <h2>Add a Note</h2>
        <form method="post" action="insert.php">
            <div class="mb-3" style="width: 51rem">
                <label for="title" class="form-label">Note title *</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" style="width: 51rem">
                <div class="form-text">A discriptive title helps in better search</div>
            </div>
            <div class="mb-3" style="width: 51rem">
                <label for="desc" class="form-label">Describe your Note *</label>
                <textarea name="desc" id="desc" cols="30" rows="5" class="form-control" name="desc"
                    placeholder="Write down your thoughts" style="width: 51rem"></textarea>
            </div>
            <div class="mb-3" style="width: 51rem">
                <label for="desc" class="form-label">Enter links(if any)</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Enter link" style="width: 51rem">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container result">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Link</th>
                    <th scope="col">Date - time</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $query = "SELECT * FROM `notes1`";
                   $result = mysqli_query($connection, $query);
      
                   $num = mysqli_num_rows($result);
                   if($num == 0){
                    echo"<tr><td colspan='6' class='text-center'>You have no notes!!</td></tr>";
                   }
                   $sno = 0;
                   for($i = 1; $i <= $num; $i++){
                         $sno++;
                         $row = mysqli_fetch_assoc($result);
                         echo "<tr>
                         <th>".$sno."</th>
                         <td>".$row['title']."</td>
                         <td style='font-size: 12px;'>".$row['description']."</td>
                         <td><a href='".$row['link']."'><i class='fa-solid fa-link'></i></a></td>
                         <td>".$row['tstmp']."</td>
                         <td>Actions</td>
                         </tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>