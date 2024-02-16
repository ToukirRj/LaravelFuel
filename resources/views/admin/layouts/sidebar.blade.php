<div class="br-logo">
    <a href="{{ route('admin.home') }}">
        <!--{!! logoText() !!}-->
        <img src="{{ showLogo(null) }}" width="60%" alt="" >
    </a>
</div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="{{ route('admin.home') }}" class="br-menu-link {!! activeShow('admin/home*') !!}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a>
        </li>
        <!-- br-menu-item -->
        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {!! activeShowSub(['admin/role*', 'admin/role*']) !!}">
                <i class="icon ion-location"></i>
                <span class="menu-item-label">Admins</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('admin.role.index') }}"
                        class="sub-link {!! activeShow('admin/role*') !!}">Role</a>
                </li>
            </ul>
        </li><!-- br-menu-item --> --}}
        <!-- br-menu-item -->
        <li class="br-menu-item">
            <a href="{{ route('admin.user.index') }}" class="br-menu-link {{ activeShow('admin/user*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Users List</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.order.index') }}" class="br-menu-link {{ request()->is('admin/order*') && !request()->is('admin/order-payments*') ? 'active' : '' }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Orders List</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.order.payments') }}" class="br-menu-link {{ request()->is('admin/order-payments*') ? 'active' : '' }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Payments List</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.plan.index') }}" class="br-menu-link {{ activeShow('admin/plan*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Membership Plans</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.service.index') }}" class="br-menu-link {{ activeShow('admin/service*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Services</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.testimonial.index') }}" class="br-menu-link {{ activeShow('admin/testimonial*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Testimonials</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.page.index') }}" class="br-menu-link {{ activeShow('admin/page*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Page Sections</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.contactmessage.index') }}" class="br-menu-link {{ activeShow('admin/contactmessage*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Contact Messages</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.setting.index') }}" class="br-menu-link {{ activeShow('admin/setting*') }}">
                <i class="icon ion-gear-a"></i>
                <span class="menu-item-label">Settings</span>
            </a>
        </li>
    </ul><!-- br-sideleft-menu -->
    <br>
</div><!-- br-sideleft -->
