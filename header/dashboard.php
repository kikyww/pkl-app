<?php 
include 'sidebar.php';
?>
                <div>
                    <div class="fs-7 fw-semibold">Selamat Datang di Aplikasi Program Mahasiswa PKL pada UPPD Banjarmasin 1 <span class="fs-6 fw-normal">
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                        </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart1" height="70"></canvas>
            </div>
        </div>
    </div>
</div>
<?php 
include 'footer.php';
?>