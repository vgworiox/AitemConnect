<?php
class Order_m extends CI_Model
 {
   function getAllOrders() {   
      /* API URL */
      $postData = json_decode(file_get_contents('php://input'));
      //$firstName = $postData->firstName;   
      $token=$this->session->userdata('api-key-token');  
      $t="K5WkApK4pGBazFpXZSz8HrcCNcjPXU8rvURxqCbr3Vj7TcCOY8r6xt5NCzmV+HT1lio/BKKzHLVH3f3LgsrVDg==";
    
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'http://3.139.65.132:8080/orders');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_GET, true);
      //curl_setopt($ch, CURLOPT_POSTFIELDS,$d);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('api-key-token:'.$token,'Content-Type: application/json', 'Accept: application/json'));
      $out = curl_exec($ch);
         if ($out === false) {
         echo 'Curl error : ' . curl_error($ch);
         }   
      curl_close($ch);      
      return $out;    
      }
    }
?>
