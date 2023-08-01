@extends('layouts.app')

@section('title')

  Clients

@endsection


@section('icon')

    <i class="metismenu-icon fas fa-user"></i>

@endsection

@section('bouton')

    <div class="page-title-actions">

        <div class="d-inline-block dropdown">

            <button type="button" class="btn-shadow btn btn-dark" data-toggle="modal" data-target="#addclient">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="metismenu-icon fas fa-plus"></i>
                </span>
                Ajouter un client
            </button>

        </div>
    </div>


@endsection

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	
@endpush


@section('content')

    <div class="main-card mb-3 card">
        <div class="card-body table-responsive">
            <table id="example" style="width:100%" class="table table-borderless table-hover text-center">
                <thead>
                    <tr style="font-size: 14px;">

                        <th>Nom</th>

                        <th>Prenom </th>

                        <th>Email </th>

                        <th>Telephone</th>

                        <th>CNI</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($clients as $t)
                    
                        <tr style="font-size: 14px;">

                            <td>{{ $t->first_name }}</td>

                            <td>{{ $t->last_name }}</td>

                            <td>{{ $t->email }}</td>

                            <td>{{ $t->telephone }}</td>

                            <td>{{ $t->cni }}</td>

                            <td style="display:flex;flex-direction: column">

                                <center> <a title="supprimer"
                                    data-toggle="modal" data-target="#supp{{ $t->id}}"
                                        class="btn bg-danger deletebtn text-white"> Supprimer</a>

                                        <a title="modifier"
                                    data-toggle="modal" data-target="#mod{{ $t->id}}"
                                        class="btn bg-dark text-white"> Modifier</a>
                                </center>
                            </td>

                        </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



@endsection



@section('modals')



<!-- Ajout -->

<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

         <div class="modal-header"> <h4> Ajout de client </h4> </div>

            <div class="modal-body">

                <form class="m-5" action="/client" method="post">
                    @csrf

                    <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Nom</label><input name="first_name" type="text"
                            class="form-control"></div>

                               <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Prenom</label><input name="last_name" type="text"
                            class="form-control"></div>

                             <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Telephone</label><input name="telephone" type="text"
                            class="form-control"></div>

                             <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Email</label><input name="email" type="email"
                            class="form-control"></div>

                                <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Numéro de CNI</label><input name="cni" type="text"
                            class="form-control"></div>

                    <button class="mt-2 btn btn-dark btn-block">Enregistrer</button>

                </form>

            </div>

        </div>
    </div>
</div>


@foreach ($clients as $l)

    <!-- Mod -->

    <div class="modal fade" id="mod{{ $l->id }}" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

             <div class="modal-header"> <h4> Modification de client </h4> </div>

                <div class="modal-body">
                    <form class="m-5" action="/client/{{ $l->id }}" method="post">
                        @csrf
                        @method('put')

                        <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Nom</label><input name="first_name" type="text"
                            class="form-control" value="{{ $l->first_name }}"></div>

                               <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Prenom</label><input name="last_name" type="text"
                            class="form-control" value="{{ $l->last_name }}"></div>

                             <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Telephone</label><input name="telephone" type="phone"
                            class="form-control" value="{{ $l->telephone}}"></div>

                             <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Email</label><input name="email" type="email"
                            class="form-control" value="{{ $l->email }}"></div>

                                <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Numéro de CNI</label><input name="cni" type="text"
                            class="form-control" value="{{ $l->cni}}"></div>


                        <button class="mt-2 btn btn-dark btn-block">Enregistrer</button>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endforeach



@foreach ($clients as $t)

<div class="modal fade" id="supp{{ $t->id}}" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">

  <div class="modal-dialog">

      <div class="modal-content">

          <div class="modal-body">

<center class="mt-2"><h4> Voulez-vous vraiment supprimer ce client de votre liste?</h4></center>

<center class="mt-5 mb-4"><a onclick="event.preventDefault; var form=document.getElementById('form2{{ $t->id}}'); form.submit();"
    class="btn bg-danger mr-3 p-2 rounded text-white" >Confirmer</a> <a type="button" data-dismiss="modal" aria-label="Close" class="btn bg-dark text-white p-2 rounded "> Annuler</a></center>
    <form id="form2{{ $t->id}}" action="/client/{{ $t->id}}" method="post"
        style="display: none;">
        @csrf
        @method('delete')

    </form>

          </div>

      </div>
  </div>
</div>

@endforeach

@endsection




@push('page-js')
<script src="/main/assets/js/jquery-2.1.0.min.js"></script>
@endpush

