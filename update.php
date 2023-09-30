
<?php 

require "db.php";

if(isset($_GET['id'])) {
$id = $_GET['id']; 



 

 $sql = "SELECT * FROM course WHERE id = '$id'";
 $result=$conn->query($sql);

if($result->num_rows == 1) {
 $row = $result->fetch_assoc();
$name=$row['name'] ;
 $code=$row['code'];
  $programme=$row['programme'];
 $year=$row['year'] ;
 $instructor =$row['instructor'] ;
}

}



if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $programme = $_POST['programme'];
    $year = $_POST['year'];
    $code =$_POST['code'];
    $instructor =$_POST['instructor'];
    
   
    $sqlUPDATE = "UPDATE course SET name='$name',programme='$programme', year= '$year', code= '$code',instructor = '$instructor' where id='$id' ";
   $result =$conn->query($sqlUPDATE);
   
 if ($result){


    echo "Updated";
 }
   
   }
   elseif(isset($_POST['delete'])){

    $sqlUPDATE = "DELETE FROM course where id='$id' ";
    $result =$conn->query($sqlUPDATE);
    if ($result){


        echo "Deleted";
        $name="";
     }
   }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Record</title>
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
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s ease;
            margin-left: 10px;
        }

        .btn-delete {
            background-color: #FF0000;
        }

        .btn-edit {
            background-color: #28a745;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.jpeg" alt="Sol Plaatje University Logo" style="display: block; margin: 0 auto; max-width: 200px;">
        <h1>Sol Plaatje University Student Management System</h1>
        <a href="index.php">Home</a>

        <!-- Edit Form -->
        <div class="form-container">
            <h2>Update Course</h2>
            <form method="POST" id="create-form">
                <div class="form-row">
                    <label for="name">Course Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div class="form-row">
                    <label for="code">Course Code:</label>
                    <input type="text" id="code" name="code"value="<?php echo $code; ?>" required>
                </div>
                <div class="form-row">
                    <label for="programme">Programme:</label>
                    <input type="text" id="programme" name="programme" value="<?php echo $programme; ?>"  required>
                </div>
                <div class="form-row">
                    <label for="year">Level of Year:</label>
                    <input type="text" id="year" name="year" value="<?php echo $year; ?>" required>
                </div>
                <div class="form-row">
                    <label for="instructor">Instructor:</label>
                    <input type="text" id="instructor" name="instructor" value="<?php echo $instructor; ?>" required>
                </div>
                <div class="btn-container">
                    <button type="submit" name="update" class="btn btn-edit">Update</button>
                    <button type="submit" name="delete" class="btn btn-delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
