
<?php
class Register_m extends CI_Model
 {
   function getAllAvalStores() {   
      /* API URL */
      $postData = json_decode(file_get_contents('php://input'));
      //$firstName = $postData->firstName;   
      $token=$this->session->userdata('api-key-token');  
		
      $t="fzCX5UnRIfCaOYEO6B87W4VbZKOG+hw6WmxxIvImWMGEoL21Mc7yXJTIR9EU5o88tmlRE/nR7VXuVi6awnu3+w==";
     $root="http://".$_SERVER['HTTP_HOST'].":8080";     
      $urll ="$root";
    $url="http://3.139.65.132:8080";
      /* Init cURL resource */
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'http://3.139.65.132:8080/stores');
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
      function getAllStoresProducts() {   
         /* API URL */
         $postData = json_decode(file_get_contents('php://input'));
         $storeId = $this->input->get("storeId");   
       
         $token=$this->session->userdata('api-key-token');  
         $tr="TA/0V1TNaFMo+A7vj/zUrilnItgKGt7mB/1XlZbLRuGQHdEXXYCrBtCQ6QIJySWLTs/1PVGwpPNtKTwFDuxCyQ==";
         $t="U9y+eHeUyL7S9hmE4OuwbDTKpkHVvvG2AK/Mt+PuPkhikK6RkwMZg0i+QlCRwJc/pYwk4nD/Xa5skCE+hTqEZg==";
       
       $url='http://3.139.65.132:8080/stores/'.$storeId.'/items';
      
         $ch = curl_init();
         //curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_URL,$url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // curl_setopt($ch, CURLOPT_GET, true);
         //curl_setopt($ch, CURLOPT_POSTFIELDS,$storeId);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('api-key-token:'.$token,'Content-Type: application/json', 'Accept: application/json'));
         $out = curl_exec($ch);
            if ($out === false) {
            echo 'Curl error : ' . curl_error($ch);
            }   
         curl_close($ch);  
     
      return $out;    
      }
    function loginUser() {
    
        $postData = json_decode(file_get_contents('php://input'));
        $username=$postData->username; 
        $password=$postData->password;   
    
         $data = array(
            'username'=>$username, 
            'password'=>$password
         );    
         $d=json_encode($data);
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,'http://3.139.65.132:8080/login');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS,$d);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
         $out = curl_exec($ch);
            if ($out === false) {
            echo 'Curl error : ' . curl_error($ch);
            }
         curl_close($ch);
      
         $var = json_decode($out, true);  
        $var2 = json_decode($d, true);      
         if(!isset($var['authToken'])){
            return -1;
        } 
	 else{
         $newdata = [               
            'api-key-token'=>$var['authToken'],           
            'role' =>$var['profileType'],
            'username'=>$var2['username'],
            'logged_in' => TRUE
         ];      
        $this->session->set_userdata($newdata);      
        return $out;
        }
    }     
    
    function registerUser() {
        
        $postData = json_decode(file_get_contents('php://input'));
        $firstName = $postData->firstName;       
        $lastName=$postData->lastName;     
        $email=$postData->email; 
        $phone=$postData->phone; 
        $state=$postData->state; 
        $city=$postData->city;
        $username=$postData->username; 
        $password=$postData->password;   
        $profileType=$postData->profileType; 
        $addressName=$postData->addressName; 
        $streetAddress=$postData->streetAddress; 
        $streetAddress1=$postData->streetAddress1; 
        $zip=$postData->zip; 
      
       $root="http://".$_SERVER['HTTP_HOST'].":8080";     
      $urll ="$root"; 
     $url="http://3.139.65.132:8080";
        $data = array(
         "address" => array (
                 'addressName'=>$addressName,
                 'city'=>$city,
                 'state'=>$state, 
                 'streetAddress'=>$streetAddress,
                 'streetAddress1'=>$streetAddress1,
                 'zip'=>$zip
         ),
         'email'=>$email, 
         'firstName'=>$firstName, 
         'lastName'=>$lastName,         
         'phone'=>$phone,         
         'password'=>$password,
         'profileType'=>$profileType,
         'username'=>$username, 
         );  
        $d=json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://3.139.65.132:8080/user');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$d);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        $out = curl_exec($ch);
           if ($out === false) {
           echo 'Curl error : ' . curl_error($ch);
           }
        curl_close($ch);      
        var_dump($out);        
      
       return $out;
      }
            
      function getAllStores() {   
             /* API URL */
             $postData = json_decode(file_get_contents('php://input'));
           
             $token=$this->session->userdata('api-key-token');  
             $t="fzCX5UnRIfCaOYEO6B87W4VbZKOG+hw6WmxxIvImWMGEoL21Mc7yXJTIR9EU5o88tmlRE/nR7VXuVi6awnu3+w==";
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://3.139.65.132:8080/stores');
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
      function getAllProducts() {   
         /* API URL */
         $postData = json_decode(file_get_contents('php://input'));
         $storeId = $this->input->get('storeId');   
         $token=$this->session->userdata('api-key-token');  
         $tr="TA/0V1TNaFMo+A7vj/zUrilnItgKGt7mB/1XlZbLRuGQHdEXXYCrBtCQ6QIJySWLTs/1PVGwpPNtKTwFDuxCyQ==";
         $t="1fa279e8-e2ee-4c83-83ef-a7f448bd788b";
       
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'http://3.139.65.132:8080/stores/'.$storeId.'/items');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_GET, true);
         //curl_setopt($ch, CURLOPT_POSTFIELDS,$d);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('api-key-token:'.$token,'Content-Type: application/json', 'Accept: application/json'));
         $out = curl_exec($ch);
            if ($out === false) {
            echo 'Curl error : ' . curl_error($ch);
            }   
         curl_close($ch); 
      //   $var = json_decode($out, true);    
      return $out;    
      }
}
?>
