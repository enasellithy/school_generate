<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ url('/admin') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link" href="{{ url('/admin/school') }}">
                        <div class="sb-nav-link-icon"><i class="fas align-self-auto"></i></div>
                        School
                    </a>

                    <a class="nav-link" href="{{ url('/admin/student') }}">
                        <div class="sb-nav-link-icon"><i class="fas user-select-all"></i></div>
                        Student
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->role }}
            </div>
        </nav>
    </div>

</div>
