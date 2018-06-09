<?php
//echo "<pre>";print_r($_POST);exit;
if(isset($_POST['mobile']) && $_POST['mobile'] <> ''){
    $mobile = $_POST['mobile'];
    $mobileArray = explode(",", $mobile);
    foreach($mobileArray as $key=>$val){
        if($val <> ''){
            $val = trim($val);
             $url = "http://192.168.3.251/test.ajax?do=manualUpload&username=admin&password=contaquenv&campname=PERSONAL_LOAN&skillname=API_CALLS&listname=api_calls&phone1=$val&status=NEW";
              $ch = curl_init();
                $headers = array(
                //'Accept: application/json',
                'Content-Type: application/x-www-form-urlencoded',
                );
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
             curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Timeout in seconds
       // curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            $result = curl_exec($ch);
            if($result){
               echo $val." Number Successfully Pushed To Dialer"; 
            }else{
                 echo $val." Number Error"; 
            }
  
        }
    }
}else{
    echo "Data Not Present";
}

?>