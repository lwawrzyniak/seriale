<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seriale</title>
         <meta name="description" content="Strona sledzi postep ogladanych seriali"/>
         <meta http-equiv="X-UA-Compatible content="IE=edge, chrome=1"/>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            
            <div class="lista">
                 <h1> Lista Seriali </h1>
            </div>
            
            <div class="rectangle">
              
                <div class="lista">
                <form action ="index.php?akcja=dodaj" method="post">
                Nowy Serial: <input type = "text" name="serial" style="width: 400px;"/>
                <input type="submit" value="Dodaj"/> 
                </div>  
        </header> 
        
                <?php
                require_once 'seriale_silnik.php';
                
                $s = new Seriale ("localhost", "root", "", "seriale");
                $wyswietl = $s -> wyswietl();
               
                    echo "<table><tr>".
                            "<td>Nazwa serialu</td>".
                            "<td>Sezon</td>".
                            "<td>Odcinek</td>".
                            "<td>Platforma</td>".
                            "<td>Uwagi</td>".
                            "<td>Stan</td>".
                          '</tr></table>';
                
                
                foreach ($wyswietl as $wiersz)
                {
                    echo "<table><tr>".
                            "<td>".$wiersz['nazwa_serialu']."</td>".
                            "<td>".$wiersz['sezon']."</td>".
                            "<td>".$wiersz['odcinek']."</td>".
                            "<td>".$wiersz['platforma']."</td>".
                            "<td>".$wiersz['uwagi']."</td>".
                            "<td>".$wiersz['stan']."</td>".
                          '</tr></table>';
                }
   
               ?>
        

    </body>
</html>
