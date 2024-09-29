<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
    $forms=new Forms;
   // $forms->category(3);
    if (isset($_REQUEST['category_id'])) {
    		   $forms->category($_REQUEST['category_id']);

    	}
    	else{

    		$forms->category();
    	}
?>


		</div>
    	</div>
	</div>
<?php
		include("../library/footer.php");
		
?>