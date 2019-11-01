
<div class="admenu">
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="{{ route('admin.product') }}" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/imran.jpg') }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Imran</p>
                  <p class="designation">Developer</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Order" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Orders</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Order">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.order') }}">Manage Orders</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product') }}">Manage Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product_create') }}">Create Product</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basics">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.category') }}">Manage Categorys</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.category.create') }}">Create Category</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basicss" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manage Brand</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basicss">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brand') }}">Manage Brand</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brand.create') }}">Create Brand</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
</div>