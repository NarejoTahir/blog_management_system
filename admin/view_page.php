<?php
    include("../library/header.php");
    include("../library/sidebar.php");


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
<body onload="show_blog()">
    

     <h1 class="text-dark mb-4 text-center">View Blog</h1>


       <div class="row">
            <div class="container col-sm-8">

               <table id="myTable" class="display">
    <thead>
        <tr>
           <th scope="col">Blog title</th>
            <th scope="col">Post Per Page</th>
            <th scope="col">Author</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            <th scope="col">Edit</th>

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
