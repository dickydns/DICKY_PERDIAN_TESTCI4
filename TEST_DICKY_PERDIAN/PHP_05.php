<?php
    function acak($kata1, $kata2){
        //ubah lowercase
        $k1=strtolower($kata1);//format karakter
        $k2=strtolower($kata2);
        
        $k1_split = str_split($k1); // jadikan array
        $k2_split = str_split($k2); 
       
        sort($k1_split); //urutkan array 
        sort($k2_split); 
      
        if($k1_split == $k2_split){ //cek jika sama text nya maka true
            echo "true"." <br/>"; 
        }  else{
            echo "false"." <br/>";
        }
      
    }


    acak('satu', 'tuas');"<br/>";
    acak('tea', 'eat');"<br/>";
    acak('tea', 'tie');"<br/>";
    acak('bara', 'riba');"<br/>";

?>