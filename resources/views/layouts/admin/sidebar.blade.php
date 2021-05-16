<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">

                <li {{ Request::is('admin') || Request::is('admin/dashboard') ? 'class="mm-active"' : '' }}>
                    <a href="{{ route('admin.dashboard') }}"
                        {{ Request::is('admin') || Request::is('admin/dashboard') ? 'class="active"' : '' }}>
                        <i class="fe-airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">App</li>

                <li
                    {{ Request::is('admin/brands/*') || Request::is('admin/units/*') || Request::is('admin/categories/*') ? 'class="mm-active"' : '' }}>
                    <a href="javascript: void(0);"
                        {{ Request::is('admin/brands/*') || Request::is('admin/units/*') || Request::is('admin/categories/*') ? 'class="active"' : '' }}>
                        <i class="fe-briefcase"></i>
                        <span> Product Master </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li {{ Request::is('admin/brands/*') ? 'class="mm-active"' : '' }}>
                            <a href="{{ route('admin.brands.index') }}"
                                {{ Request::is('admin/brands/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Brands
                            </a>
                        </li>
                        <li {{ Request::is('admin/units/*') ? 'class="mm-active"' : '' }}>
                            <a href="{{ route('admin.units.index') }}"
                                {{ Request::is('admin/units/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Units
                            </a>
                        </li>
                        <li {{ Request::is('admin/categories/*') ? 'class="mm-active"' : '' }}>
                            <a href="{{ route('admin.categories.index') }}"
                                {{ Request::is('admin/categories/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Categories
                            </a>
                        </li>
                    </ul>
                </li>

                <li {{ Request::is('admin/account-types/*') || Request::is('admin/accounts/*') ? 'class="mm-active"' : '' }}>
                    <a href="javascript: void(0);" {{ Request::is('admin/account-types/*') || Request::is('admin/accounts/*') ? 'class="active"' : '' }}>
                        <i class="fe-briefcase"></i>
                        <span> Accounts </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li {{ Request::is('admin/account-types/*') || Request::is('admin/accounts/*') ? 'class="mm-active"' : '' }}>
                            
                            <a href="{{ route('admin.account-types.index') }}"
                                {{ Request::is('admin/account-types/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Account Types
                            </a>
                            <a href="{{ route('admin.accounts.index') }}"
                                {{ Request::is('admin/accounts/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Accounts
                            </a>
                        </li>
                    </ul>
                </li>

                <li {{ Request::is('admin/sellers/*') ? 'class="mm-active"' : '' }}>
                    <a href="{{ route('admin.sellers.index') }}"
                        class="{{ Request::is('admin/sellers/*') ? 'active' : '' }}">
                        <i class="fe-box"></i>
                        <span> Sellers </span>
                    </a>
                </li>

                <li {{ Request::is('admin/products/*') ? 'class="mm-active"' : '' }}>
                    <a href="{{ route('admin.products.index') }}"
                        class="{{ Request::is('admin/products/*') ? 'active' : '' }}">
                        <i class="fe-box"></i>
                        <span> Products </span>
                    </a>
                </li>


                <li {{ Request::is('admin/purchases/*') ? 'class="mm-active"' : '' }}>
                    <a href="javascript: void(0);" {{ Request::is('admin/purchases/*') ? 'class="active"' : '' }}>
                        <i class="fe-briefcase"></i>
                        <span> Inventory </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li {{ Request::is('admin/purchases/*') ? 'class="mm-active"' : '' }}>
                            <a href="{{ route('admin.purchases.index') }}"
                                {{ Request::is('admin/purchases/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Purchase
                            </a>
                            <a href="{{ route('admin.purchases.index') }}"
                                {{ Request::is('admin/purchases/*') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> Sales
                            </a>
                        </li>
                    </ul>
                </li>

                <li {{ Request::is('admin/settings/*') ? 'class="mm-active"' : '' }}>
                    <a href="javascript: void(0);" class="{{ Request::is('admin/settings/*') ? 'active' : '' }}">
                        <i class="fe-settings"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li {{ Request::is('admin/settings/general-settings') ? 'class="mm-active"' : '' }}>
                            <a href="{{ route('admin.settings.general-settings') }}"
                                {{ Request::is('admin/settings/general-settings') ? 'class="active"' : '' }}>
                                <i class="fe-corner-down-right"></i> General Settings
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
