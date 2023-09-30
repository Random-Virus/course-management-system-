
<?php 

require "db.php";

if(isset($_POST['add'])) {

 $name = $_POST['name'];
 $programme = $_POST['programme'];
 $year = $_POST['year'];
 $code =$_POST['code'];
 $instructor =$_POST['instructor'];
 

 $sql = "INSERT INTO course(name,programme,year,code,instructor) VALUES ('$name','$programme','$year','$code','$instructor')";


 $result=$conn->query($sql);

 if($result){

    header("Location: confirm.php");
 }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sol Plaatje University Course Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #007BFF;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        label {
            flex-basis: 30%;
            padding-right: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            flex-basis: 65%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn-container {
            text-align: right;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        .btn-view {
            background-color: #28a745;
        }

        .btn-delete {
            background-color: #FF0000;
        }

        .btn-create {
            background-color: #007BFF;
        }

        .btn-cancel {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.jpeg" alt="Sol Plaatje University Logo" style="display: block; margin: 0 auto; max-width: 200px;">
        <h1>Sol Plaatje University Course Management System</h1>

        <!-- Create Form -->
        <div class="form-container">
            <h2>Add New Course</h2>
            <form method="POST" id="create-form">
                <div class="form-row">
                    <label for="name">Course Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-row">
                    <label for="code">Course Code:</label>
                    <input type="text" id="code" name="code" required>
                </div>
                <div class="form-row">
                    <label for="programme">Programme:</label>
                    <input type="text" id="programme" name="programme" required>
                </div>
                <div class="form-row">
                    <label for="year">Level of Year:</label>
                    <input type="text" id="year" name="year" required>
                </div>
                <div class="form-row">
                    <label for="instructor">Instructor:</label>
                    <input type="text" id="instructor" name="instructor" required>
                </div>
                <div class="btn-container">
                    <button type="submit" name="add" class="btn btn-create">ADD</button>
                </div>
            </form>
        </div>

        <!-- Display Course List -->
        <div class="form-container">
            <h2>Course List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Programme</th>
                        <th>Level Of Year</th>
                        <th>Instructor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

<?php

$sql  = "SELECT * FROM course";
$result=$conn->query($sql);



if($result->num_rows>0){


    while($row=$result->fetch_assoc()){ 

           ?>
            <tr>
  <td><?php echo $row['name'] ?></td>
  <td><?php echo $row['code'] ?></td>
  <td><?php echo $row['programme'] ?></td>
  <td><?php echo $row['year'] ?></td>
  <td><?php echo $row['instructor'] ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-view">View</a>
                           
                        </td>

                    </tr>
                    <?php 

}
}else {

?>
<tr>
 <td>
      <p>No Course</p>
                           
                        </td>

</tr>
<?php

}
?>
        

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
