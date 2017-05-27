<?php
//connect to database 
  
 			$counter = 0;
             //get items
			 if ($_GET[cat_id] != "" ) {
             //get items
			 $cat_id = $_GET[cat_id];
			 $cat_name = $_GET[sprintell];
							 
             $get_items = "select id, item_title, item_price, item_desc, item_image
             from store_items where cat_id = $cat_id order by item_title";
             
			 $get_items_res = mysql_query($get_items) or die(mysql_error());
  
             if (mysql_num_rows($get_items_res) < 1) {
                  $central_block = "<P><em>Sorry, no items in
                   this category.</em></p>";
              } else {
				  
                  while ($items = mysql_fetch_array($get_items_res)) {
                      $item_id = $items[id];
                      $item_title = stripslashes($items[item_title]);
                      $item_price = $items[item_price];
  					  $item_image = $items[item_image];
					  $item_desc = $items[item_desc];
					  
					  $minDEsc = substr($item_desc, 0, 200);
					 
                  }
  
                  
             }
          
  
			 }
			 
$central_block .= "<img src=\"pixstorematerial/$item_image \" class=\"floated2\" />
            <h2>$item_title ($item_price) $deletelink </strong></h2>
            <p>$minDEsc<br />
            <a href=\" globalNewsfull.php?instructor=$id \"><strong>Read all &#187;</strong></a></p>
            <div class=\"clr\"></div>
					  ";
					  
					
  
  ?>
  
