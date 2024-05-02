<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Londry</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
    <div class="container-scroller"> 
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    </button>
                </div>
                <div>
                    <h3 class="text-primary"><b>Londry</b></h3>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top"> 
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-outline-primary">Log in</a>
                        
                        {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif --}}
                        @endauth
                    </div>
                    @endif
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category"></li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">History Order</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item nav-category">Forms and Datas</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Form elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <i class="menu-icon mdi mdi-chart-line"></i>
                            <span class="menu-title">Charts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Tables</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <i class="menu-icon mdi mdi-layers-outline"></i>
                            <span class="menu-title">Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">pages</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">help</li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="tab-content tab-content-basic">
                                    {{-- Table --}}
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="d-flex justify-content-end">
                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-11">
                                                                            <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <td>No</td>
                                                                                <td>Tanggal</td>
                                                                                <td>Nama</td>
                                                                                <td>Kode Orderan</td>
                                                                                <td>Layanan</td>
                                                                                <td>Jumlah</td>
                                                                                <td>Total</td>
                                                                                <td>Status</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($data->isEmpty())
                                                                            <tr>
                                                                                <td colspan="9" class="text-center">Data Kosong</td>
                                                                            </tr>
                                                                            @else
                                                                            @endif
                                                                            @foreach ($data as $item)
                                                                            <tr>
                                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                                <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                                                                                <td>{{ $item->konsumen->nama ?? ''}}</td>
                                                                                <td>{{ $item->kode }}</td>
                                                                                <td>{{ $item->layanan->nama ?? ''}}</td>
                                                                                <td>{{ $item->jumlah }}</td>
                                                                                <td>Rp. {{ $item->total_harga}}</td>
                                                                                <td class="text-center">
                                                                                    <span class="badge
                                                                                    @if ($item->status == 'baru') bg-warning
                                                                                    @elseif ($item->status == 'proses') bg-info
                                                                                    @elseif ($item->status == 'selesai') bg-primary
                                                                                    @elseif ($item->status == 'diambil') bg-success
                                                                                    @endif">
                                                                                    {{ ucfirst($item->status)}}
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
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
                            
                            {{-- EndTable --}}
                            
                            <!-- main-panel ends -->
                        </div>
                        <!-- page-body-wrapper ends -->
                    </div>
                    <!-- container-scroller -->
                    <script>
                        function search() {
                            // Ambil nilai input pencarian
                            var input = document.getElementById('searchInput').value.toUpperCase();
                            
                            // Ambil semua baris data dari tabel
                            var rows = document.querySelectorAll("table tbody tr");
                            
                            // Loop melalui setiap baris data
                            rows.forEach(function(row) {
                                // Ambil sel data dari setiap baris
                                var cells = row.querySelectorAll("td");
                                var found = false;
                                
                                // Loop melalui setiap sel data
                                cells.forEach(function(cell) {
                                    // Jika ada teks yang cocok dengan input pencarian, tampilkan barisnya
                                    if (cell.textContent.toUpperCase().indexOf(input) > -1) {
                                        found = true;
                                    }
                                });
                                
                                // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
                                if (found) {
                                    row.style.display = "";
                                } else {
                                    row.style.display = "none";
                                }
                            });
                        }
                        
                        // Tambahkan event listener untuk memanggil fungsi pencarian saat nilai input berubah
                        document.getElementById('searchInput').addEventListener('input', search);
                    </script>
                    <script>
                        function toggleTableVisibility() {
                            var searchInput = document.getElementById('searchInput').value.trim(); // Mendapatkan nilai input pencarian dan menghapus spasi di awal dan akhir
                            
                            // Ambil tabel
                            var table = document.querySelector('.table');
                            
                            // Cek apakah variabel pencarian kosong atau tidak
                            if (searchInput === '') {
                                // Jika kosong, sembunyikan tabel
                                table.style.display = 'none';
                            } else {
                                // Jika tidak kosong, tampilkan tabel
                                table.style.display = 'table';
                            }
                        }
                        
                        // Tambahkan event listener untuk memanggil fungsi setiap kali nilai input berubah
                        document.getElementById('searchInput').addEventListener('input', toggleTableVisibility);
                        
                        // Panggil fungsi pertama kali saat halaman dimuat
                        toggleTableVisibility();
                    </script>
                    
                    <!-- plugins:js -->
                    <script src="vendors/js/vendor.bundle.base.js"></script>
                    <!-- endinject -->
                    <!-- Plugin js for this page -->
                    <script src="vendors/chart.js/Chart.min.js"></script>
                    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
                    <script src="vendors/progressbar.js/progressbar.min.js"></script>
                    
                    <!-- End plugin js for this page -->
                    <!-- inject:js -->
                    <script src="js/off-canvas.js"></script>
                    <script src="js/hoverable-collapse.js"></script>
                    <script src="js/template.js"></script>
                    <script src="js/settings.js"></script>
                    <script src="js/todolist.js"></script>
                    <!-- endinject -->
                    <!-- Custom js for this page-->
                    <script src="js/dashboard.js"></script>
                    <script src="js/Chart.roundedBarCharts.js"></script>
                    <!-- End custom js for this page-->
                </body>
                
                </html>
                
                