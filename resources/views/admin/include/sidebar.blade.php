<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu"> 
    <div class="h-100" data-simplebar> 
        <!-- User box -->
        <div class="user-box text-center"></div>

        <!--- Sidemenu -->
        <div id="sidebar-menu"> 
            <ul id="side-menu">
                <li>
                    <a href="{{route('backend.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li> 
                  <li>
                    <a href="{{route('backend.allsections')}}">
                        <i class="mdi mdi-file-document-multiple-outline mdi-18px"></i>
                        <span>Sections</span>
                    </a>
                </li>
           
                <li>
                    <a href="{{route('case.all-case')}}">
                        <i class="mdi mdi-file-document-multiple-outline mdi-18px"></i>
                        <span>Cases</span>
                    </a>
                </li>
          
               @if((session()->get('status') == 1)&&(session()->get('user_role') == 1)) 
                <li>
                    <a href="{{route('users')}}">
                        <i class="mdi mdi-file-document-multiple-outline mdi-18px"></i>
                        <span>Users</span>
                    </a>
                </li>
               @endif
               @if((session()->get('status') == 1)&&(session()->get('user_role') == 2)) 
                <li>
                    <a href="{{route('users')}}">
                        <i class="mdi mdi-file-document-multiple-outline mdi-18px"></i>
                        <span>Users</span>
                    </a>
                </li>
                @endif   
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fe-log-out mdi-24px"></i>
                        <span>Logout 
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </li> 
          
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End