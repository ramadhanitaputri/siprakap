<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="purple">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pengajuan</p>
                        <h3 class="card-title"><?= $this->db->get('pengajuan_surat')->num_rows(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-primary">info</i>
                            <span class="text-primary">Jumlah Pengajuan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">mark_email_unread</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Surat Masuk</p>
                        <h3 class="card-title"><?= $this->db->get('surat_keluar')->num_rows(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-rose">info</i>
                            <span class="text-rose">Jumlah Surat Masuk</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">message</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Surat Balasan</p>
                        <h3 class="card-title"><?= $this->db->get('surat_masuk')->num_rows(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">info</i>
                            <span class="text-success">Jumlah Surat Balasan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">User</p>
                        <h3 class="card-title"><?= $this->db->get('user')->num_rows(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">info</i>
                            <span class="text-info">Jumlah User</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- <div class="col-md-8">
                <canvas id="myCharts"></canvas>
            </div> -->
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <!-- <div class="ct-chart" id="websiteViewsChart"></div> -->
                        <canvas id="myCharts"></canvas>
                        <!-- <canvas id="myChart" width="400" height="300"></canvas> -->
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Surat Balasan</h4>
                        <div class="card-actions">
                            <!-- <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button> -->
                            <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                                <!-- <i class="material-icons">refresh</i> -->
                            </button>
                            <!-- <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                                <i class="material-icons">edit</i>
                            </button> -->
                        </div>
                        <!-- <h4 class="card-title">Website Views</h4> -->
                        <p class="category">Surat Balasan Dalam Bulan</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> Terakhir tanggal <?= $sm[0]["tanggal_surat_masuk"]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <!-- <div class="ct-chart" id="dailySalesChart"></div> -->
                        <canvas id="myCharts1"></canvas>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <!-- <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button> -->
                            <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                                <!-- <i class="material-icons">refresh</i> -->
                            </button>
                            <!-- <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                                <i class="material-icons">edit</i>
                            </button> -->
                        </div>
                        <h4 class="card-title">Surat Masuk</h4>
                        <p class="category">
                            <span class="text-success"></span> Surat Masuk Dalam Bulan</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> Terakhir tanggal <?= $sk[0]["tanggal_surat_keluar"]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <!-- <div class="ct-chart" id="completedTasksChart"></div> -->
                        <canvas id="myCharts2"></canvas>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <!-- <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button> -->
                            <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                                <!-- <i class="material-icons">refresh</i> -->
                            </button>
                            <!-- <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                                <i class="material-icons">edit</i>
                            </button> -->
                        </div>
                        <h4 class="card-title">Surat Pengantar</h4>
                        <p class="category">Surat Pengantar Dalam Bulan</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> Terakhir tanggal <?= $sket[0]["tanggal_surat_keterangan"]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>