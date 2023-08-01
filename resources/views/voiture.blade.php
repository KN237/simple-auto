@extends('layouts.app')

@section('title')

  Voitures {{$string}}

@endsection


@section('icon')

    <i class="metismenu-icon fas fa-car"></i>

@endsection

@section('bouton')

    <div class="page-title-actions">

        <div class="d-inline-block dropdown">

            <button type="button" class="btn-shadow btn btn-dark" data-toggle="modal" data-target="#addvoiture">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="metismenu-icon fas fa-plus"></i>
                </span>
                Ajouter une voiture
            </button>

        </div>
    </div>


@endsection

@section('content')

    <div class="main-card mb-3 card">
        <div class="card-body table-responsive">
            <table id="example" style="width:100%" class="table table-borderless table-hover text-center">
                <thead>
                    <tr style="font-size: 14px;">
 <th>Images</th>
                        <th>Marque</th>

                        <th>Model </th>

                        <th>Couleur </th>

                         <th>Statut</th>
                       

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($voitures as $t)
                    
                        <tr style="font-size: 14px;">
                         <td> 
                             @foreach ($images as $i)
                             @if($t->id==$i->id_v)
                            
                             <a title="Voir" href="{{ $i->url }}" data-lightbox="{{ $t->id }}" data-title="{{ $i->url }}" >
                             <i class="text-dark fas fa-eye"></i></a>
                             @break
                             @endif
                             
                             @endforeach

                             @foreach ($images as $i)
                             @if($t->id==$i->id_v)
                             
                             <a title="Voir" href="{{ $i->url }}" data-lightbox="{{ $t->id }}" data-title="{{ $i->url }}" >
                             </a>
                             
                             @endif
                             @endforeach

                             </td>

                            <td>{{ $t->marque }}</td>

                            <td>{{ $t->model }}</td>

                            <td>{{ $t->couleur }}</td>

                            <td>{{ $t->statut }}</td>

                            <td style="display:flex;flex-direction: column">

                                <center> <a title="supprimer"
                                    data-toggle="modal" data-target="#supp{{ $t->id}}"
                                        class="btn bg-danger deletebtn text-white"><i class="text-white "></i> Supprimer</a>

                                         <a title="modifier"
                                    data-toggle="modal" data-target="#mod{{ $t->id}}"
                                        class="btn bg-dark text-white"><i class=" text-white"></i> Modifier</a>
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

<div class="modal fade" id="addvoiture" aria-hidden="true" style="z-index:1000000000">

    <div class="modal-dialog">

        <div class="modal-content">
           
           <div class="modal-header"> <h4> Ajout de voiture </h4> </div>

            <div class="modal-body">

                <form class="m-5" action="/voiture" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="position-relative form-group">Marque <input name="marque" type="text"
                            class="form-control"></div>

                               <div class="position-relative form-group">Model <input name="model" type="text"
                            class="form-control"></div>

                             <div class="position-relative form-group">Couleur <input name="couleur" type="text"
                            class="form-control"></div>

                           

                            <select name="statut" class="form-control">

                                  
                           <option value="Disponible">Disponible</option>
                                
                           <option value="Pas disponible">Pas disponible</option>
                                
                            </select>

                                <div class="position-relative form-group">Image <input name="images[]" type="file"
                            class="form-control" multiple></div>

                    <button class="mt-2 btn btn-dark btn-block">Enregistrer</button>

                </form>

            </div>

        </div>
    </div>
</div>


@foreach ($voitures as $l)

    <!-- Mod -->

    <div class="modal fade" id="mod{{ $l->id }}" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

            <div class="modal-header"> <h4> Modification de voiture </h4> </div>

                <div class="modal-body">

                    <form class="m-5" action="/voiture/{{ $l->id }}" method="post">
                        @csrf
                        @method('put')

                         <div class="position-relative form-group">Marque <input name="marque" type="text"
                            class="form-control" value={{ $l->marque }}></div>

                               <div class="position-relative form-group">Model <input name="model" type="text"
                            class="form-control" value={{ $l->model }}></div>

                             <div class="position-relative form-group">Couleur <input name="couleur" type="text"
                            class="form-control" value={{ $l->couleur }}></div>

                      

                             <select name="statut" class="form-control">

                                  
                           <option value="Disponible" @if($l->statut=='Disponible') selected @endif>Disponible</option>
                                
                           <option value="Pas disponible" @if($l->statut!='Disponible') selected @endif>Pas disponible</option>
                                
                            </select>

                                <div class="position-relative form-group">Image <input name="images[]" type="file"
                            class="form-control" multiple></div>
                            
                        <button class="mt-2 btn btn-dark btn-block">Enregistrer</button>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endforeach



@foreach ($voitures as $t)

<div class="modal fade" id="supp{{ $t->id}}" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">

  <div class="modal-dialog">

      <div class="modal-content">

          <div class="modal-body">

<center class="mt-2"><h4> Voulez-vous vraiment supprimer cette voiture de votre liste?</h4></center>

<center class="mt-5 mb-4"><a onclick="event.preventDefault; var form=document.getElementById('form2{{ $t->id}}'); form.submit();"
    class="btn bg-danger mr-3 p-2 rounded text-white" >Confirmer</a> <a type="button" data-dismiss="modal" aria-label="Close" class="btn bg-dark p-2 rounded text-white ">Annuler</a></center>
    <form id="form2{{ $t->id}}" action="/voiture/{{ $t->id}}" method="post"
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


{{-- @push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	
@endpush


@push('page-js')
<script src="/main/assets/js/jquery-2.1.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endpush
 --}}
