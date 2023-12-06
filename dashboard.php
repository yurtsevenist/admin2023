
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
                    <th>İsim</th>
                    <th>E-Posta</th>
                    <th>Konu</th>
                    <th>Mesaj</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                  </tr>
                  </thead>
                  <tbody></tbody>
               
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

<?php
include "layouts/footer.php";
?>
 