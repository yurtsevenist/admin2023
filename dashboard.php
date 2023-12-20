
<?php
include "layouts/header.php";
include "layouts/aside.php";

  include "php/connect.php";
  $sorgu=$baglanti->prepare("SELECT count(*) as toplammesaj FROM messages");
  $sorgu->execute();
  $toplammesaj=$sorgu->fetchColumn();
  $status=1;
  $sorgu=$baglanti->prepare("SELECT count(*) as cevaplananmesaj FROM messages WHERE status=?");
  $sorgu->execute(array($status));
  $cevaplananmesaj=$sorgu->fetchColumn();

  $sorgu=$baglanti->prepare("SELECT count(*) as kullanicisayisi FROM users");
  $sorgu->execute(); 
  $kullanicisayisi=$sorgu->fetchColumn();
  //gelen mesajları alıyoruz
  $sorgu=$baglanti->prepare("SELECT * FROM messages ORDER BY date DESC LIMIT 5");
  $sorgu->execute();
  $mesajlar=$sorgu-> fetchAll(PDO::FETCH_OBJ);
  $sira=1;
   //kullanıcıları alıyoruz
   $sorgu=$baglanti->prepare("SELECT * FROM users ORDER BY date DESC LIMIT 5");
   $sorgu->execute();
   $users=$sorgu-> fetchAll(PDO::FETCH_OBJ);
   $sira2=1;
?>  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
<div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Anasayfa</a></li>             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $toplammesaj ?></h3>

                <p>Gelen Mesaj Sayısı</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $cevaplananmesaj ?></h3>

                <p>Cevaplanan Mesaj Sayısı</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Daha Fazla Bilgi<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $kullanicisayisi ?></h3>

                <p>Kayıtlı Kullanıcı Sayısı</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Ziyaretçi Sayısı</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Daha Fazla Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

    </div>
    <div class="row">
      <div class="col-md-6">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Son Gelen Mesajlar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sıra</th>                   
                    <th>E-Posta</th>
                    <th>Konu</th>
                    <th>Mesaj</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php foreach($mesajlar as $mesaj) { ?>
                                            <tr>
                                                <td><?php echo $sira++ ?></td>                                             
                                                <td><?=$mesaj->email?></td>
                                                <td><?=$mesaj->subject?></td>
                                                <td><?=$mesaj->message?></td>
                                                <td><?=$mesaj->date ?></td>
                                                <td><?php if($mesaj->status==0) { echo "<span class='text-danger'>Okunmadı</span>";} else { echo "<span class='text-info'>Cevaplandı</span>";}  ?></td>
                                                <td style="width:100px;">
                                                  <a href="mesajcevap.php?id=<?=$mesaj->id?>" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                                                  <a type="button" class="btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteMessageModal" mid="<?php echo $mesaj->id ?>"><i class="fas fa-trash" title="Sil"></i></a>
                                               
                                            </tr>
                                         <?php } ?>   
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
      <div class="col-md-6">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Son Kayıt Olan Kullanıcılar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sıra</th>
                    <th>İsim</th>
                    <th>E-Posta</th>                   
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($users as $user) { ?>
                                            <tr>
                                                <td><?php echo $sira2++ ?></td>                                             
                                                <td><?=$user->name?></td>
                                                <td><?=$user->email?></td>
                                                <td><?=$user->date?></td>
                                                <td><?php if($mesaj->status==0) { echo "<span class='text-danger'>Dondurulmuş</span>";} else { echo "<span class='text-info'>Aktif</span>";}  ?></td>                                           
                                                <td style="width:150px;">
                                                <a href="#" class="btn btn-sm btn-info"><i class="fas fa-pen"></i></a>
                                                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                <a type="button" class="btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteUserModal" uid="<?php echo $user->id ?>"><i class="fas fa-trash" title="Sil"></i></a>                                              
                                            
                                                </td>
                                            </tr>
                                         <?php } ?>   
                  </tbody>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </div>
  </section>
</div>
  <!-- Control Sidebar -->
<!-- mesaj sil Modal -->
<div class="modal fade" id="deleteMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Mesaj Sil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Seçtiğiniz Mesaj Silinecektir, onaylıyormusunuz ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
         <form action="php/deleteMessage.php" method="POST">
            <input type="hidden" name="mid" id="mid">
            <button type="submit" class="btn btn-danger">Sil</button>
         </form>
      </div>
    </div>
  </div>
</div>

<script>
        var mesajsil = document.getElementById('deleteMessageModal')
        mesajsil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('mid')             
        var modal_input=mesajsil.querySelector('#mid')              
        modal_input.value=id;
    })
</script>
<!-- mesaj sil Modal sonu -->
<!-- user sil modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Sil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Seçtiğiniz Kullanıcı Silinecektir, onaylıyormusunuz ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
         <form action="php/deleteUser.php" method="POST">
            <input type="hidden" name="uid" id="uid"> 
            <input type="hidden" name="session_email" value="<?php echo $_SESSION['email'] ?>">
            <button type="submit" class="btn btn-danger">Sil</button>
         </form>
      </div>
    </div>
  </div>
</div>
<script>
        var usersil = document.getElementById('deleteUserModal')
        usersil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('uid')             
        var modal_input=usersil.querySelector('#uid')              
        modal_input.value=id;
    })
</script>
<!-- user sil modal sonu -->
<?php
include "layouts/footer.php";
?>
 