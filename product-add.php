<?php
include "header.php";
include "sidebar.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="add.php" method="post" enctype="multipart/form-data">
      <div class="row">
      <div class="col-md-5">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name="id">
                <input  name="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input name="price" type="number" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label>
                <input onchange="preview(this)" name="image" type="file" id="inputName" class="form-control">
                <img id="imagepreview" style="width:150px" src="" alt="">
              </div>
              <div class="form-group">
                <label for="inputStatus">Manufacture</label>
                <select name="manu" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php 
                  $getAllManu = $manufacture->getAllManu();
                  foreach($getAllManu as $value):
                   
                  ?>
                  <option value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Protype</label>
                <select name="type" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php 
                  $getAllProtype = $protype->getAllProtype();
                  foreach($getAllProtype as $value):                   
                  ?>
                  <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                  <?php  endforeach; ?>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-7">
          <div class="card card-primary">
            <div class="card-body">
            <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="summernote">
                  </textarea>                
              </div>


              <div class="form-group">
                <label for="inputName">Feature</label>               
                <input name="feature" type="checkbox" id="inputName" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Product" class="btn btn-success float-right">
        </div>
      </div>
</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include "footer.php" ?>