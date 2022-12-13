<?php  
 $conn = new mysqli("localhost", "root", "", "productmanagement");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
    $order = 'asc';  
 }  
 else  
 {  
    $order = 'desc';  
 }  
 $query = "SELECT * FROM product ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($conn, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
        <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID</a></th>  
        <th><a class="column_sort" id="productname" data-order="'.$order.'" href="#">Product Name</a></th>  
        <th><a class="column_sort" id="sku" data-order="'.$order.'" href="#">SKU</a></th>  
        <th><a class="column_sort" id="multiselect" data-order="'.$order.'" href="#">Pattern</a></th>  
        <th><a class="column_sort" id="size" data-order="'.$order.'" href="#">Size</a></th>
        <th><a class="column_sort" id="quantity" data-order="'.$order.'" href="#">Quantity</a></th>  
        <th><a class="column_sort" id="shipping" data-order="'.$order.'" href="#">Shipping</a></th>  
        <th><a class="column_sort" id="sel" data-order="'.$order.'" href="#">Status</a></th>  
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["id"] . '</td>  
           <td>' . $row["productname"] . '</td>  
           <td>' . $row["sku"] . '</td>  
           <td>' . $row["pattern"] . '</td>  
           <td>' . $row["size"] . '</td> 
           <td>' . $row["quantity"] . '</td>  
           <td>' . $row["shipping"] . '</td>  
           <td>' . $row["status"] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  