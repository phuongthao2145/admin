<?php
include "header.php";
include "sidebar.php";
if(isset($_GET['manu_id'])):
  $manu_id = $_GET['manu_id'];
  $p = $manufacture->getManuByManuId($manu_id);
  //var_dump($p);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <form action="edit.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name="manu_id" value="<?php echo $p[0]['manu_id'] ?>">
                <input value="<?php echo $p[0]['manu_name'] ?>" name="manu_name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label>
                <input onchange="preview(this)" name="manu_image" type="file" id="inputName" class="form-control">
                <img id="imagepreview" style="width:150px" src="dist/img/<?php echo $p[0]['manu_image'] ?>" alt="">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Update Manu" class="btn btn-success float-right">
        </div>
      </div>
</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
  function preview(input) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagepreview')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
 <?php endif; include "footer.php" ?>