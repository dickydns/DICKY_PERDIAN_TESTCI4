<?php
  $json = [
        ["name"=> "Alice", "age"=> 25],
        ["name"=> "Bob", "age"=> 18],
        ["name"=> "Charlie", "age"=> 30]
    ];     
    function filterByAge($json, $min_age){
        $orang = []; //tampung data orang
        
        foreach($json as $key => $val){
            $umr = $val['age']; //get data umur
            if($umr > $min_age){ //validasi
                $orang[] = $val; //simpan jika lebih besar dari min
            }
        }   
       return json_encode($orang); //return ubah ke json
    } 

    print(filterByAge($json, 20));
?>