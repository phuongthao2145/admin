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
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Products</h3>  
          <a style="margin-left:20px;margin-top:-8px" class="btn btn-success btn-sm" href="product-add.php">
            <i class="fas fa-plus">
            </i>
          Add
        </a>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 6%">
                          Image
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                      <th style="width: 10%">
                          Price
                      </th>
                      <th style="width: 30%">
                          Description
                      </th>
                      <th style="width: 8%" class="text-center">
                          Manufacture
                      </th>
                      <th style="width: 8%" class="text-center">
                          Protype
                      </th>
                      <th style="width: 15%" class="text-right">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $getAllProducts = $product->getAllProducts();
                foreach($getAllProducts as $value):
                ?>
                  <tr>
                      <td>
                          <img style="width:100px" src="dist/img/<?php echo $value['image'] ?>" alt="">
                      </td>
                      <td><?php echo $value['name'] ?></td>
                      <td><?php echo number_format($value['price']) ?> VND</td>
                      <td class="ellipsis first">
                        <span><?php echo $value['description'] ?></span>          
                      </td>
                      <td class="project-state"><?php echo $value['manu_name'] ?></td>
                      <td class="project-state"><?php echo $value['type_name'] ?></td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="product-edit.php?id=<?php echo $value['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="del.php?id=<?php echo $value['id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                 <?php endforeach; ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include "footer.php";
?>