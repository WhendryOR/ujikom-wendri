<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      @canany(['dashboard'])
      <li class="nav-item nav-category">Dashboard</li>
      <li class="nav-item">
        <a class="nav-link" href="/home" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @endcanany

      @canany(['history-order'])
      <li class="nav-item nav-category">History Order</li>
      <li class="nav-item">
        <a class="nav-link" href="/history-order" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">History Order</span>
        </a>
      </li>
      @endcanany

      @canany(['transaction-order'])
      <li class="nav-item nav-category">Transaksi Order</li>
      <li class="nav-item">
        <a class="nav-link" href="/order" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Transaksi Order</span>
        </a>
      </li>
      @endcanany

      @canany(['masterdata-konsumen', 'masterdata-petugas', 'masterdata-layanan', 'masterdata-pembayaran'])
      <li class="nav-item nav-category">Input Data</li>
      @endcanany

      @canany(['masterdata-petugas'])
      <li class="nav-item">
        <a class="nav-link" href="/petugas" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Petugas</span>
        </a>
      </li>
      @endcanany

      @canany(['masterdata-konsumen'])
      <li class="nav-item">
        <a class="nav-link" href="/konsumen" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Konsumen</span>
        </a>
      </li>
      @endcanany

      @canany(['masterdata-pembayaran'])
      <li class="nav-item">
        <a class="nav-link" href="/pembayaran" aria-expanded="false" aria-controls="tables">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Pembayaran</span>
        </a>
      </li>
      @endcanany

      @canany(['masterdata-layanan'])
      <li class="nav-item">
        <a class="nav-link" href="layanan" aria-expanded="false" aria-controls="icons">
          <i class="menu-icon mdi mdi-layers-outline"></i>
          <span class="menu-title">Layanan</span>
        </a>
      </li>
      @endcanany
    </ul>
  </nav>