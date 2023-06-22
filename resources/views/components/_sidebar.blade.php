<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>CRM</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @can('admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('users.index')}}">All users</a>
                <a class="collapse-item" href="{{route('users.create')}}">Add user</a>
            </div>
        </div>
    </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
           aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-folder"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="collapseOrders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('orders.index')}}">All Orders</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAddresses"
           aria-expanded="true" aria-controls="collapseAddresses">
            <i class="fas fa-folder"></i>
            <span>Addresses</span>
        </a>
        <div id="collapseAddresses" class="collapse" aria-labelledby="collapseAddresses" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('addresses.index')}}">All Addresses</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
           aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-hashtag"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="collapseCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('categories.index')}}">All Categories</a>
                <a class="collapse-item" href="{{route('categories.create')}}">Create Category</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-shopping-bag"></i>
            <span>E-COMMERCE</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
           aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-shopping-cart"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="collapseProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('products.index')}}">All products</a>
                <a class="collapse-item" href="{{route('products.create')}}">Create Product</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
           aria-expanded="true" aria-controls="collapseBrands">
            <i class="fas fa-tags"></i>
            <span>Brands</span>
        </a>
        <div id="collapseBrands" class="collapse" aria-labelledby="collapseBrands" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('brands.index')}}">All brands</a>
                <a class="collapse-item" href="{{route('brands.create')}}">Create Brand</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProductcategories"
           aria-expanded="true" aria-controls="collapseProductcategories">
            <i class="fas fa-tint"></i>
            <span>Product Categories</span>
        </a>
        <div id="collapseProductcategories" class="collapse" aria-labelledby="collapseProductcategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('productcategories.index')}}">All Product Categories</a>
                <a class="collapse-item" href="{{route('productcategories.create')}}">Create Product Category</a>
            </div>
        </div>
    </li>
        <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
