<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>Sistema facturación</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container">		
<h2 class="title"></h2>
<?php include('menu.php');?>	
<style>
        body{font-family: Arial; background-color: #256999; box-sizing: border-box; padding: 100px;}

        form{
            background-color: white;
            border-radius: 0 0 3px 3px;
            color: #999;
            font-size: 0.8em;
            padding: 20px;
            margin: 0 auto;
            width: 500px;
        }

    </style>  
    
<table id="data-table" class="table table-condensed table-striped">

<thead>
  <tr>
    <th width="10%">FAC.No.</th>
    <th width="25%">FECHA DE CREACIÓN</th>
    <th width="35%">CLIENTE</th>
    <th width="15%">FACTURA TOTAL</th>
    <th width="3%"></th>
    <th width="3%"></th>
    <th width="3%"></th>
  </tr>
</thead>
<?php		
$invoiceList = $invoice->getInvoiceList();
foreach($invoiceList as $invoiceDetails){
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
    echo '
      <tr>
        <td>'.$invoiceDetails["order_id"].'</td>
        <td>'.$invoiceDate.'</td>
        <td>'.$invoiceDetails["order_receiver_name"].'</td>
        <td>'.$invoiceDetails["order_total_after_tax"].'</td>
        <td></td>
        <td><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'"  title="Editar Factura"><div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div></a></td>
        <td><a href="#" id="'.$invoiceDetails["order_id"].'" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>
    ';
}       
?>
</table>	
</div>	
<?php include('footer.php');?>