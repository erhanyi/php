<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr"
      xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title> İsim Listesi </title>
    </head>
    <body>
        <h1>Yeni İsim</h1>
        <table border="1px;">
            <tr>
                <td>Id</td>
                <td>Ad</td>
                <td>Soyad</td>
                <td>İşlemler</td>
            </tr>
            <?php
            
            foreach ($isimListesi as $key => $value) {
                echo "<tr>";
                    echo "<td>".$value["id"]."</td>";
                    echo "<td>".$value["ad"]."</td>";
                    echo "<td>".$value["soyad"]."</td>";
                    echo "<td>";
                    echo "<a href='http://localhost/PhpProject/index/isimDuzenle".$value["id"]."'>Düzenle</a>";
                    echo "<a href='http://localhost/PhpProject/index/isimSil".$value["id"]."'>Sil</a>";
                    echo "</td>";
                echo "</tr>";
            }
            
            ?>
            
        </table>
    </body>
</html>