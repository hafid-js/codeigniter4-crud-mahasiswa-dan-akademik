<li class="menu-header">Main Menu</li>
<?php if (session()->get('level') == 1) { ?>
<li><a class="nav-link" href="<?= site_url('mahasiswa') ?>"><i class="fas fa-users"></i> <span>Data Mahasiswa</span></a></li>
<li><a class="nav-link" href="<?= site_url('matakuliah') ?>"><i class="fas fa-th"></i> <span>Data Matakuliah</span></a></li>
<li><a class="nav-link" href="<?= site_url('akademik') ?>"><i class="far fa-user"></i> <span>Data Users</span></a></li>
<li><a class="nav-link" href="<?= site_url('file') ?>"><i class="far fa-file-alt"></i> <span>Data KRS</span></a></li>
<?php } ?>
<?php if (session()->get('level') == 2) { ?>
<li><a class="nav-link" href="<?= site_url('krs') ?>"><i class="far fa-file-alt"></i> <span>Data KRS</span></a></li>
<?php } ?>