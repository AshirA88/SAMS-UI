<!-- PHP Session to verify if the user has logged in, if not redirect to log in page -->
<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0)
    {
        header('location:../index.php');
    }
    else
    {
        //main logic
        include('../includes/header.php');      // header
        
        // Update Data
        if(isset($_REQUEST['update']))
        {   
            $uid=$_POST['id'];
            $UserName=$_POST['UserName'];
            $Password=$_POST['Password'];
            $UserType=$_POST['UserType'];
            $sql="UPDATE users SET UserName=:UserName,Password=:Password,UserType=:UserType WHERE id=:uid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':uid',$uid,PDO::PARAM_STR);
            $query->bindParam(':UserName',$UserName,PDO::PARAM_STR);
            $query->bindParam(':Password',$Password,PDO::PARAM_STR);
            $query->bindParam(':UserType',$UserType,PDO::PARAM_STR);
            $query->execute();
            $msg="Info Updateed Successfully";
        }

        // Delete data
        if(isset($_REQUEST['del']))
        {
            $did=intval($_GET['del']);
            $sql = "DELETE FROM users WHERE id=:did";
            $query = $dbh->prepare($sql);
            $query-> bindParam(':did',$did, PDO::PARAM_STR);
            $query -> execute();

            $msg="Record deleted Successfully ";
        }
?>

<!-- main logic -->
<!doctype html>
<html lang="en">
    
    <head>
        <link rel = "icon" href = "img/logo.png" type = "image/x-icon">
        <title>Smart Attendance Management System Using Raspberry PI</title>
    </head>

    <body>
        <br>
        <h2>&emsp;Manage data Users</h2>
        <br>
        <?php 
            if($error)
                {
                    ?> <div><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php 
                }
            else if($msg)
                {   
                    ?> <div><strong><img src="../img/success.gif " width="350" height="250" alt="" >SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php 
                }
        ?>
        <!-- Table starts here -->
        <table id="data" cellspacing="0" width="100%" class="table">
            <!-- Header of table -->
            <thead class="thead-dark">
                <tr class="table-dark">
                    <th scope="row"></th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>UserType</th>
                    <th>Date Created</th>
                    <th>Action </th>
                </tr>
            </thead>

            <!-- Footer of table -->
            <tfoot class="thead-light">
                <tr class="table-secondary">
                    <th scope="row"></th>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>UserType</th>
                    <th>Date Created</th>
                    <th>Action </th>
                </tr>
            </tfoot>
            
            <!-- Body of table -->
            <tbody>
                <?php 
                    // PHP handle to SELECT all the data
                    $get_data = "SELECT * FROM users";
                    $query = $dbh -> prepare($get_data);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;                                       // to start the counter
                    if($query->rowCount() > 0)
                    {
                        foreach($results as $result)
                        {				
                            ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($cnt);?></th>       <!-- to print counter -->
                                    <td><?php echo htmlentities($result->id);?></td>      <!-- to print ID -->
                                    <td><?php echo htmlentities($result->UserName);?></td>      <!-- to print username -->
                                    <td><?php echo htmlentities($result->Password);?></td>      <!-- to print password -->
                                    <td><?php echo htmlentities($result->UserType);?></td>      <!-- to print userType A,S,T -->
                                    <td><?php echo htmlentities($result->TimeOfCreation);?></td>  <!-- to print timeOfCreation -->
                                    <td>
                                        <!-- Edit Data -->
                                        <!-- Button trigger modal -->
                                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                        </button> -->
                                        
                                        <!-- Modal -->
                                        <form method="post" name="edit_data" onSubmit="return valid();">
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data&ensp;</h6>
                                                            <h6 class="modal-title" id="exampleModalLabel">(Enter ID of user you want to edit)</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- PHP to get single data of user -->
                                                            <label>id:</label>
                                                            <input type="text" id="id" name="id" placeholder="for eg. <?php echo htmlentities($result->id);?>"> <br>
                                                            <label>UserName:</label>
                                                            <input type="text" id="UserName" name="UserName" placeholder="for eg. <?php echo htmlentities($result->UserName);?>"> <br>
                                                            <label>Password:</label>
                                                            <input type="text" id="Password" name="Password" placeholder="for eg. <?php echo htmlentities($result->Password);?>"> <br>
                                                            <label>UserType:</label>
                                                            <input type="text" id="UserType" name="UserType" placeholder="for eg. <?php echo htmlentities($result->UserType);?>"> <br>
                                                            <!-- <br name ="id" value="<?php //echo htmlentities($result->id);?>"> -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Delete single data -->
                                        <form>
                                            <a class="btn btn-primary" href="manage_account.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to delete this record')"> Delete</a>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                // increment counter
                                $cnt += 1; 
                            }
                        } 
                            ?>

            </tbody>
        </table>
        <br>
        <p>&emsp;Edit data of database: <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button> </p>
        <br>
    </body>
    </html>

    <!-- PHP end here -->
    <?php
    }
    ?>