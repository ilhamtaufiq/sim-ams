<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
      <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
      <div class="d-none d-xl-block ps-2">
        <div>{{ Auth::user()->name ?? 'Login' }}</div>
        <div class="mt-1 small text-muted">{{ Auth::user()->roles->first()->name ?? 'login' }}</div>
      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <a href="#" class="dropdown-item">Set status</a>
      <a href="#" class="dropdown-item">Profile & account</a>
      <a href="#" class="dropdown-item">Feedback</a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">Settings</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{route('logout')}}">Keluar</a>
      </form>
    </div>
</div>