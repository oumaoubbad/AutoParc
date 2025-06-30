<aside class="control-sidebar control-sidebar-dark">

        <div class="bg-dark">
            <div class="card-body bg-dark box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src=" /images/2.png {{ Auth::user()->photo }}" alt="User profile picture">
            </div>
        
            <h3 class="profile-username text-center ellipsis">{{ userFullName() }} </h3>
              
            <ul class="list-group bg-dark mb-3">
                
                <li class="list-group-item">
                <a href="{{ route('admin.profile')}}"  class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
                </li>
            </ul>
        
            <a class="btn btn-info btn-block" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        Déconnexion
    </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
            <!-- /.card-body -->
        </div>

    </aside>
    