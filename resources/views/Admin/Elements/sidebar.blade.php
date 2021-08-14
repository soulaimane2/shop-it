<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href="#"><i class="icon ion-android-star-outline"></i> starlight</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span><!-- input-group-btn -->
  </div><!-- input-group -->

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">
    <a href="index.html" class="sl-menu-link active">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Categories</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{url('admin/categories')}}" class="nav-link">Main Categories</a></li>
      <li class="nav-item"><a href="{{url('admin/subcategories')}}" class="nav-link">Sub Categories</a></li>
      <li class="nav-item"><a href="{{url('/admin/brands')}}" class="nav-link">Brands</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Coupons</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{url('admin/coupons')}}" class="nav-link">Coupons</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Products Management</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{url('/admin/products')}}" class="nav-link">Products</a></li>
      <li class="nav-item"><a href="{{url('/admin/products/add')}}" class="nav-link">Add Product</a></li>
     
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Tables</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
      <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Maps</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
      <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
    </ul>
    <a href="" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">NL Subscribers</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>

      </div><!-- menu-item -->
    </a>
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{url('/admin/Emails')}}" class="nav-link">Email List</a></li>
      <li class="nav-item"><a href="map-vector.html" class="nav-link">...</a></li>
    </ul>
    <!-- sl-menu-link -->
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Pages</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
      <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
      <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
      <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
    </ul>
  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->