<?php

function getVendors()
{
 $CI =& get_instance();
 $query = $CI->db->query(
  'SELECT a.*,
     (
      SELECT COUNT(*) 
     FROM vendors 
     WHERE category_id = a.category_id
     ) jumlah
  FROM vendors a ')->result();
 
 return $query;
}