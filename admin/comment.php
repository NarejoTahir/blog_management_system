<?php
    include("../library/header.php");
    include("../library/sidebar.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

</head>
<body onload="show_comment()">
    

     <h1 class="text-dark mb-4 text-center">Comments</h1>


       <div class="row">
            <div class="container col-sm-8">

               <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Comment</th>
            <th>Comment By</th>
            <th>Post Title</th>
            <th>Comment Status</th>
            <th>Action</th>
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
