  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      @if (Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/jenis_kendaraan">
          <i class="bi bi-grid"></i>
          <span>Jenis Kendaraan</span>
        </a>
      </li>  
      @endif

      @if (Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/armada">
          <i class="bi bi-grid"></i>
          <span>Armada</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/peminjaman">
          <i class="bi bi-grid"></i>
          <span>Peminjaman</span>
        </a>
      </li>

      @if (Auth::user()->role == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/pembayaran">
          <i class="bi bi-grid"></i>
          <span>Pembayaran</span>
        </a>
      </li>
      @endif
      <!-- End Dashboard Nav -->


    </ul>

  </aside><!-- End Sidebar-->