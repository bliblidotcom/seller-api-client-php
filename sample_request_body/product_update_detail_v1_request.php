<?php
  $body = array(
    "merchantCode" => "ABC-60025",
    "productDetailRequests" => array(
      array( 
        "productSku" => "TOS-16005-00009",
        "productCode" => "MTA-0306263",
        "businessPartnerCode" => "TOS-16005",
        "synchronize" => false,
        "productName" => "Merchant Product",
        "productType" => 1,
        "categoryCode" => "AN-40001",
        "categoryName" => "Android",
        "categoryHierarchy" => "Handphone & Tablet > Handphone > Android",
        "brand" => "Samsung",
        "description" => "",
        "specificationDetail" => "<p>Product description </p>",
        "uniqueSellingPoint" => "<ul><li>Outlet<ul><li>Jakarta Pusat - Plaza Indonesia</li></ul></ul>",
        "productStory" => "<p>product unique selling point</p>",
        "items" => array(
          "itemSku" => "TOS-16005-00009-00001",
          "skuCode" => "MTA-0306263-00001",
          "merchantSku" => "MY-SKU-001",
          "upcCode" => "1231230010123",
          "itemName" => "Merchant Product Jakarta Pusat - Plaza Indonesia Black",
          "length" => 1,
          "width" => 2,
          "height" => 1,
          "weight" => 0.01,
          "shippingWeight" => 0.02,
          "dangerousGoodsLevel" => 0,
          "lateFulfillment" => true,
          "pickupPointCode" => "PP-3000408",
          "pickupPointName" => "Haneda Store",
          "deltaStock" => 0,
          "synchronizeStock" => false,
          "prices" => array(
            array( 
              "channelId" => "DEFAULT", 
              "price" : 100000, 
              "salePrice" => 100000, 
              "discountAmount" => null, 
              "discountStartDate" => null, 
              "discountEndDate" => null, 
              "promotionName" => null
            )
          ),
          "viewConfigs" => array(
            array(
              "channelId" => "DEFAULT", 
              "display" => true, 
              "buyable" => true
            )
          ),
          "images" => array(
            array("mainImage" => true, "sequence" => 0, "locationPath" => "/535/samsung_merchant-product_full03.jpg"),
            array("mainImage" => false, "sequence" => 1, "locationPath" => "/535/samsung_merchant-product_full04.jpg"),
          ),
          "off2OnActiveFlag" => false
        ),
        "attributes" => array(
          array(
            "attributeCode" => "BR-M036969", 
            "attributeType" => "PREDEFINED_ATTRIBUTE", 
            "values" => array("4 MP"),
            "skuValue" => false, 
            "attributeName" => "Brand",
            "itemSku" => null
          ),
          array(
            "attributeCode" => "KA-0000001", 
            "attributeType" => "DESCRIPTIVE_ATTRIBUTE", 
            "values" => array("Samsung"),
            "skuValue" => false, 
            "attributeName" => "Kamera",
            "itemSku" => null
          )
        ),
        "images" => array(
          array("mainImage" => true, "sequence" => 0, "locationPath" => "/535/samsung_merchant-product_full01.jpg"),
          array("mainImage" => false, "sequence" => 1, "locationPath" => "/535/samsung_merchant-product_full02.jpg"),
          array("mainImage" => false, "sequence" => 2, "locationPath" => "/535/samsung_merchant-product_full03.jpg")
        ),
        "url" => "https://www.youtube.com/merchant-video",
        "installationRequired" => false
      )
    )
  );
?>