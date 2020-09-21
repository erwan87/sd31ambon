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
                                                        <a data-toggle="modal" data-target="#addJadwal" class="btn btn-success"><i class="fas fa-plus"></i>
                                                            Add</a>
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
                                                                                            <th>Mata Pelajaran</th>
                                                                                            <th>Guru</th>
                                                                                            <th>Ruang Kelas</th>
                                                                                            <th>Hari</th>
                                                                                            <th>Jam</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <?php
                                                                                        $i = 1;
                                                                                        foreach ($jadmap as $show) {
                                                                                            ; ?>
                                                                                        <tr>
                                                                                            <td><?= $i++ ; ?></td>
                                                                                            <td><?= $show['nama_mapel'] ; ?></td>
                                                                                            <td><?= $show['nama_guru'] ; ?></td>
                                                                                            <td><?= $show['nama_kelas'] ; ?></td>
                                                                                            <td><?= $show['nama_hari'] ; ?></td>
                                                                                            <td><?= $show['jam'] ; ?></td>
                                                                                            <td>
                                                                                                <a data-toggle="modal" href="#edit<?= $show['id_jadwal'] ?>" class="btn btn-info btn-sm" data-judul="Untuk menghapus Kelebihan ?" data-konfirm="Yakin, Hapus Data !">
                                                                                                    <i class="fa fa-pencil"></i> Edit
                                                                                                </a>
                                                                                                <a href="<?= base_url('dashboard/delJadwal/' . $show['id_jadwal']) ?>" class="btn btn-info btn-sm" data-judul="Untuk menghapus Kelebihan ?" data-konfirm="Yakin, Hapus Data !">
                                                                                                    <i class="fa fa-trash"></i> Delete
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <!-- Modal Edit Jadwal Start -->
                                                                                        <div class="modal fade" id="edit<?= $show['id_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog" role="modal">
                                                                                                <div class="modal-content">
                                                                                                    <?= form_open("dashboard/updateJadwal", array("id[]" => "form-user", "class" => "form-horizontal")) ?>
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="demoModalLabel">Edit Users</h5>
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <div id="the-message"></div>
                                                                                                            <input type="hidden" id[]="id" name="id" value="<?= $show['id_jadwal']; ?>">
                                                                                                            <div class="form-group">
                                                                                                                <label for="mapel">Mata Pelajaran</label>
                                                                                                                <select class="form-control" name="mapel" id[]="mapel">
                                                                                                                    <?php foreach ($mapel as $row) : ?>
                                                                                                                    <?php
                                                                                                                    if ($row['id_mapel']===$show['mapel']) {
                                                                                                                        $selected = 'SELECTED';
                                                                                                                    } else {
                                                                                                                        $selected = '';
                                                                                                                    }
                                                                                                                    ; ?>
                                                                                                                    <option value="<?= $row['id_mapel']; ?>" <?= $selected; ?>> <?= $row['nama_mapel'] ; ?> </option>
                                                                                                                    <?php endforeach; ?>
                                                                                                                </select>
                                                                                                                <?= form_error('mapel', '<small class="text-danger">', '</small>'); ?>
                                                                                                            </div>

                                                                                                            <div class="form-group">
                                                                                                                <label for="guru">Guru</label>
                                                                                                                <select class="form-control" name="guru" id[]="guru">
                                                                                                                    <?php foreach ($guru as $row) : ?>
                                                                                                                    <?php
                                                                                                                    if ($row['id_guru']===$show['guru']) {
                                                                                                                        $selected = 'SELECTED';
                                                                                                                    } else {
                                                                                                                        $selected = '';
                                                                                                                    }
                                                                                                                    ; ?>
                                                                                                                    <option value="<?= $row['id_guru']; ?>" <?= $selected; ?>> <?= $row['nama_guru'] ; ?> </option>
                                                                                                                    <?php endforeach; ?>
                                                                                                                </select>
                                                                                                                <?= form_error('guru', '<small class="text-danger">', '</small>'); ?>
                                                                                                            </div>

                                                                                                            <div class="form-group">
                                                                                                                <label for="kelas">Kelas</label>
                                                                                                                <select class="form-control" name="kelas" id[]="kelas">
                                                                                                                    <?php foreach ($kls as $row) : ?>
                                                                                                                    <?php
                                                                                                                    if ($row['id_kelas']===$show['kelas']) {
                                                                                                                        $selected = 'SELECTED';
                                                                                                                    } else {
                                                                                                                        $selected = '';
                                                                                                                    }
                                                                                                                    ; ?>
                                                                                                                    <option value="<?= $row['id_kelas']; ?>" <?= $selected; ?>> <?= $row['nama_kelas'] ; ?> </option>
                                                                                                                    <?php endforeach; ?>
                                                                                                                </select>
                                                                                                                <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                                                                                            </div>

                                                                                                            <div class="form-group">
                                                                                                                <label for="hari">Hari</label>
                                                                                                                <select class="form-control" name="hari" id[]="hari">
                                                                                                                    <?php foreach ($hari as $row) : ?>
                                                                                                                    <?php
                                                                                                                    if ($row['id_hari']===$show['hari']) {
                                                                                                                        $selected = 'SELECTED';
                                                                                                                    } else {
                                                                                                                        $selected = '';
                                                                                                                    }
                                                                                                                    ; ?>
                                                                                                                    <option value="<?= $row['id_hari']; ?>" <?= $selected; ?>> <?= $row['nama_hari'] ; ?> </option>
                                                                                                                    <?php endforeach; ?>
                                                                                                                </select>
                                                                                                                <?= form_error('hari', '<small class="text-danger">', '</small>'); ?>
                                                                                                            </div>

                                                                                                            <?php
                                                                                                                $data   = explode(" - ", $show['jam']); ?>
                                                                                                            <div class="form-group">
                                                                                                                <label for="jam">Jam</label>
                                                                                                                <input type="text" id[]="mulai" name="mulai" class="form-control" placeholder="Jam Awal. Ex: 13:00" value="<?= $data[0]; ?>" required>
                                                                                                                <input type="text" id[]="akhir" name="akhir" class="form-control datepicker" placeholder="Jam Akhir. Ex: 13:30" value="<?= $data[1]; ?>" required>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                            <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i> Save</button>
                                                                                                        </div>
                                                                                                    <?= form_close(); ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Modal Edit Jadwal End -->
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
                                    <!-- Modal ADD Jadwal Start -->
                                    <?= form_open("dashboard/addJadwal", array("id" => "form-user", "class" => "form-horizontal")) ?>
                                        <div class="modal fade" id="addJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="modal">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel">Add New Jadwal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div id="the-message"></div>
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
                                                            <label for="guru">Guru</label>
                                                            <select class="form-control" name="guru" id="guru">
                                                                <option value="">No Selected</option>
                                                                <?php foreach ($guru as $row) : ?>
                                                                    <option value="<?php echo $row['id_guru']; ?>"><?php echo $row['nama_guru']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('guru', '<small class="text-danger">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="kelas">Kelas</label>
                                                            <select class="form-control" name="kelas" id="kelas">
                                                                <option value="">No Selected</option>
                                                                <?php foreach ($kls as $row) : ?>
                                                                    <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="hari">Hari</label>
                                                            <select class="form-control" name="hari" id="hari">
                                                                <option value="">No Selected</option>
                                                                <?php foreach ($hari as $row) : ?>
                                                                    <option value="<?php echo $row['id_hari']; ?>"><?php echo $row['nama_hari']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('hari', '<small class="text-danger">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jam">Jam Mengajar</label>
                                                            <input type="text" id="mulai" name="mulai" class="form-control datetime" placeholder="Jam Mulai. Ex: 13:00" required>
                                                            <input type="text" id="akhir" name="akhir" class="form-control datetime" placeholder="Jam Akhir. Ex: 14:30" required>
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
                                    <!-- Modal ADD Jadwal End -->
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

        <script type="text/javascript">
            $(function(){
                $(".datetime").datetimepicker({
                    format: 'hh:mm',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        </script>