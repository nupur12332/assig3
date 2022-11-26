//adding header to index
<?php require ('./header.php'); ?>
  <main>
    <?php
    include 'database.php';
    $customerObj = new database();
      if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Registration Done
            </div>";
      }
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Information Updated
            </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
       echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Information Deleted
            </div>";
      }
    ?>
    <section class="masthead">
      <div>
        <h1>Register for Job</h1>
      </div>
    </section>
    <section>
      <h2>RECORDS
      <a href="index.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
      </h2>
      <table class="table table-hover table-dark table-striped">
        <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $customers = $customerObj->displayData();
        foreach ($customers as $customer) {
          ?>
          <tr>
            <td><?php echo $customer['fname'] ?></td>
            <td><?php echo $customer['lname'] ?></td>
            <td><?php echo $customer['email'] ?></td>
            <td>
              <button class="btn btn-primary mr-2"><a href="index.php?indexId=<?php echo $customer['id'] ?>">
                  <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
              <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
                  <i class="fa fa-trash text-white" aria-hidden="true"></i>
                </a></button>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </section>
    <section class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <div class="card">
            <div class="card-header">
              <h2>New user? Register below!!</h2>
            </div>
            <div class="card-body bg-light">
              <form action="add.php" method="POST">
                <div class="form-group">
                  <label for="name">First Name </label>
                  <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required="">
                </div>
                <div class="form-group">
                  <label for="name">Last Name </label>
                  <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required="">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
                </div>
                <div class="form-group">
                  <label for="salary">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Create password" required="">
                </div>
                <div class="form-group">
                  <label for="salary">Confirm Password</label>
                  <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" required="">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Register">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <h3>Sign In to your account.</h3>
        <form method="post">
        	<p><input class="form-control" name="username" type="email" placeholder="Email" required /></p>
        	<p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-light" type="submit" value="Login" />
        </form>
      </div>
    </section>
  </main>
  <br><br>
  //adding footer to index
<?php require ('./footer.php'); ?>
