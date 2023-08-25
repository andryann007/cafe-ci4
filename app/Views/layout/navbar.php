<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="opacity: 0.85;">
    <div class="container">
        <!-- Navbar Title Bootstrap 5 -->
        <a class="navbar-brand" href="#">My Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Menu Bootstrap 5 -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <div class="navbar-nav ml-auto">
                <li class="nav-item <?= ($title === 'Home') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/home" style="<?= ($title === 'Home') ? 'font-weight: bold;' : ''; ?>">Home</a>
                </li>
                <li class="nav-item <?= ($title === 'About') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/about" style="<?= ($title === 'About') ? 'font-weight: bold;' : ''; ?>">About Us</a>
                </li>
                <li class="nav-item <?= ($title === 'Menu') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/menu" style="<?= ($title === 'Menu') ? 'font-weight: bold;' : ''; ?>">Our Menu</a>
                </li>
                <li class="nav-item <?= ($title === 'Contact') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/contact" style="<?= ($title === 'Contact') ? 'font-weight: bold;' : ''; ?>">Contact Us</a>
                </li>
            </div>

            <div class="navbar-extra">
                <form class="form-inline">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </div>
</nav>