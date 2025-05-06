<header class="header_section bg-secondary">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>Kedai Terserah </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('product.*') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('product.index') }}">Product</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('buyer.*') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('buyer.index') }}">Buyer</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('category.*') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('payment.*') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('payment.index') }}">Payment</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('transaction.*') ? 'active text-warning' : '' }}">
                        <a class="nav-link" href="{{ route('transaction.index') }}">Transaction</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
