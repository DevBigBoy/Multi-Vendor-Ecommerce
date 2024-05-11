<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Starter</li>

            <li class="dropdown {{ setActive(['admin.category.*', 'admin.subcategory.*', 'admin.childcategory.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Categories</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="{{ setActive(['admin.subcategory.*']) }}">
                        <a class="nav-link" href="{{ route('admin.subcategory.index') }}">Sub Category</a>
                    </li>
                    <li class="{{ setActive(['admin.childcategory.*']) }}">
                        <a class="nav-link" href="{{ route('admin.childcategory.index') }}">Child Category
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.brand.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Products</span>
                </a>
                <ul class="dropdown-menu ">
                    <li class="{{ setActive(['admin.brand.*']) }}">
                        <a class="nav-link" href="{{ route('admin.brand.index') }}">Brands</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <span>Ecommerce</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.vendor_profile.*']) }}">
                        <a class="nav-link" href="{{ route('admin.vendor_profile.index') }}">Vendor Profile</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Website</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}">
                        <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
                    </li>
                </ul>
            </li>

        </ul>
    </aside>
</div>
