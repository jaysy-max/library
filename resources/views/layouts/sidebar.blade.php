<div class="sidebar" data-color="orange" data-image="assets/img/sidebar-1.jpg" >
            <div class="logo">
                <a class="simple-text">
                COLEGIO De DAGUPAN <br> ONLINE LIBRARY
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
              <li class="{{ Request::is('/index') ? 'active' : '' }}">
                <a href="{{ url('/index') }}">
                <i class="material-icons">insights</i>
                <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('/annoucement') ? 'active' : '' }}">
                <a href="{{ url('/announcement') }}">
                <i class="material-icons">campaign</i>
                <p>Announcement</p>
                </a>
            </li>
                <li class="{{ Request::is('registration') ? 'active' : '' }}">
                    <a href="{{ url('registration') }}">
                     <i class="material-icons">person_add</i>
                    <p>New Registration</p>
                    </a>
                </li>
                <li class="{{ Request::is('members') ? 'active' : '' }}">
                    <a href="{{ url('members') }}">
                <i class="material-icons">groups</i>
                    <p>View Members</p>
                    </a>
                </li>
                <li class="{{ Request::is('books') ? 'active' : '' }}">
                    <a href="{{ url('books') }}">
                    <i class="material-icons">auto_stories</i>
                    <p>View All Books</p>
                    </a>
                </li>
                <li class="{{ Request::is('/reservation') ? 'active' : '' }}">
                    <a href="{{ url('/reservation') }}">
                    <i class="material-icons">library_books</i>
                    <p>Reservation</p>
                    </a>
                </li>
                <li class="{{ Request::is('issues')||Request::is('issues_not_returned') ? 'active' : '' }}">
                    <a href="{{ url('issues') }}">                        
                    <i class="material-icons">list</i>
                    <p>Borrowed Books/s</p>
                    </a>
                </li>
                <li class="{{ Request::is('categories') ? 'active' : '' }}">
                    <a href="{{ url('categories') }}">                        
             <i class="material-icons">category</i>
                    <p>Book Categories</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin') }}">                        
             <i class="material-icons">password</i>
                    <p>Change Password</p>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons">logout</i>
                        <p> Logout</p>                       
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </li>
                </ul>
            </div>
        </div>

        