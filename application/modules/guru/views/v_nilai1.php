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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $this->session->userdata('name'); ?></span>
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
                <h1 class="h4 mb-0 text-gray-800"> <i class="<?= $icons;?>"> <?= $breadcumb; ?></i></h1>
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
                                                        <!-- Tabel -->
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="x_panel">
                                                                        <div class="x_content">
                                                                            <p class="text-muted font-13 m-b-30"></p>
                                                                            <a data-toggle="modal" data-target="#addNilai" class="btn btn-success"><i class="fas fa-plus"></i>
                                                                                Beri Nilai
                                                                            </a>
                                                                            <br>
                                                                            <hr>
                                                                                <?= form_open("guru/cari", array("id" => "form-user", "class" => "form-horizontal")) ?>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group">
                                                                                            <label for="mapel">Mata Pelajaran</label>
                                                                                            <select class="form-control" name="mapel" id="mapel">
                                                                                                <option value="">No Selected</option>
                                                                                                <?php foreach ($mapel as $row) : ?>
                                                                                                    <option value="<?php echo $row['id_mapel']; ?>"><?php echo $row['nama_mapel']; ?></option>
                                                                                                <?php endforeach; ?>
                                                                                            </select>
                                                                                            <?= form_error('mapel', '<small class="text-danger">', '</small>'); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="submit" class="btn btn-info btn-sm"> <i class="fa fa-search"></i> Search</button>
                                                                                <?= form_close();?>
                                                                                <hr>
                                                                                <div class="table-responsive">
                                                                                    <table style="font-size: 15px" id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>No</th>
                                                                                                <th>Siswa</th>
                                                                                                <th>Mata Pelajaran</th>
                                                                                                <th>Semester</th>
                                                                                                <th>Nilai</th>
                                                                                                <th>Nilai Ketrampilan</th>
                                                                                                <th>Nilai Pengetahuan</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        <?php
                                                                                            $i = 1;
                                                                                            foreach ($mapjad as $show) {
                                                                                                ; ?>
                                                                                            <tr>
                                                                                                <td><?= $i++ ; ?></td>
                                                                                                <td><?= $show['nama_siswa'] ; ?></td>
                                                                                                <td><?= $show['nama_mapel'] ; ?></td>
                                                                                                <td><?= $show['semester'] ; ?></td>
                                                                                                <td><?= $show['nilai'] ; ?></td>
                                                                                                <td><?= $show['ketrampilan'] ; ?></td>
                                                                                                <td><?= $show['pengetahuan'] ; ?></td>
                                                                                            </tr>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Modal ADD Nilai Start -->
        <?= form_open("guru/addNilai", array("id" => "form-user", "class" => "form-horizontal")) ?>
            <div class="modal fade" id="addNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="demoModalLabel">Add Nilai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div id="the-message"></div>
                            <div class="form-group">
                                <label for="siswa">Nama Siswa</label>
                                <select class="form-control" name="siswa" id="siswa">
                                    <option value="">No Selected</option>
                                    <?php foreach ($sis as $row) : ?>
                                        <option value="<?php echo $row['id_siswa']; ?>"><?php echo $row['nama_siswa']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('siswa', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <select class="form-control" name="mapel" id="mapel">
                                    <option value="">No Selected</option>
                                    <?php foreach ($mapel as $row) : ?>
                                        <option value="<?php echo $row['id_mapel']; ?>"><?php echo $row['nama_mapel']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('mapel', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="smstr">Semester</label>
                                <select class="form-control" name="smstr" id="smstr">
                                    <option value="">No Selected</option>
                                    <option value="ganjil">Ganjil</option>
                                    <option value="genap">Genap</option>
                                </select>
                                <?= form_error('smstr', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="nilmapel">Nilai Mata Pelajaran</label>
                                <input type="text" id="nilmapel" name="nilmapel" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="nilket">Nilai Ketrampilan</label>
                                <input type="text" id="nilket" name="nilket" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nilpeng">Nilai Pengetahuan</label>
                                <input type="text" id="nilpeng" name="nilpeng" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        <?= form_close();?>
        <!-- Modal ADD Nilai End -->

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
        <script type="text/javascript">
            $(function(){
                $(".datepicker").datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        </script>