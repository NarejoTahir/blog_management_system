<?php
    require_once("../fpdf/fpdf.php");
    require_once("database.php");

     if (isset($_SESSION['user'])) {
     
        
    $pdf = new FPDF();

    $pdf->addpage();
    $pdf->setFont("Times","","18");

    $pdf->Cell(0,20,"User Information",1,0,"C",0);
    
    
    $pdf->setFont("Times","","14");
    $pdf->setXY(80,30);
    $pdf->write(12,$_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']);
    
    $pdf->setFont("Times","","12");
    $pdf->SetTextColor(200,16,50);
    $pdf->setXY(80,35);
    $pdf->write(12,$_SESSION['user']['is_approved']);
    
    $pdf->setFont("Times","","12");
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY(80,45);
    $pdf->write(12,"Email:");
    
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(92,45);
    $pdf->write(12,$_SESSION['user']["email"]);
    
    
    $pdf->setFont("Times","","12");
    $pdf->SetTextColor(0,0,0);
    $pdf->setXY(80,55);
    $pdf->write(12,"Status:");
    
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(99,55);
    $pdf->write(12,$_SESSION['user']['is_active']);
    
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(130,55);
    $pdf->write(12,"Date Of Birth:");
    
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(155,55);
    $pdf->write(12,$_SESSION['user']['date_of_birth']);
    
    
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(80,63);
    $pdf->write(12,"Gender:");
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(95,63);
    $pdf->write(12,$_SESSION['user']['gender']);
    
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(120,63);
    $pdf->write(12,"Adress:");
    
    $pdf->setFont("Times","","12");
    $pdf->setXY(135,63);
    $pdf->write(12,$_SESSION['user']['address']);
    
    
    

    
    $pdf->setFont("Times","","12");
    $pdf->setXY(22,35);
    $pdf->Image($_SESSION['user']['user_image'],10,30,60,60);

    
    
    
    $pdf->Output();
    
}
else{
    header("location:../user/index.php?message=Can't Download PDF");
}

?>