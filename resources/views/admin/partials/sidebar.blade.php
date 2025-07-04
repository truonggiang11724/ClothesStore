        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{ asset('assets/images/faces/user.png') }}" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Typography</a></li>
                </ul>
              </div>
            </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.coupon') }}">
                        <span class="menu-title">Quản lý mã giảm giá</span>
                        <i class="mdi mdi mdi-barcode-scan menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product') }}">
                        <span class="menu-title">Quản lý sản phẩm</span>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.categories') }}">
                        <span class="menu-title">Quản lý loại hàng</span>
                        <i class="mdi mdi-table-large menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders') }}">
                        <span class="menu-title">Quản lý đơn hàng</span>
                        <i class="mdi mdi mdi-checkbox-multiple-marked-outline menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item sidebar-actions">
                    <span class="nav-link">
                        {{-- <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div> --}}
                        <a href="{{ route('home') }}" class="btn btn-block btn-lg btn-gradient-primary mt-4">Trang
                            chủ</a>
                        <div class="mt-4">
                            {{-- <div class="border-bottom">
                    <p class="text-secondary">Categories</p>
                  </div> --}}
                            {{-- <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li>Pro</li>
                  </ul> --}}
                        </div>
                    </span>
                </li>
            </ul>
        </nav>
