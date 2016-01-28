 <?php
    require('phpToPDF.php');
    //Set Your Options -- see documentation for all options
    $pdf_options = array(
          "source_type" => 'url',
          "source" => 'http://tungstenbigdata.com/testweb/beautyhome/gift.html',
          "action" => 'view',          
          "file_name" => 'bh_voucher.pdf');
		
    //Code to generate PDF file from options above
    phptopdf($pdf_options);    
?>