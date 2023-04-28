
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">

      <a class="navbar-brand" href="#"><img src="C:\Users\Rohit\Desktop\saibaba.jpg" class="img-thumbnail" alt="..."></a>
      <a class="navbar-brand" href="#"><h1>FinTech Sem-3</h1></a>
      <a class="navbar-brand" href="#">Home</a>
      <a class="navbar-brand" href="#">About</a>
      <a class="navbar-brand" href="index.php">Form</a>
      <a class="navbar-brand" href="#">Navbar</a>
    </div>
  </nav>
</div>

<?php 
    include('conn.php');
    include('script.html');
    //include('css1.css');

    // if($conn){
    //     echo "Database connection establised...";
    // }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container bg-light shadow id">
<div class="row mt-5">
    <div class="col-sm-6">
        <form name="myform" action="" method="post">
            Name:<input type="text" name="name" class="form-control" /><br>
            Roll_No:<input type="number" name="roll" class="form-control" /><br>
            Class:<input type="text" name="class" class="form-control" /><br>
            Stream:<input type="text" name="stream" class="form-control" /><br>
            Department:<input type="text" name="depart" class="form-control" /><br>
            <input type="submit" name="submit" value="Submit" onclick="formvalidation()" class="btn btn-success"/>
        </form>
    </div>


<?php
    //include('conn.php') ;
    if(isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['roll']) && !empty($_POST['class']) && !empty($_POST['stream']) && !empty($_POST['depart']))
          {
            $name1 = $_POST['name'];
            $roll = $_POST['roll'];
            $class = $_POST['class'];
            $stream = $_POST['stream'];
            $depart = $_POST['depart'];

            $sql1 = "INSERT INTO sem3(Name, Roll_No, Class, Stream, Department) values('$name1', '$roll', '$class','$stream','$depart')";

            $run = mysqli_query($conn, $sql1);
          }
        // if($run){
        //     echo "Form Data Submitted Succesfully...";
        // }
    }
?>
 <?php 
    $sql =  'SELECT * FROM sem3';

    $data = mysqli_query($conn, $sql);

    if (mysqli_num_rows($data) > 0){ 
?>
    <div class="col-sm-6">
         
        <table class="table table-hover">
            <tr>
                <th class="scope">Id</th>
                <th class="scope">Name</th>
                <th class="scope">Roll_No</th>
                <th class="scope">Class</th>
                <th class="scope">Stream</th>
                <th class="scope">Department</th>
                <th class="scope">Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td> <?php echo $row['id'] ?></td>
                <td> <?php echo $row['Name'] ?></td>
                <td> <?php echo $row['Roll_No'] ?></td>
                <td> <?php echo $row['Class'] ?></td>
                <td> <?php echo $row['Stream'] ?></td>
                <td> <?php echo $row['Department'] ?></td>
                <td colspan="2">
                     <a href="index.php? sid=<?php echo $row['id']; ?>">Delete</a>
                     <a href="update.php? si=<?php echo $row['id']; ?>">Update</a>
                </td>
            </tr>
            <?php } ?>
            <tr>

            </tr>

            <?php 
                }
                else { 
        ?>
                    <h1 class="alert alert-info">No Data In Database</h1>
        <?php 
                } 
        ?>

        </table>
        
         
    </div>
</div>

</div>



<?php 
        include('conn.php');
        
        if(isset($_GET['sid'])){
            $sid = $_GET['sid'];

            $sql2 =  "DELETE FROM sem3 WHERE id = '$sid'";

           $run = mysqli_query($conn, $sql2);
        

        if($run){  
            echo "Deleted";
}    
}
?>