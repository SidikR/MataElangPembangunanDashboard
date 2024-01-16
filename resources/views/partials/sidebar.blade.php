<div class="col d-flex justify-content-start align-items-center"
    style="height: fit-content; max-height: fit-content; width: fit-content ; max-width: fit-content; ">
    <div id="sidebar" class="sidebar-wrapper" style="width: 350px; max-width: 350px; height: 95vh; max-height: 95vh">
        <div id="toggle-dark" class="sidebar-header position-relative d-none">
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
        <div class="sidebar-menu">
            <?php
            function isKeywordActive($keywords)
            {
                $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $uri_segments = explode('/', $uri_path);
            
                foreach ($keywords as $keyword) {
                    if (in_array($keyword, $uri_segments)) {
                        return true;
                    }
                }
            
                return false;
            }
            ?>

            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?php echo isKeywordActive(['dashboard']) ? 'active' : ''; ?>">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub <?php echo isKeywordActive(['instansi', 'data-kecamatan']) ? 'active' : ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data Umum</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a class="<?php echo isKeywordActive(['instansi']) ? 'active' : ''; ?>" href={{ route('instansi.index') }}>Data Instansi (OPD)</a>
                        </li>
                        <li class="submenu-item">
                            <a class="<?php echo isKeywordActive(['data-kecamatan']) ? 'active' : ''; ?>" href={{ route('data-kecamatan.index') }}>Data Kecamatan</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Dinas Kesehatan</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="#">Stunting</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <span id="toggle-btn" class="bg-secondary-red px-1 py-3" title="Sidebar Toggle" style="cursor: pointer">
        <i id="iconToggledAside" class="bi bi-caret-left text-center" style="font-size: 1.5rem;"></i>
    </span>

</div>
