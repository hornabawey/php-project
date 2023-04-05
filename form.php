<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="mr-5">Hello, world!</h1>
    <div class="container">
        <div class="row">
         <div class="col-8 mx-auto">
          <?php if(isset($_SESSION['errors'])):
           foreach ($_SESSION['errors']as $error):    ?>
            <div class="alert alert-danger"><?php echo $error;  ?></div>
            <?php    endforeach;
            unset($_SESSION['errors']); 
           endif;?>
           <?php 
           if(isset($_SESSION['success'])):?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
           <?php endif;
            unset($_SESSION['success']);  ?>
          
            
         <form action="handlers/handleTask.php" method="post">
  <div class="mb-3">
    <input type="text" name="task_name" class="form-control"  >
  </div>
  <button type="submit" class="form-control btn btn-danger">creat task</button>
</form>
<table class="table table-bordered">
  <thead>
    <th>#</th>
    <th>task name</th>
  </thead>
  <tbody>
    <?php  if(isset($_SESSION['data'])):   ?>
    <?php $i=1;  foreach ($_SESSION['data'] as  $row) :?>
    <tr>
      <td><?php   echo $i++; ?></td>
      <td><?php   echo $row; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif;unset($_SESSION['data']); ?>
  </tbody>
</table>
         </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>