<?php
include '/template/header_view.php';
include '/template/left_view.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kullanıcı İşlemleri</h1>            
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
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Yeni Ekle</button>
            <br/><br/>
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; font-weight: bold;">
                    Kullanıcı Listesi
                </div>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr style="text-align: center; font-weight: bold">
                            <td>Kullanıcı Adı</td>
                            <td>Email</td>
                            <td>Ad</td>
                            <td>Soyad</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (is_array($kullaniciListesi)) { ?>
                            <?php foreach ($kullaniciListesi as $kullanici) { ?>
                                <tr class='odd gradeX'>
                                    <td> <?php echo $kullanici->kullaniciAdi; ?></td>
                                    <td> <?php echo $kullanici->email; ?></td>
                                    <td> <?php echo $kullanici->ad; ?></td>
                                    <td> <?php echo $kullanici->soyad; ?></td>
                                    <td><a id="silButon" data-toggle="modal" data-target="#silOnay" data-id="<?php echo $kullanici->kullaniciAdi; ?>">Sil</a></td>
                                </tr>
                            <?php }
                        } ?> 
                          <?php if (!$kullaniciListesi) {
                              echo 'Kullanıcı Listesi Boştur.';
                          } ?>      
                    </tbody>
                </table>
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
                <form action="<?php echo SITE_URL; ?>/kullanici/yeniKullaniciEkle" method="post">    
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input class="form-control" name="kullaniciAdi" placeholder="Kullanıcı Adı" required pattern=".{5,}"   required title="Minimum 5 karakter giriniz.">
                    </div>
                    <div class="form-group">
                        <label>E-Posta Adresi</label>
                        <input class="form-control" name="email" placeholder="E-posta Adresi" required pattern=".{5,}"   required title="Minimum 5 karakter giriniz.">
                    </div>
                    <div class="form-group">
                        <label>Ad</label>
                        <input class="form-control" name="ad" placeholder="Ad" required pattern=".{3,}"   required title="Minimum 3 karakter giriniz.">
                    </div>
                    <div class="form-group">
                        <label>Soyad</label>
                        <input class="form-control" name="soyad" placeholder="Soyad" required pattern=".{5,10}" required title="5 ile 10 karakter arasında bir yazı giriniz.">                       
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" name="password" placeholder="Şifre" required>
                    </div>
                    <input type="submit" name="kullaniciKaydet" class="btn btn-success btn-lg" value="Kaydet">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade slide left" id="silOnay" tabindex="-1" role="dialog" aria-labelledby="silOnayLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Kullanıcı Sil Onay</h3>
            </div>
            <div class="modal-body">                    
                Emin misiniz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="silOnayButon">Evet</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Hayır</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('silButon').click(function () {
       // var ID = $(this).data('id');
       var ID = $(this).attr('data-id');
        $('#silOnayButon').attr('data-id', ID);
    });
    $('#silOnayButon').click(function () {
        var ID = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo SITE_URL; ?>/kullanici/silKullanici/" + ID
        });
    });
</script>