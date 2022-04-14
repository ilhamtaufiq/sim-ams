<div class="collapse navbar-collapse" id="navbar-menu">
  <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard" >
          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
          </span>
          <span class="nav-link-title">
            Home
          </span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >          <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-subtask" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <line x1="6" y1="9" x2="12" y2="9"></line>
              <line x1="4" y1="5" x2="8" y2="5"></line>
              <path d="M6 5v11a1 1 0 0 0 1 1h5"></path>
              <rect x="12" y="7" width="8" height="4" rx="1"></rect>
              <rect x="12" y="15" width="8" height="4" rx="1"></rect>
           </svg>          
          </span>
          <span class="nav-link-title">
            Kegiatan
          </span>
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
              <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
              <a class="dropdown-item" href="/kegiatan/1">
                Sanitasi DAK
              </a>
              <a class="dropdown-item" href="/kegiatan/2">
                Pembangunan MCK
              </a>
              <a class="dropdown-item" href="/kegiatan/3">
                Pembangunan SPAM
              </a>
              <a class="dropdown-item" href="/kegiatan/4">
                Rehab SPAM
              </a>
              <a class="dropdown-item" href="/kegiatan/5">
                Perluasan SPAM DAK
              </a>
              <?php endif; ?>
              <a class="dropdown-item <?php echo e(Route::is('tfl') ? 'active' : ''); ?>" href="/tfl">
                Sanitasi DAK 2022
              </a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/partials/menu.blade.php ENDPATH**/ ?>