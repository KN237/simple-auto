@extends('layouts.app')

@section('title')
Tableau de bord
@endsection


@section('content')

 <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><i class="metismenu-icon fas fa-car" style="font-size: 2rem"></i></div>
                        <div class="widget-subheading">Nombre de voitures</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$voitures->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><i class="metismenu-icon fas fa-car" style="font-size: 2rem"></i>
                        </div>
                        <div class="widget-subheading"> voitures disponibles</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$dispo->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><i class="metismenu-icon fas fa-car" style="font-size: 2rem"></i>
                        </div>
                        <div class="widget-subheading">voitures vendues</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$nondispo->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-xl-4">
            <div class="card mb-3 mt-2 widget-content bg-white">
                {!! $chart->container() !!}
            </div>
        </div>

        <div class="col-md-12 col-xl-8">
            <div class="card p-5 bg-white">
                {!! $chart2->container() !!}
            </div>
        </div>


    </div>



@endsection


@section('icon')
<i class="metismenu-icon fas fa-chart-line"></i>
@endsection

@push('page-js')
{!! $chart->script() !!}
{!! $chart2->script() !!}
@endpush



