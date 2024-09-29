<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
    $forms=new Forms;
    // $forms->blog(1);

    if (isset($_REQUEST['blog_id'])) {
    		   $forms->blog($_REQUEST['blog_id']);

    	}
    	else{

    		$forms->blog();
    	}
?>




		</div>
    	</div>
	</div>
<?php
		include("../library/footer.php");
		
?>