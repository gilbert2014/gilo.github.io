<?php
session_start();
include('includes/header.php');
?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">LOGIN HERE!</h1>
                    <?php
                    if(isset($_SESSION['status'])&& $_SESSION['status']!='')
                    {
                    	echo '<h2 class= "bg-danger text-white">'.$_SESSION['username'].'</h2>';
                    	unset($_SESSION['status']);



                    }


                    ?>
                  </div>
                  <form class="user" action="code.php" method="POST">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
                    </div>
                    <button  type="submit" name="loginbtn"  class="btn btn-primary btn-user btn-block">Login</button>
                   
                   
                  </form>
                  <hr>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


<?php
include ('includes/scripts.php');
?>