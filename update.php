<div class="">
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
if(isset($_GET['si'])){
    $sql3 = "SELECT * FROM sem3 WHERE id=".$_GET['si'];
    $data3 = mysqli_query($conn, $sql3);
     while($row2 = mysqli_fetch_assoc($data3)){
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

<div class="container mt-3 shadow bg-light flex ">
  
      <form name="myform" action="" method="post">
              id:<input type="text" name="id" class="form-control"  value="<?php echo $row2['id']; ?>"/><br>
              Name:<input type="text" name="name" class="form-control"  value="<?php echo $row2['Name']; ?>"/><br>
              Roll_No:<input type="number" name="roll" class="form-control" value="<?php echo $row2['Roll_No']; ?>" /><br>
              Class:<input type="text" name="class" class="form-control" value="<?php echo $row2['Class']; ?>" /><br>
              Stream:<input type="text" name="stream" class="form-control" value="<?php echo $row2['Stream']; ?>" /><br>
              Department:<input type="text" name="depart" class="form-control" value="<?php echo $row2['Department']; ?>" /><br>
              <input type="submit" name="update" value="Update" onclick="formvalidation()" class="btn btn-success"/>
      </form>
  
</div>
<?php
     

?>

<?php 
     //include('conn.php');
     if(isset($_POST['update'])){
        //if(!empty($_POST['name']) && !empty($_POST['roll']) && !empty($_POST['class']) && !empty($_POST['stream']) && !empty($_POST['depart'])){
        $id = $_POST['id'];
        //echo $id . "V";
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $class = $_POST['class'];
        $stream = $_POST['stream'];
        $depart = $_POST['depart'];

        $sql4 = ("UPDATE sem3 SET Name = '$name', Roll_No = '$roll', Class = '$class', Stream = '$stream', Department = '$depart' WHERE id = '$id'");
        $run4 = mysqli_query($conn, $sql4);

       
        if ($run4){
            echo "Update successfully...";
        ?>
            <script>
              window.location.href="index.php";
            </script>
        <?php
            //header("location:index.php");
        }
     //}
    }
  }}
?>
<div>