<?php
    include("../library/header.php");
    include("../library/sidebar.php");

    // $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);

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
     <h1 class="text-dark mb-4 text-center">User Request</h1>
       <div class="row">
            <div class="container col-sm-12">
                <table id="myTable" class="display">
                    <thead>
                     <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th> 
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                    <tbody id="data">

                    </tbody>
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
