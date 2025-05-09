<header class="header_section bg-dark shadow-sm">
    <div class="container py-2">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
                Kedai <span class="text-warning">Terserah</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mt-2 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('home.index') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('dashboard.index') }}">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('product.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('product.index') }}">
                            <i class="bi bi-box-seam me-1"></i> Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('buyer.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('buyer.index') }}">
                            <i class="bi bi-people-fill me-1"></i> Buyer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('category.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('category.index') }}">
                            <i class="bi bi-tags me-1"></i> Category
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('payment.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('payment.index') }}">
                            <i class="bi bi-credit-card-2-front me-1"></i> Payment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('transaction.*') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('transaction.index') }}">
                            <i class="bi bi-receipt me-1"></i> Transaction
                        </a>
                    </li>
                    <!-- Menambahkan Link Register di sini -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'text-warning fw-semibold' : '' }}"
                            href="{{ route('register') }}">
                            <i class="bi bi-person-plus-fill me-1"></i> Register
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
