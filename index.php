<?php

switch($_GET['p']) {
  default:
    include("table.php");
    break;
    
  case 'add':
    include("form_create.php");
    break;
    
  case 'remove':
    include("pro_delete.php");
    break;
    
  case 'preview':
    include("product-details.php");
    break;
}
