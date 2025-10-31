<?php
    $array = [790, 483, 281, 224, 483, 60, 698, 483, 790, 168];
    function angka_count($Data){
        $angka_muncul_freq =[]; //Penyimpanan data 
        for($i =0 ; $i < count($Data); $i++){
            $angka = $Data[$i]; //ambil data berdasarkan perulangan
            $sama  = false; // ini untuk cek
            

            //perulangan jika penyimpanan data tidak kosong
            foreach($angka_muncul_freq as $key => $val){
                if($key == $angka){ 
                    $angka_muncul_freq[$key] = $val + 1; //menambahkan value dengan key angka yang sama
                    $sama = true; //set status ke true untuk skip kondisi if di bawah
                    break;
                }
            }

            //Jika data tidak ada yang sama  di perulangan foreach dia akan otomatis set 1
            if(!$sama){
               $angka_muncul_freq[$angka] = 1; 
            }
        }

        //melakukan perulangan dari penyimpanan data untuk menampilkan hasil
        foreach($angka_muncul_freq as $key => $jmlh){
            if($jmlh > 1){ //jika lebih dari 1 berarti datanya double
                echo $key.' : '.$jmlh.'<br/>';
            }
        }
    }

    //pangil fungsi 
    angka_count($array);
?>