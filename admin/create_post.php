<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
    $forms=new Forms;

    	if (isset($_REQUEST['post_id'])) {
    		   $forms->post($_REQUEST['post_id']);

    	}
    	else{

    		$forms->post();
    	}

   
?>



		</div>
    	</div>
	</div>
<?php
		include("../library/footer.php");
		
?>