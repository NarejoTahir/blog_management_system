<?php
    include("../library/header.php");
    include("../library/sidebar.php");

    $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);
    $result=$ob->fetch_feedback();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management System</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
            
</head>
<body onload="get_data()">
     <h1 class="text-dark mb-4 text-center">Feedback</h1>
       <div class="row">
            <div class="container col-sm-12">
                <table id="myTable" class="display">
                    <thead>
                     <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Feedback</th>
                    </tr>
                </thead>
                <?php
                    if ($result) {
                        ?>
                        <tbody>
                            <?php
                            while ($row=mysqli_fetch_assoc($result)) {
                                ?>
                            <tr>
                                <td><?= $row['user_name']?></td>
                                <td><?= $row['user_email']?></td>
                                <td><?= $row['feedback']?></td>
                            </tr>

                                <?php
                            }
                            
                            ?>
                        </tbody>
                        <?php
                    }
                ?>
                    
                </table>
               
            </div>
        </div>
            


            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
            <script type="text/javascript">
          
               $(document).ready( function () {
                 $('#myTable').DataTable();
                } )
            
            </script>






             </div>
        </div>
    </div>


<?php
        include("../library/footer.php");
        
?>
</body>
</html>
