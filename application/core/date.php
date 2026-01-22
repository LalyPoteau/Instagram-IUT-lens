<?php
function format_date($date){
  return date_format(date_create($date), 'd/m/Y');
}

function has_passed($date){
  if (defined('DEBUG_PASSED')) return DEBUG_PASSED;
  return new DateTime()>= new DateTime($date);
}
 ?>
