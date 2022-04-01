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
?>

<!-- CSS and JS -->
<!-- https://getbootstrap.com/docs/4.1/getting-started/introduction/ -->
<!-- Used for Table -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

<!-- No need to call css because already called in header.php lol -->

<!-- main logic -->
<!doctype html>
<html lang="en">
    
    <head>
    <link rel = "icon" href = "img/logo.png" type = "image/x-icon">
    <title>Smart Attendance Management System Using Raspberry PI</title>
    </head>

    <body>
        <br>
        <h2>Printing the database of people</h2>
        <br>
        
        <!-- Table starts here -->
        <table id="data" cellspacing="0" width="100%" class="table">
            <!-- Header of table -->
            <thead class="thead-dark">
                <tr>
                    <th scope="row">#</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>UserType</th>
                    <th>Date Created</th>
                    <th>Action </th>
                </tr>
            </thead>

            <!-- Footer of table -->
            <tfoot class="thead-light">
                <tr>
                    <th scope="row">#</th>
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
                                <td><?php echo htmlentities($result->UserName);?></td>      <!-- to print username -->
                                <td><?php echo htmlentities($result->Password);?></td>      <!-- to print password -->
                                <td><?php echo htmlentities($result->UserType);?></td>      <!-- to print userType A,S,T -->
                                <td><?php echo htmlentities($result->TimeOfUpdate);?></td>  <!-- to print timeOfCreation -->
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_data">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <form name="#" action="javascript:select();" >
                                        <input id="delete" type="submit" name="delete" value="Delete" />
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
    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>