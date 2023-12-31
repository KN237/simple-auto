@extends('layouts.app')

@section('title')

  Ventes

@endsection


@section('icon')

    <i class="metismenu-icon fas fa-history"></i>

@endsection

@section('bouton')

    <div class="page-title-actions">

        <div class="d-inline-block dropdown">

            <button type="button" class="btn-shadow btn btn-dark" data-toggle="modal" data-target="#form">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                    <i class="metismenu-icon fas fa-plus"></i>
                </span>
                Ajouter une vente
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

                        <th>Voiture</th>

                        <th>Date</th>


                        <th>Client</th>

                        <th>Montant</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($operations as $t)
                    
                        <tr style="font-size: 14px;">

                            <td> 
                             @foreach ($images as $i)
                             @if($t->voiture->id==$i->id_v)
                            
                             <a title="Voir" href="{{ $i->url }}" data-lightbox="{{ $t->voiture->id}}" data-title="{{ $i->url }}" >
                             <i class="text-dark fas fa-eye"></i></a>
                             @break
                             @endif
                             
                             @endforeach

                             @foreach ($images as $i)
                             @if($t->voiture->id==$i->id_v)
                             
                             <a title="Voir" href="{{ $i->url }}" data-lightbox="{{ $t->voiture->id }}" data-title="{{ $i->url }}" >
                             </a>
                             
                             @endif
                             @endforeach

                             </td>


                            <td>{{ $t->date }}</td>


                            <td>{{ $t->client->first_name }} {{ $t->client->last_name }}</td>

                          
                            <td>{{ $t->montant }}</td>

                            <td style="display:flex;flex-direction: column">

                                <center> <a title="supprimer"
                                    data-toggle="modal" data-target="#supp{{ $t->id}}"
                                        class="btn bg-danger text-white deletebtn"> Supprimer</a>
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

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header"> <h4> Ajout de vente </h4> </div>

            <div class="modal-body">

                <form class="m-5" action="/operation" method="post">
                    @csrf

                    

                               <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Date</label><input name="date" type="date"
                            class="form-control"></div>

                            <label>Client</label>
                            <select name="id_cl" class="form-control">

                                @foreach($clients as $b)
                                                    <option value="{{$b->id}}">{{$b->first_name}} {{$b->last_name}}</option>
                                
                                 @endforeach
                                
                            </select>


                             <label >Voiture</label>

                              <select name="id_v" class="form-control">

                                  @foreach($voitures as $b)
                                                    <option value="{{$b->id}}">{{$b->id}} {{$b->marque}} {{$b->model}}</option>
                                
                                 @endforeach
                                
                            </select>

                            <div class="position-relative form-group"><label for="examplePassword11"
                            class="___class_+?24___">Montant</label><input name="montant" type="number"
                            class="form-control"></div>



                    <button class="mt-2 btn btn-dark btn-block">Enregistrer</button>

                </form>

            </div>

        </div>
    </div>
</div>





@foreach ($operations as $t)

<div class="modal fade" id="supp{{ $t->id}}" tabindex="-1" role="dialog"
  aria-labelledby="mySmallModalLabel" aria-hidden="true">

  <div class="modal-dialog">

      <div class="modal-content">

          <div class="modal-body">

<center class="mt-2"><h4> Voulez-vous vraiment supprimer cette vente de votre liste?</h4></center>

<center class="mt-5 mb-4"><a onclick="event.preventDefault; var form=document.getElementById('form2{{ $t->id}}'); form.submit();"
    class="btn bg-danger mr-3 p-2 rounded text-white" > Confirmer</a> <a type="button" data-dismiss="modal" aria-label="Close" class="btn bg-dark p-2 rounded  text-white"> Annuler</a></center>
    <form id="form2{{ $t->id}}" action="/operation/{{ $t->id}}" method="post"
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

