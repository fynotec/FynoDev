@extends('app')

@section('css')
<link rel="stylesheet" href="{{asset('js/jqwidgets/styles/jqx.base.css') }}">
@stop

@section('content')
	<h1>Véhicules/Engin</h1>

    <input id="vehicleNewBtn" class=" btn btn-danger formaddBtn" type="button" value="Nouveau véhicule / engin" />

	<div id="table"></div>

    <div class="Wdw" id="vehicledialog">
        <div class="WdwDv">
           
        </div>
    </div>







    

	<script src="{{asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/jqwidgets/jqxcore.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxwindow.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxpanel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxtabs.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxcheckbox.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxdata.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxscrollbar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxbuttons.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxlistbox.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxdropdownlist.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxgrid.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxgrid.sort.js')}}"></script> 
	<script type="text/javascript" src="{{asset('js/jqwidgets/jqxgrid.pager.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxgrid.selection.js')}}"></script> 
	<script type="text/javascript" src="{{asset('js/app/vehicule.js')}}"></script> 
	
@stop


