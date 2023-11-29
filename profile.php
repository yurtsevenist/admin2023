
<?php
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
            <h3>Profil</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Profil Sayfası</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="tema/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION["name"] ?></h3>

                <p class="text-muted text-center"><?php echo $_SESSION["email"] ?></p>

           

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                  <li class="nav-item active"><a class="nav-link" href="#settings" data-toggle="tab">Ayarlar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
               

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" action="php/profileUpdate.php" method="POST">
                      <input type="hidden" name="id" value=<?php echo $_SESSION["id"] ?>>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">E-Posta</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" readonly id="inputEmail" name="email" placeholder="Email" value="<?php echo $_SESSION["email"] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Adı Soyadı</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" name="name" placeholder="Name" value="<?php echo $_SESSION["name"] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Şifre</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Şifre">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password-confirmation" class="col-sm-2 col-form-label">Şifre Tekrar</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password-confirmation" name="password-confirmation" placeholder="Şifre Tekrar"">
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Güncelle</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->

<?php
include "layouts/footer.php";
?>
 