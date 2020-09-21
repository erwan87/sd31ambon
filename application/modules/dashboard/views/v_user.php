<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="<?= base_url(''); ?>frontend/assets/images/users/<?= $user[0]['photo']; ?>">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $this->session->userdata('username'); ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('dashboard/profuser/' . $this->session->userdata('id')); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-0 text-gray-800"><?= $breadcumb; ?></h1>
                <h1 class="h5 mb-0 text-gray-800"> <i class="<?= $icons;?>"> <?= $breadcumb; ?></i></h1>
            </div>
            <hr>
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="x_content">
                                <div id="alert-message">
                                    <div class="center"><strong><?= $this->session->flashdata('message'); ?></strong></div>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_content">
                                                        <p class="text-muted font-13 m-b-30"></p>
                                                        <a data-toggle="modal" data-target="#addUser" class="btn btn-success"><i class="fas fa-plus"></i>
                                                            Add Wali Kelas</a>
                                                        <a href="#" class="btn btn-success"> <i class="fa fa-plus"></i> Add Siswa</a>
                                                        <!-- Tabel -->
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_panel">
                                                                        <div class="x_content">
                                                                            <p class="text-muted font-13 m-b-30"></p>
                                                                            <div class="table-responsive">
                                                                                <table style="font-size: 15px" id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th>Username</th>
                                                                                            <th>Usergroup</th>
                                                                                            <th>Nama</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                        $i = 1;
                                                                                        foreach ($user as $show) {
                                                                                            ; ?>
                                                                                        <tr>
                                                                                            <td><?= $i++ ; ?></td>
                                                                                            <td><?= $show['username'] ; ?></td>
                                                                                            <td><?= $show['roleName'] ; ?></td>
                                                                                            <td><?= $show['userName'] ; ?></td>
                                                                                            <td>
                                                                                                <a href="<?= base_url('dashboard/delUsers/' . $show['userid']) ?>" class="btn btn-danger btn-sm tombol-konfirm" data-judul="Untuk menghapus Kelebihan ?" data-konfirm="Yakin, Hapus Data !">
                                                                                                    <i class="fa fa-trash"></i> Delete
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <!-- Modal Edit Product Item Start -->
                                                                                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog" role="modal">
                                                                                                <div class="modal-content">
                                                                                                <?= form_open_multipart("product/editProduct", array("id[]" => "form-user", "class" => "form-horizontal")) ?>
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="demoModalLabel">Add Product Item</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <div id="the-message"></div>
                                                                                                            <div class="form-group">
                                                                                                            <label for="name">Item Name</label>
                                                                                                            <input type="text" id[]="name" name="name" class="form-control" value="" autofocus required>
                                                                                                            <input type="hidden" id[]="id" name="id" value="">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                                                                                    </div>
                                                                                                    <?= form_close(); ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Modal Edit Product Item End -->
                                                                                        <?php
                                                                                        } ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal ADD Category Start -->
                                    <?= form_open("product/addCatProduct", array("id" => "form-user", "class" => "form-horizontal")) ?>
                                        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="modal">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Add New Category Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div id="the-message"></div>
                                                        <div class="form-group">
                                                            <label for="catname">Category Name</label>
                                                            <input type="text" id="catname" name="catname" class="form-control" autofocus required>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="target" id="target">
                                                                <option value="">No Selected</option>
                                                                <option value="1">Pria</option>
                                                                <option value="2">Wanita</option>
                                                                <option value="3">Semua</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i> Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?= form_close();?>
                                    <!-- Modal ADD Category End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>