<?php
    include '/template/header_view.php';
    include '/template/left_view.php';
    ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Yeni Kullanıcı Ekle</h1>
        </div>
    </div>
    <?php if (isset($formAddInfo)) { ?>
        <div class="alert alert-info" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo 'Bilgi: ' . $formAddInfo; ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Yeni Ekle</button>

                    Kullanıcı Listesi
                    
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Ad</td>
                                <td>Soyad</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($userList as $key => $value) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>" . $value["id"] . "</td>";
                                echo "<td>" . $value["ad"] . "</td>";
                                echo "<td>" . $value["soyad"] . "</td>";
                                echo "</tr>";
                            }
                            ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade slide left" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Yeni Kullanıcı Ekle</h3>
            </div>
            <div class="modal-body">
                <form action="<?php echo SITE_URL; ?>/panel/addNewUserRun" method="post">                   
                    <div class="form-group">
                        <label>Ad</label>
                        <input class="form-control" name="ad" placeholder="Adınız" required pattern=".{3,}"   required title="Minimum 3 karakter giriniz.">
                    </div>
                    <div class="form-group">
                        <label>Soyad</label>
                        <input class="form-control" name="soyad" placeholder="Soyadınız" required pattern=".{5,10}" required title="5 ile 10 karakter arasında bir yazı giriniz.">                       
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" name="password" placeholder="Şifreniz" required>
                    </div>
                    <input type="submit" name="submitted" class="btn btn-success btn-lg" value="Ekle">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>


