@extends('app')

@section('css')
    <link rel="stylesheet" href="{{asset('js/jqwidgets/styles/jqx.base.css') }}">
    <link rel="stylesheet" href="{{asset('js/jqwidgets/styles/jqx.bootstrap.css') }}">
@stop

@section('content')
<style>

    table {
    border-collapse: collapse;
}

td {
    padding-top: .9em;
    padding-bottom: .9em;
}
</style>
    

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Engin / Véhicule</h3>
        </div>
        <div class="panel-body">
            

             
            <form id= "vehicleformEdit" method="POST" action="" accept-charset="UTF-8 action="{{action('SmController@update' , ['id' => $id])}}">
            <input name="_method" type="hidden" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <table class="col-md-12" style="border-spacing: 10px 50px;margin-bottom:20px; ">
        <fieldset>
        <legend style="text-decoration:underline;">Informations Générales</legend>
          
        <tr>
            <td class="col-md-1">
                <label class="control-label">Entité :</label>
            </td>
            <td colspan="2" class="col-md-4">
                 <input class="in2init form" type="hidden" id="SmCorpStruct" name="SmCorpStruct" value="0" />
                 <input class="in2init form-control" type="text" id="SmCorpStructLabel" />
            </td>
            <td class="col-md-1">
                <label class="control-label">Désignation :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <input class="in2init" type="hidden" id="SmClass" name="SmClass" value="0" />
                <input class="in2init form-control" type="text" id="SmClassLabel" />
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Marque :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="combo2init" id="SmMark" name="SmMark"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Model :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="combo2init" id="SmModel" name="SmModel"></div>
            </td>
        </tr>
        <tr>
            <td class="col-md-1"><label class="control-label">IMM :</label></td>
            <td class="col-md-3">
                <input class="in2init" id="SupportMediumIdentification" name="SupportMediumIdentification"/>
            </td>
            <td class="col-md-1"><label class="control-label">Code :</label></td>
            <td class="col-md-3">
                <input class="in2init" id="ICode" name="ICode"/>
            </td>
            <td class="col-md-1"><label class="control-label">Compteur :</label></td>
            <td class="col-md-3">
                <div class="combo2init" style="display: inline-block;vertical-align: middle;" id="CounterType" name="CounterType"></div>
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Conducteur :</label>
                
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="combo2init" id="DriverID" name="DriverID"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Status :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <select id="smStatus" name="SmStatus">
                    <option value="-1" selected disabled >Selectionnez une status</option>
                    <option value="0">Operationnel</option>
                    <option value="1">En panne</option>
                    <option value="2">proposé à la réforme</option>
                    <option value="3">réformé</option>
                    <option value="4">vendu</option>
                </select> 
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Essieux :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="combo2init" id="AxlesCount" name="AxlesCount" readonly="readonly"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Pneux :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <input class="in2init" id="TirePerAxle" name="TirePerAxle" readonly=>
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Carburant :</label>
            </td>
            <td colspan="2"  class="col-md-4">
               <div class="combo2init"  id="FuelType" name="FuelType" readonly="readonly"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Plafond Mensuel :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="in2init" id="RefuelQuantiyAlert" name="RefuelQuantiyAlert"></div>
            </td>
        </tr>
        </fieldset>
    </table>

    <table class=" col-md-12" style="margin-bottom:20px;">

        <fieldset>
        <legend style="text-decoration:underline;">Géolocalisation</legend>
        
        <tr>
            <td class="col-md-1">
                <label class="control-label">Parking :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="in2init" id="ParkingAreaLabel" name="ParkingAreaLabel"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Rayon d'activité :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="in2init" id="WorkingAreaLabel" name="WorkingAreaLabel"></div>
            </td>
        </tr>

        <tr>
            <td class="col-md-1">
                <label class="control-label">Trajet :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <input type="hidden" id="LineColor" name="LineColor" value="0" />
                <div style="margin: 3px; float: left;" id="dropDownButton">
                    <div style="padding: 3px;">
                        <div id="colorPicker"></div>
                    </div>
                </div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Pictogramme :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="combo2init" id="VehicleIcon" name="VehicleIcon"></div>
            </td>
        </tr>
    </fieldset>
    </table>

    <table class="col-md-12" style="margin-bottom:20px;">
        <fieldset>
        <legend style="text-decoration:underline;">Echéances </legend>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Assurance :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="date2init" id="Insurance" name="Insurance"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Assurance de marchandise: </label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="date2init" id="MInsurance" name="MInsurance"></div>
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Visite Technique :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="date2init" id="TechnicalVisit" name="TechnicalVisit"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Tachygraphe :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="date2init" id="TaquigraphControl" name="TaquigraphControl"></div>
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Autorisation de conduire :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="date2init" id="DriveAuthorization" name="DriveAuthorization"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Fin de garantie :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="date2init" id="WarrantyEnd" name="WarrantyEnd"></div>
            </td>
        </tr>
        <tr>
            <td class="col-md-1">
                <label class="control-label">Extincteur :</label>
            </td>
            <td colspan="2"  class="col-md-4">
                <div class="date2init" id="extinguisher" name="Extinguisher"></div>
            </td>
            <td class="col-md-1">
                <label class="control-label">Mise en circulation :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <div class="date2init" id="ServiceStartDate" name="ServiceStartDate"></div>
            </td>
        </tr>
    </fieldset>
    </table >

    <table class="table-bordered col-md-12" style="margin-bottom:20px; ">
       <fieldset>
            <legend style="text-decoration:underline;">Commentaire  </legend>
            <textarea class="in2init" style="width:96%;height:50px;margin:auto;" id="VehicleComment" name="VehicleComment" ></textarea>
        </fieldset>
    </table>

  
    <div id="dialogCorpStructTree" name="dialogCorpStructTree">
        <div>
            <div id='CorpStructTree' style='margin: 2px;'></div>
            <div style='margin: 2px; padding: 2px; border: 1px #cccccc solid;'><input type="button" value="Ok" id='corpStructOkBtn' /></div>
        </div>
    </div> 
    
    <div id="dialogClassTree" name="dialogClassTree">
        <div>
            <div id='classTree' style='margin: 2px;'></div>
            <div style='margin: 2px; padding: 2px; border: 1px #cccccc solid;'><input type="button" value="Ok" id='classOkBtn' /></div>
        </div>
    </div> 
   
    <input id="vehicleNewBtn" class=" btn btn-danger formaddBtn" type="submit" value="Nouveau véhicule / engin" />
    
</form>
</div>
</div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('js/jqwidgets/jqxcore.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxinput.js') }}"></script>
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
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxpanel.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxtree.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxexpander.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxcombobox.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxnumberinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxcolorpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxdropdownbutton.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxdatetimeinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jqwidgets/jqxcalendar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app/vehiculeEdit.js')}}"></script>
    

     

	

@stop


