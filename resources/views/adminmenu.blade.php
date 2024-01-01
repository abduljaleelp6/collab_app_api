<nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="../assets/img/logo1.jpg" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
            <li>
                    <a href="#"><i class="fas fa-home"></i> Dashboard</a>
                </li>
            <li>
                    <a href="#businessmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Business</a>
                    <ul class="collapse list-unstyled" id="authmenu">
                        <li>
                            <a href="<?php echo $web_url;?>/admin/businessmenu"><i class="fas fa-lock"></i> Business</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-user-plus"></i> Activity</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-user-lock"></i> Sub Activity</a>
                        </li>
                    </ul>
            </li>
                <li>
                    <a href="#productmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Products</a>
                    <ul class="collapse list-unstyled" id="productmenu">
                        <li>
                            <a href="<?php echo $web_url;?>/admin/productlist"><i class="fas fa-lock"></i> Product</a>
                        </li>
                        <li>
                            <a href="signup.html"><i class="fas fa-user-plus"></i> Category</a>
                        </li>
                        <li>
                            <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Sub Category</a>
                        </li>
                    </ul>
                </li>
               
            
                
                
                
                <li>
                    <a href="#"><i class="fas fa-user-friends"></i>Users</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cog"></i>Settings</a>
                </li>
            </ul>
        </nav>