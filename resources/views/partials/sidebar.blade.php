 <div id="sidebar" class="active">
     <div class="sidebar-wrapper active">
         <div class="sidebar-header position-relative">
             <div class="d-flex justify-content-between align-items-center">
                 <div class="logo">
                     <p class="text-white">Mata Elang Pembangunan</p>
                 </div>
                 <div class="theme-toggle d-flex gap-2  align-items-center mt-2" type="checkbox" id="toggle-dark">
                     <div class="form-check form-switch fs-6 hidden">
                         <label class="form-check-label"></label>
                     </div>
                 </div>
                 <div class="sidebar-toggler  x">
                     <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                 </div>
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
 </div>
