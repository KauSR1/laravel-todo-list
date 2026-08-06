<!-- Retractable Sidebar Component -->
<nav id="sidebar" class="d-flex flex-column p-3 bg-dark text-white border-end border-secondary">

    {{-- Top: Logo & Toggle Button --}}
    <div>
        <div class="d-flex align-items-center justify-content-between mb-4 px-2">
            <div class="d-flex align-items-center gap-2 sidebar-brand">
                <div class="bg-primary text-white rounded-2 p-2 d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 32px; height: 32px;">
                    <i class="fa-solid fa-check-double"></i>
                </div>
                <span class="fw-bold text-uppercase fs-6 tracking-wider text-white sidebar-text" style="letter-spacing: 0.15em;">Todo OS</span>
            </div>
            <button id="sidebarToggle" class="btn btn-sm text-white bg-transparent border-0" type="button">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        {{-- User Profile --}}
        <div class="user-profile bg-secondary bg-opacity-25 p-2 mb-3 rounded-3 d-flex align-items-center gap-2 border border-secondary border-opacity-50">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm flex-shrink-0" style="width: 36px; height: 36px;">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="overflow-hidden sidebar-text user-profile-name">
                <span class="d-block text-light opacity-75 text-uppercase fw-semibold" style="font-size: 0.65rem;">Logged in as</span>
                <strong class="text-white text-truncate d-block" style="font-size: 0.8rem;">{{ Auth::user()->username }}</strong>
            </div>
        </div>

        {{-- Navigation Menu --}}
        <p class="menu-title text-uppercase text-light opacity-75 fw-bold mb-2 px-2 sidebar-text" style="font-size: 0.7rem; letter-spacing: 0.1em;">Main Menu</p>
        <ul class="nav flex-column gap-1 mb-3">
            <li>
                <a href="/" class="nav-link text-white bg-primary rounded-2 py-2 px-3 fw-semibold d-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-list-check flex-shrink-0"></i>
                    <span class="sidebar-text">My Tasks</span>
                </a>
            </li>
        </ul>
    </div>

    {{-- Logout Button (Positioned right below the menu) --}}
    <div class="mt-2 pt-3 border-top border-secondary">
        <form action="{{ route('logout') }}" method="POST" class="d-flex w-100">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100 text-start fw-semibold py-2 d-flex align-items-center gap-2 logout-btn">
                <i class="fa-solid fa-right-from-bracket flex-shrink-0"></i>
                <span class="sidebar-text">Logout</span>
            </button>
        </form>
    </div>
</nav>
