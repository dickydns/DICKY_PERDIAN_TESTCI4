<?php
    function faktorBesar($a , $b){
        $cek_faktor_a = []; //simpan data sementaraa
        $cek_faktor_b = []; //simpan data sementaraa

        //cek faktor a bagi sampah habis
        for($i=1; $i <= $a; $i++){
            if($a % $i == 0){
                $cek_faktor_a[] = $i;
            }
        }

        //cek faktor b bagi sampah habis 
        for($i=1; $i<=$b; $i++){
            if($b % $i == 0){
                $cek_faktor_b[] = $i;
            }
        }
     

        //cek faktor yang sama besar
        $cek_faktor_besar =1;
        for($i= 0; $i < count($cek_faktor_a);  $i++){ //perulangan  cek faktor a
            for($s=0; $s < count($cek_faktor_b); $s++){ // perulangan untuk cek faktor b
                if($cek_faktor_a[$i] == $cek_faktor_b[$s]){ //cek faktor a dan b jika sama
                    if($cek_faktor_a[$i] > $cek_faktor_besar){ //cek faktor a lebih besar dari faktor b
                        $cek_faktor_besar = $cek_faktor_a[$i]; //
                    }
                }
            }
        }


        echo $a ." angka penyusunnya  [".implode(", ", $cek_faktor_a)."]<br/>"; //hasil a
        echo $b ." angka penyusunnya  [".implode(", ", $cek_faktor_b)."]"; //hasil b
        echo "<br> faktor terbesarnya ".$cek_faktor_besar;

    }


    faktorBesar(12, 36);

?>