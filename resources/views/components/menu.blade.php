<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           @if(auth()->user()->role) 
    <li class="nav-item">
        <a href="/" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Accueil
          </p>
        </a>
      </li>
      
    

    <li class="nav-item">
        <a href="/user" class="nav-link">
        <i class="fa fa-users" aria-hidden="true"></i>
            Utilisateurs
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/employes" class="nav-link">
        <i class="fa fa-briefcase" aria-hidden="true"></i>
            Employes
            </p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="#" class="nav-link ">
        <i class="fa fa-car" aria-hidden="true"></i>
            <p>
            Référentiel
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/marques"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Marques </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/modeles"
                    class="nav-link ">
                <i class="nav-icon fas fa-circle"></i>
                <p>Modele</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/treparations"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Tyoe réparation </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/fonctions"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Fonction </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/tcarburants"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Type Carburant </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/tentretiens"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Type Entretien </p>
                </a>
            </li>
            
        </ul>
    </li>

    <li class="nav-item ">
        <a href="#" class="nav-link ">
        <i class="fa fa-car" aria-hidden="true"></i>
            <p>
            Voiture
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/voitures"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Voiture </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/traites"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Traite </p>
                </a>
            </li>
            
        </ul>
    </li>
    <li class="nav-item">
        <a href="/calendar/index" class="nav-link ">
        <i class="fa fa-calendar" aria-hidden="true"></i>
                <p>
            Calendar
            </p>
        </a>
    </li>
 
    <li class="nav-item">
        <a href="/reservations" class="nav-link">
        <i class="fa fa-calendar-check" aria-hidden="true"></i>
            <p>
            Réservations
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/affectations" class="nav-link ">
        <i class="fa fa-handshake" aria-hidden="true"></i>
                <p>
            Affectations
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/carburants" class="nav-link">
        <i class="fas fa-gas-pump"></i>           
            <p>
            Carburant
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/entretiens" class="nav-link">
        <i class="fa fa-wrench" aria-hidden="true"></i>
            <p>
            Entretien
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/reparations" class="nav-link">
        <i class="fa fa-wrench" aria-hidden="true"></i>
            <p>
            Réparation
            </p>
        </a>
    </li>
    
    </li>

    <li class="nav-item ">
        <a href="/administratif" class="nav-link ">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
             Administratif
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/administratif"
                    class="nav-link ">
                <i class="nav-icon far fa-circle"></i>
                <p>Assurance/Taxe/Visite </p>
                </a>
            </li>
            
        </ul>
    </li>
    @else
    <li class="nav-item">
        <a href="/profile" class="nav-link ">
        <i class="fas fa-user"></i>            <p>
            profil
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/reservations" class="nav-link ">
        <i class="fa fa-calendar-check"></i>            <p>
            Mes Reservation
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/voitures" class="nav-link">
        <i class="fa fa-car" aria-hidden="true"></i>
            <p>
            Les Voiture Disponible
            </p>
        </a>
    </li>
    </ul>
   @endif
  </nav>
