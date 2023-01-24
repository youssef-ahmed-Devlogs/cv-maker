<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="ai-icon" href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('admin.users') }}">Users List</a>
                    </li>
                    <li>
                        <a href="add-student.html">Add User</a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-list"></i>
                    <span class="nav-text">Categories</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="all-students.html">Categories List</a>
                    </li>
                    <li>
                        <a href="add-student.html">Add Category</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-file-lines"></i>
                    <span class="nav-text">Templates</span>
                </a>

                <ul aria-expanded="false">
                    <li>
                        <a href="all-students.html">Templates List</a>
                    </li>
                    <li>
                        <a href="add-student.html">Add Template</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="ai-icon" href="#" aria-expanded="false">
                    <i class="la la-cog"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>