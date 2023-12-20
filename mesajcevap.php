
<?php
include "php/connect.php";
$id=$_GET['id'];
$sorgu=$baglanti->prepare("SELECT * FROM messages WHERE id=?");
$sorgu->execute(array($id));
foreach($sorgu as $satir)
{       
   
    $email=$satir["email"]; 
    $mid=$satir["id"];
    $subject=$satir["subject"];
    $message=$satir["message"];
   
                   
}
include "layouts/header.php";
include "layouts/aside.php";
?>  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mesaj Cevapla</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Mesaj Cevapla</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
       
          <div class="col-12 col-md-6 offset-md-3">
            
            <div class="form-group">
              <label for="inputEmail">E-Posta</label>
              <input type="email" id="inputEmail" name="email" value="<?php echo $email ?>" readonly class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputSubject">Konu</label>
              <input type="text" id="inputSubject" name="subject"  value="<?php echo $subject ?>" readonly class="form-control" />
            </div>
            <div class="form-group">
              <label for="inputMessage">Mesaj</label>
              <textarea id="inputMessage" class="form-control" name="message"   readonly rows="2">
              <?php echo $message ?>
              </textarea>
            </div>
            <form action="php/mesajcevapPost.php" method="POST" >
            <input type="hidden" name="id"  value="<?php echo $mid ?>">
            <div class="form-group">
            <label for="inputName">Cevabınız</label>
              <textarea id="summernote" name="answer" rows="4" >
                 Cevabınızı buraya yazabilirsiniz...
              </textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-outline-primary" value="Cevapla">
            </div>
            </form>
           
          </div>
        
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->

<?php
include "layouts/footer.php";
?>
 