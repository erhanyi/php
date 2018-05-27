<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr"
      xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title> Yeni İsim </title>
    </head>
    <body>
        <?php
        if (isset($mesaj)) {
            echo "<h3>" . $mesaj["mesaj"] . "</h3>";
        }
        ?>
        <h1>Yeni İsim</h1>
        <form action="http://localhost/PhpProject/index/isimKaydet" method="post">
            <label>Id</label><br/>
            <input type="text" name="id"/><br/><br/>
            <label>Ad</label><br/>
            <input type="text" name="ad"/><br/><br/>
            <label>Soyad</label> <br/>
            <input type="text" name="soyad"/><br/><br/>
            <button type="submit">Kaydet</button>
        </form>
    </body>
</html>