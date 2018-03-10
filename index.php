<?php
require('fpdf/fpdf.php');

/**
* 
*/
class MyPdf extends FPDF
{
	protected $y; 
	// Page header
	function PdfHeader()
	{
	    $this->SetFont('Arial','',10);
	    $this->Cell(0,10,'Dispatch to:',0,1,'L');
	    
	    $this->SetFont('Arial','',14);
		$this->Cell(0,6,'Send Cargo (Firoz Brac Bank)',0,1);
		$this->Cell(0,6,'41 Trahorn Close',0,1);
		$this->Cell(0,6,'LONDON',0,1);
		$this->Cell(0,6,'E1 5EEE',0,1);
		$this->Cell(0,6,'United Kingdom',0,1);
		$this->Ln(2);
		$this->Cell(0,0,'',1,1);
		$this->Ln(2);
	}

	function OrderId()
	{
	   
	    $this->SetFont('Arial','',12);
		$this->Cell(0,7,'Order ID: 202-55557775-3124444',0,1);
		$this->SetFont('Arial','',10);
		$this->Cell(0,5,'Thank you for Buying from Analogue Seduction on Amaxon Marketplace',0,1);

		
	}


	function DeleveryInfo()
	{	
		$this->y = $this->GetY();
		$this->Rect(10,$this->y+5, 190, 38);
		
	    $this->SetFont('Arial','',10);
	    // $this->SetLeftMargin(20);
	    $this->Ln(8);
	    $this->Cell(6,5.3, '',0,0);
	    $this->Cell(80,5.3, 'Detivery address:',0,0);
	    $this->Cell(30,5.3, 'Order Date: ',0,0);
	    $this->Cell(0,5.3, '24 Jan 2014 ',0,1);

	    $this->Cell(6,5.3, '',0,0);
	    $this->Cell(80,5.3, 'Send Cargo (Firoz Brac Bank)',0,0);
	    $this->Cell(30,5.3, 'Delivery Service: ',0,0);
	    $this->Cell(0,5.3, 'Standard',0,1);

	    $this->Cell(6,5.3, '',0,0);
	    $this->Cell(80,5.3, '41 Trahorn Close',0,0);
	    $this->Cell(30,5.3, 'Buyer Name: ',0,0);
	    $this->Cell(0,5.3, 'Firoz Ahmed Khan',0,1);

		$this->Cell(6,5.3, '',0,0);
	    $this->Cell(80,5.3, 'LONDON',0,0);
	    $this->Cell(30,5.3, 'Seller Name: ',0,0);
	    $this->Cell(0,5.3, 'Analogur Seduction',0,1);

	    $this->Cell(6,5.3, '',0,0);
	    $this->Cell(80,5.3, 'E1 5EEE',0,0);
	    $this->Cell(30,5.3, '',0,0);
	    $this->Cell(0,5.3, '',0,1);

	    $this->Cell(6,5.3, '',0,0);
	    $this->Cell(80,5.3, 'United Kingdom',0,0);
	    $this->Cell(30,5.3, '',0,0);
	    $this->Cell(0,5.3, '',0,1);
		$this->Ln(8);

	   
	}

	function OrderTitle(){

 		$this->Cell(2.5,0,'', 0, 0);
		
	    $this->SetFont('Arial','',11);
	    $this->Cell(20,10, 'Quantity',1,0,'C');
	    $this->Cell(115,10, 'Product Details',1,0,'C');
	    $this->Cell(25,10, 'Price ',1,0,'C');
	    $this->Cell(25,10, 'Sub-Total ',1,1,'C');

	    $this->y = $this->GetY();
	}

	function Orderdetails(){

 		
		for ($i=0; $i <3 ; $i++) { 
			$this->Cell(2.5,0,'', 0, 0);
			$this->SetFont('Arial','',11);
		    $this->Cell(20,30, 'Quantity',1,0,'C');
	    	$this->product();
	    	$this->Rect(147.5,$this->y-23, 25, 30);
		    $this->Cell(25,-18, 'Price ',0,0,'C');
		    $this->Rect(172.5,$this->y-23, 25, 30);
		    $this->Cell(25,-18, 'Sub-Total ',0,0,'C');
		    $this->Cell(.01,7,'', 0, 1);
		    $this->y = $this->GetY();
		}
	    

	    
	}

	function product(){
		$this->Rect(32.5,$this->y, 115, 30);
		$this->SetFont('Times','',11);
	    $this->Cell(115,8, 'Analogue Studio 12" Resealable Record Sleaves- pack of 50',0,1,'L');
	    $this->SetFont('Arial','',9);
	    $this->Cell(22.5,0,'', 0, 0);
	    $this->Cell(115,5, 'Product Code',0,1,'L');
	    $this->Cell(22.5,0,'', 0, 0);
	    $this->Cell(115,5, 'Size:',0,1,'L');
	    $this->Cell(22.5,0,'', 0, 0);
	    $this->Cell(115,5, 'Color:',0,1,'L');
	    $this->Cell(22.5,0,'', 0, 0);
	    $this->Cell(115,5, 'Shop Name:',0,0,'L');
	}

	function OrderTotal(){


		$orderAmt = 'Tk.'.number_format(1586523);
		$deliveryAmt = 'Tk.'.number_format(158);

		
		$w1 = $this->GetStringWidth($orderAmt)+3;
		$w2 = $this->GetStringWidth($deliveryAmt)+3;
		$w = 190-( $w1 + $w2);
   	

		$this->Rect(12.5,$this->y, 185, 16);
		$this->SetFont('Arial','',11);
		$this->Ln(2);

	    $this->Cell(150,7, 'Order : ',0,0,'R');
	    $this->Cell(30,7, $orderAmt ,0,1,'R');

	    $this->Cell(150,7, 'Delivery : ',0,0,'R');
	    $this->Cell(30,7, $deliveryAmt ,0,1,'R');

	    $this->Rect(12.5,$this->y, 185, 12);
		$this->SetFont('Times','',15);
		$this->Cell(2.5,0,'', 0, 0);
		$this->Ln(3);
		$this->Cell(145,7, 'Order Tolal : ',0,0,'R');
	    $this->Cell(35,7, $orderAmt ,0,1,'R');
	    $this->Ln(8);
	}


	// Page footer
	function PdfFooter()
	{	
		$btmFst = 'Thanks for buying on Amazon Marketplace.To  provide feedback for the seller please visit';
		$siteUrl = 'www.mydorpon.com';
		$btmSec = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id cum nisi voluptatem odit dolores, qui inventore";
		$btmTrd = "voluptate, vitae repudiandae voluptatibus.";

		$this->SetLeftMargin(10);
		$this->SetFont('Arial','',10.9);
		$this->Cell(154,5, $btmFst ,0,0);
		$this->SetTextColor(12,29,150);
		$this->Cell(0,5, $siteUrl ,0,1);
		$this->SetTextColor(0,0,0);
		$this->Cell(0,5, $btmSec ,0,1);
		$this->Cell(0,5, $btmTrd ,0,1);
	    
	}

	function Footer(){
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','B',10);
		// Page number
		$this->Cell(0,5, $this->PageNo() ,0,0,'R');
	}
}

$pdf = new MyPdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->PdfHeader();
$pdf->OrderId();
$pdf->DeleveryInfo();
$pdf->OrderTitle();
$pdf->Orderdetails();
$pdf->OrderTotal();
$pdf->PdfFooter();
$pdf->SetFont('Arial','B',16);

$pdf->Output();
?>