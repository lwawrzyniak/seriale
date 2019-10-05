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
        
        </header>
        
               
            <?php
            require_once 'seriale_silnik.php';
                               
                $s = new Seriale ("localhost", "root", "", "seriale");
                                
                if (isset($_POST['serial']))
                {
                   $s -> dodaj($_POST['serial']);
                   header('Location: index.php');
                }
               
                if (isset($_GET['usun']))
                {
                   $s -> usun($_GET['id']);
                }
               
                
                if (isset($_GET['update']))
                {
                   $s->update($_POST['sezon'],$_POST['odcinek'],$_POST['platforma'],$_POST['uwagi'],$_POST['stan'],$_GET['id']);
                }

            ?>   
                
                <div class="lista">
                <form action ="index.php" method="POST">
                Nowy Serial: <input type = "text" name="serial" style="width: 400px;"/>
                <input type="submit" value="Dodaj"/>
                </form>
                </div> 
                
        
        
                <?php


                $wyswietl = $s -> wyswietl();
               
                    echo "<table><tr>".
                            "<td>Nazwa serialu</td>".
                            "<td>Sezon</td>".
                            "<td>Odcinek</td>".
                            "<td>Platforma</td>".
                            "<td>Uwagi</td>".
                            "<td>Zakonczony</td>".
                          '</tr></table>';
                
                
                foreach ($wyswietl as $wiersz)
                {
                    echo "<table><tr>".
                            "<td>".$wiersz['nazwa_serialu']."</td>".
                            "<form action ='index.php?update&id=".$wiersz['id']."' method='POST'>".
                            "<td><input type = 'number' name='sezon' value='".$wiersz['sezon']."'</td>".
                            
                            "<form action ='index.php?update&id=".$wiersz['id']."' method='POST'>".
                            "<td><input type = 'number' name='odcinek' value='".$wiersz['odcinek']."'</td>".
  
                            "<form action ='index.php?update&id=".$wiersz['id']."' method='POST'>".
                            "<td><input type = 'text' name='platforma' value='".$wiersz['platforma']."'</td>".

                            "<form action ='index.php?update&id=".$wiersz['id']."' method='POST'>".
                            "<td><input type = 'text' name='uwagi' value='".$wiersz['uwagi']."'</td>".
                            
                            "<form action ='index.php?update&id=".$wiersz['id']."' method='POST'>".
                            "<td><input type = 'text' name='stan' value='".$wiersz['stan']."'</td>".
                            
                            "<td><a href = index.php?usun&id=".$wiersz['id'].">usun</a></td>".
                            "<td> <input type='submit' value='Update'/></td></form>".
                            '</tr></table>';

                 }
   
               ?>
        

    </body>
</html>
