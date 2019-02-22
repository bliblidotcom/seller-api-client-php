<?php
  $body = array(
    "merchantCode" => "ABC-60025",
    "productRequests" => array(
      array(
        "gdnSku" => "TOQ-15130-00001-000004",
        "stock" => 5,
        "minimumStock" => 1,
        "price" => 100000,
        "salePrice" => 100000,
        "buyable" => true,
        "displayable" => true
      ),
      array(
        "gdnSku" => "TOQ-15130-00025-000002",
        "stock" => -10,
        "minimumStock" => 1,
        "price" => 1250000000,
        "salePrice" => 1250000000,
        "buyable" => false,
        "displayable" => false
      )
    )
  );
?>