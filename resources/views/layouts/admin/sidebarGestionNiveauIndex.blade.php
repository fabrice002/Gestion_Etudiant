<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('Admin.etudiant.create') }}">
                        <i class="bi bi-circle"></i><span> Ajouter un Etudiant</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.departement.create') }}">
                        <i class="bi bi-circle"></i><span> Ajouter un Departement</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.niveau.create') }}">
                        <i class="bi bi-circle"></i><span> Ajouter un Niveau</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tableau</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('Admin.departement.index') }}">
                        <i class="bi bi-circle"></i><span>Gestion des Departements</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.filiere.index') }}">
                        <i class="bi bi-circle"></i><span>Gestion des Filieres</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.niveau.index') }}" class="active">
                        <i class="bi bi-circle"></i><span>Gestion des Niveaux</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.etudiant.index') }}">
                        <i class="bi bi-circle"></i><span>Gestion des Etudiants</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.ue.index') }}">
                        <i class="bi bi-circle"></i><span>Gestions des UEs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.attribution.index') }}">
                        <i class="bi bi-circle"></i><span>Gestions des Attributions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.groupeTD.index') }}">
                        <i class="bi bi-circle"></i><span>Gestions des Groupes de TD</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.enseignant.index') }}">
                        <i class="bi bi-circle"></i><span>Gestion des Enseignants</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Admin.club.index') }}">
                        <i class="bi bi-circle"></i><span>Gestion des Clubs</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('ajoutUtilisateur.create') }}">
                <i class="bi bi-card-list"></i>
                <span>Ajout Utilisateur</span>
            </a>
        </li> --}}



    </ul>

</aside><!-- End Sidebar-->
