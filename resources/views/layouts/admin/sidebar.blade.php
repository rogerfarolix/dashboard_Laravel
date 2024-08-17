<!-- Sidebar -->
<div class="sidebar" style="background-color:rgb(13, 247, 196)">
  <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" style="background-color:rgb(7, 247, 195)">
          <a href="{{ url('/')}}" class="logo">
              <img src="{{ asset('assetsadmin/img/logo.png')}}" alt="navbar brand" class="navbar-brand" height="80" />
          </a>
          <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
              </button>
          </div>
          <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
          </button>
      </div>
      <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
          <ul class="nav nav-secondary">
              <li class="nav-item active">
                  <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                      <i class="fas fa-tachometer-alt"></i>
                      <p>Tableau de bord</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="dashboard">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.dashboard')}}">
                                  <span class="sub-item">Admin</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-section">
                  <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">A faire</h4>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#Catégories">
                      <i class="fas fa-tags"></i>
                      <p>Catégories</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="Catégories">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.categories.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.categories.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#Actualités">
                      <i class="fas fa-newspaper"></i>
                      <p>Actualités</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="Actualités">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.actualites.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.actualites.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#Infrastructures">
                      <i class="fas fa-building"></i>
                      <p>Infrastructures</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="Infrastructures">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.infrastructures.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.infrastructures.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#Partenaires">
                      <i class="fas fa-handshake"></i>
                      <p>Partenaires</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="Partenaires">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.partenaires.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.partenaires.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#universitaire">
                      <i class="fas fa-graduation-cap"></i>
                      <p>Vie universitaire</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="universitaire">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.vieuniversitaires.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.vieuniversitaires.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#dirigeante">
                      <i class="fas fa-users"></i>
                      <p>Equipe dirigeante</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="dirigeante">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.equipes.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.equipes.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#Avis">
                      <i class="fas fa-comments"></i>
                      <p>Avis</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="Avis">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.avis.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.avis.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#Commentaires">
                      <i class="fas fa-comment-dots"></i>
                      <p>Commentaires</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="Commentaires">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{route('admin.commentaires.index')}}">
                                  <span class="sub-item">Liste</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{route('admin.commentaires.create')}}">
                                  <span class="sub-item">Ajouter</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>



              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#Galerie">
                    <i class="fas fa-images"></i>
                    <p>Galerie</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="Galerie">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.galeries.index')}}">
                                <span class="sub-item">Liste</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.galeries.create')}}">
                                <span class="sub-item">Ajouter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
          </ul>
      </div>
  </div>
</div>
<!-- End Sidebar -->
