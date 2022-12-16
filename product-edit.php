<?php
include "header.php";
include "sidebar.php";
if(isset($_GET['id'])):
  $id = $_GET['id'];
  $p = $product->getProductById($id);
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
        <div class="col-md-5">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name="id" value="<?php echo $p[0]['id'] ?>">
                <input value="<?php echo $p[0]['name'] ?>" name="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input value="<?php echo $p[0]['price'] ?>" name="price" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label>
                <input onchange="preview(this)" name="image" type="file" id="inputName" class="form-control">
                <img id="imagepreview" style="width:150px" src="dist/img/<?php echo $p[0]['image'] ?>" alt="">
              </div>
              <div class="form-group">
                <label for="inputStatus">Manufacture</label>
                <select name="manu" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php 
                  $getAllManu = $manufacture->getAllManu();
                  foreach($getAllManu as $value):
                    if($value['manu_id'] == $p[0]['manu_id']):?>
                    <option selected value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                    <?php
                    else:
                  ?>
                  <option value=<?php echo $value['manu_id'] ?>><?php echo $value['manu_name'] ?></option>
                  <?php endif; endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Protype</label>
                <select name="type" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php 
                  $getAllProtype = $protype->getAllProtype();
                  foreach($getAllProtype as $value):
                    if($value['type_id'] == $p[0]['type_id']):?>
                  <option selected value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                  <?php
                  else:
                  ?>
                  <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                  <?php endif; endforeach; ?>
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
                <textarea name="description" id="summernote"><?php echo $p[0]['description'] ?></textarea>                
              </div>              
              <div class="form-group">
                <label for="inputName">Feature</label>
                <?php
                if($p[0]['feature'] == 1):?>
                <input checked name="feature" type="checkbox" id="inputName" class="form-control">
                <?php
                else:
                ?>
                <input name="feature" type="checkbox" id="inputName" class="form-control">
                <?php endif;?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Update Product" class="btn btn-success float-right">
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