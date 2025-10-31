<html>
    <head></head>
    <body>
        <form action="#" method="POST">
            <input type="number" name="number" min="1" max="10">
            <button button="submit">Lihat</button>
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){ //kalau ada submit post ini jalan
                $nm = intval($_POST['number']); //ubah dari string ke tipedata int
              
                for($i=0; $i < $nm; $i++){ // itung dulu mulai dari brp $numbernya  buat looping baris
                    for($j=0; $j < $nm; $j++){ //kolom nya ada  berapa
                        if($j == $nm - 1 - $i){  //ini buat posisi kolom 
                            echo $nm - $i;  //buat cek angka nurun dari nomor yang paling besar
                        } else{
                            echo "*"; //isi kekosongan di posisi yang bukan kolom
                        }
                    }
                    echo "<br/>";
                }
            }
        
        ?>
</html>