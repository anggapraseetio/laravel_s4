<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/acara8') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#forms-nav" href="#"
                aria-expanded="false">
                <i class="bi bi-journal-text"></i><span>Riwayat Hidup</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse">
                <li>
                    <a href="{{ url('pendidikan') }}">
                        <i class="bi bi-circle"></i><span>Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ 'pengalaman_kerja' }}">
                        <i class="bi bi-circle"></i><span>Pengalaman Kerja</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

    </ul>

</aside><!-- End Sidebar-->
