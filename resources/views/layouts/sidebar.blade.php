<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth
                <a 
                    href="#" 
                    class="d-block" 
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                    {{ auth()->user()->name }}
                </a>

                <form action="{!! route('logout') !!}" method="post" style="display: none;" id="form-logout">
                    @csrf
                </form>
            @else
                <a href="{!! route('login') !!}" class="d-block">Login</a>
            @endauth
          
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">เมนูหลัก</li>
            <li class="nav-item">
                <a href="{!! route('pos.index') !!}" class="nav-link {{ \Request::routeIs('pos.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>ขาย</p>
                </a>
            </li>
            <li class="nav-header">สินค้า</li>
            <li class="nav-item">
                <a href="{!! route('product.list') !!}" class="nav-link {{ \Request::routeIs('product.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>คลัง</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('import.list') !!}" class="nav-link {{ \Request::routeIs('import.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-import"></i>
                    <p>นำเข้าคลัง</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('category.list') !!}" class="nav-link {{ \Request::routeIs('category.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>ประเภท</p>
                </a>
            </li>
            <li class="nav-header">รายงาน</li>
            <li class="nav-item">
                <a href="{!! route('report.day.index') !!}" class="nav-link {{ \Request::routeIs('report.day.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>ประจำวัน</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('report.month.index') !!}" class="nav-link {{ \Request::routeIs('report.month.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>ประจำเดือน</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('report.year.index') !!}" class="nav-link {{ \Request::routeIs('report.year.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>ประจำปี</p>
                </a>
            </li>
            <li class="nav-header">โปรโมชั่น</li>
            <li class="nav-item">
                <a href="{!! route('promotion.list') !!}" class="nav-link {{ \Request::routeIs('promotion.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-percent"></i>
                    <p>โปรโมชั่น</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('discount.list') !!}" class="nav-link {{ \Request::routeIs('discount.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-gift"></i>
                    <p>ส่วนลด</p>
                </a>
            </li>
            <li class="nav-header">ตั้งค่า</li>
            <li class="nav-item">
                <a href="{!! route('province.list') !!}" class="nav-link {{ \Request::routeIs('province.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>จังหวัด</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('district.list') !!}" class="nav-link {{ \Request::routeIs('district.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>อำเภอ</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('sub.district.list') !!}" class="nav-link {{ \Request::routeIs('sub.district.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-ol"></i>
                    <p>ตำบล</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('customer.list') !!}" class="nav-link {{ \Request::routeIs('customer.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users text-success"></i>
                    <p>ลูกค้า</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('employee.list') !!}" class="nav-link {{ \Request::routeIs('employee.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user text-primary"></i>
                    <p>พนักงาน</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('supplier.list') !!}" class="nav-link {{ \Request::routeIs('supplier.list') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-house-damage text-danger"></i>
                    <p>ผู้ผลิต</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{!! route('setting.index') !!}" class="nav-link {{ \Request::routeIs('setting.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs text-warning"></i>
                    <p>ตั้งค่า</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>