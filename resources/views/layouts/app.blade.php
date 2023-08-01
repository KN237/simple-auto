<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> @yield('title') | NT Auto </title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="/admin/assets/main.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">   

    <link href="/lightbox/css/lightbox.css" rel="stylesheet" />
   
<style>

a.btn.text-white{
    width:150px;
}

</style>

</head>



<body>
    <!-- ***** Preloader Start ***** -->
    <div id="loader"></div>
    <!-- ***** Preloader End ***** -->

    @yield('modals')

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"> </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>

                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                        </div>
                    </div>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="/avatar.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                           
                                       
                                            <a type="button" tabindex="0" class="dropdown-item" data-toggle="modal"
                                                data-target="#dec">

                                                <i class="fas fa-sign-out-alt m-1"></i>

                                                Deconnexion</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{Auth::user()->name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu mt-2">
                            <li class="mb-4 mt-4">
                                <a href="/">
                                    <!-- class="mm-active"  -->
                                    <i class="metismenu-icon fas fa-chart-line"></i>
                                    Tableau de bord
                                </a>
                            </li>



                            <li class="mb-4">
                                <a href="">
                                    <i class="metismenu-icon fa fa-car"></i>
                                    Voitures

                                </a>

                                <ul>

                                    <li>
                                        <a href="/voiture">
                                            <i class="metismenu-icon"></i>
                                            Voitures disponibles
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/vvoiture">
                                            <i class="metismenu-icon">
                                            </i>Voitures vendues
                                        </a>
                                    </li>



                                </ul>

                            </li>

                        
                          <li class="mb-4">

                                <a href="/client">

                                    <i class="metismenu-icon fa fa-user"></i>

                                    Clients

                                </a>

                            </li>



                          
                      
                       

                           

                            <li class="mb-4">

                                <a href="/operation">

                                    <i class="metismenu-icon fas fa-history"></i>

                                   Ventes

                                </a>

                            </li>


                          

                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    @yield('icon')
                                </div>

                                <div>

                                    @yield('title')

                                </div>
                            </div>

                            @yield('bouton')

                        </div>



                    </div>

                    @yield('content')


                </div>
            </div>
        </div>
    </div>


@stack('page-js')
    
    <script type="text/javascript" src="/admin/assets/scripts/main.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script src="/js/main.js"></script>
    
<script src="/lightbox/js/lightbox.js"></script>
    <script>
        $(function() {
            $(document).ready(function() {
                $('#example').DataTable();
            });
        });

        $('#example').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c&eacute;dent",
                    next: "Suivant",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    </script>

    <!-- Deconnexion-->

    <div class="modal fade" id="dec" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">

                    <center class="mt-2">
                        <h4> Voulez-vous vraiment vous déconnecter ?</h4>
                    </center>

                   <center class="mt-5 mb-4"><a onclick="event.preventDefault; var form=document.getElementById('form3'); form.submit();"
    class="btn bg-success mr-3 p-2 rounded text-white" ><i class="fas fa-check mr-1 text-white"></i> Confirmer</a> <a type="button" data-dismiss="modal" aria-label="Close" class="btn bg-danger p-2 rounded text-white "><i class="text-white fas fa-times"></i> Annuler</a></center>
    <form id="form3" action="/logout" method="post"
        style="display: none;">
        @csrf

    </form>


                </div>

            </div>
        </div>
    </div>



</body>

</html>