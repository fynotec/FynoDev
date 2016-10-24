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
    padding-top: .5em;
    padding-bottom: .5em;
}
</style>
     

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Engin / Véhicule</h3>
        </div>
        <div class="panel-body">
            <form id="vehicleform" method="POST" action="{{action('SmController@store')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="col-md-12" style="border-spacing: 10px 50px;margin-bottom:20px; ">
        <fieldset>
        <legend style="text-decoration:underline;">Informations Générales</legend>
          
        <tr>
            <td class="col-md-1">
                <label class="control-label">Entité :</label>
            </td>
            <td colspan="2" class="col-md-4">
                 <input class="in2init"type="hidden" id="SmCorpStruct" name="SmCorpStruct" value="0" />
                 <input class="in2init" type="text" id="SmCorpStructLabel" readonly="readonly"/>
            </td>
            <td class="col-md-1">
                <label class="control-label">Désignation :</label>
            </td>
            <td colspan="2" class="col-md-4">
                <input class="in2init" type="hidden" id="SmClass" name="SmClass" value="0" />
                <input class="in2init" type="text" id="SmClassLabel" readonly="readonly" />
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

     

	










    <script type="text/javascript">


   
    /* **************************************************************************** */
                /******************** Entité *************************/
    /* **************************************************************************** */

        $("#SmCorpStructLabel").jqxInput({width: '100%', height: 22 , theme: 'bootstrap'});
        
        $("#dialogCorpStructTree").jqxWindow({
                    width: 380, height: 436, resizable: false,  isModal: true, autoOpen: false, modalOpacity: 0.4,
                    title: "Veuillez choisir un departement"
                });

        $('#SmCorpStructLabel').dblclick('rowselect', function (e) {
                    $("#dialogCorpStructTree").jqxWindow({ position:'center' });
                    $("#dialogCorpStructTree").jqxWindow('open');
        }); 
        

        var url = '/Equipement/Vehicules/getAllCorporateStructure';
        var corpstructsource =
        {
            datatype: "json",
            datafields: [
                { name: 'id' },
                { name: 'label' },
                { name: 'parentid' }
            ],
            id: 'id',
            url: url,
            async: true
        };              
        var corpstructdataAdapter = new $.jqx.dataAdapter(corpstructsource, {
            loadComplete: function () {
                var records = corpstructdataAdapter.getRecordsHierarchy('id', 'parentid');
                $('#CorpStructTree').jqxTree({ source: records, width: '364px', height: '350'});
            }
        });
        
        corpstructdataAdapter.dataBind();
                
        $("#corpStructOkBtn").jqxButton({ width:'auto', height:'32', theme:'orange'});
        $('#corpStructOkBtn').on('click', function () { 
            var item = $('#CorpStructTree').jqxTree('getSelectedItem');
            $("#SmCorpStructLabel").val(item.label);
            $("#SmCorpStruct").val(item.id);
            $("#dialogCorpStructTree").jqxWindow('close');              
        }); 


        /* **************************************************************************** */
                /******************** designation *************************/
        /* **************************************************************************** */

        $("#SmClassLabel").jqxInput({width: '100%', height: 22});
                $("#SmClass").jqxInput();
                $("#dialogClassTree").jqxWindow({
                    width: 380, height: 436, resizable: false,  isModal: true, autoOpen: false, modalOpacity: 0.4,
                    title: "Veuillez choisir une désignation" 
                });

                $('#SmClassLabel').dblclick('rowselect', function (e) {
                $("#dialogClassTree").jqxWindow( {position:'center'} );
                    $("#dialogClassTree").jqxWindow('open');
                }); 

                var url = '/Equipement/Vehicules/getAllClasses';
                var classsource =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'id' },
                        { name: 'label' },
                        { name: 'parentid' }
                    ],
                    id: 'id',
                    url: url,
                    async: true
                };              
                var classdataAdapter = new $.jqx.dataAdapter(classsource, {
                loadComplete: function () {
                    var records = classdataAdapter.getRecordsHierarchy('id', 'parentid');
                    $('#classTree').jqxTree({ source: records, width: '364px', height: '350'});
                }
                    
                });

                classdataAdapter.dataBind();

                $("#classOkBtn").jqxButton({ width:'auto', height:'32', theme:'orange'});
                $('#classOkBtn').on('click', function () { 
                    var item = $('#classTree').jqxTree('getSelectedItem');
                    $("#SmClassLabel").val(item.label);
                    $("#SmClass").val(item.id);
                    $("#dialogClassTree").jqxWindow('close');      

                });

        /* **************************************************************************** */
                /******************** Marque / Model  *************************/
        /* **************************************************************************** */
            var url = '/Equipement/Vehicules/getAllMarks';
                var marksource =
                    {
                    datatype: "json",
                    datafields: [
                        { name: 'SMMarkID' },
                        { name: 'SMMarkLabel' }
                    ],
                    url: url,
                    async: true
                    };              
                var markAdapter = new $.jqx.dataAdapter(marksource);
                $("#SmMark").jqxComboBox({ source: markAdapter, autoDropDownHeight: true ,  promptText: "Selectionnez une marque...", displayMember: "SMMarkLabel", valueMember: "SMMarkID", width: '100%', height: '22px'});


                $("#SmModel").jqxComboBox({  autoDropDownHeight: true ,  promptText: "Selectionnez un modèle...", displayMember: "SMModelLabel", valueMember: "SMModelID", width: '100%', height: '22px'});

                $("#SmMark").on('select', function(e){
                    console.log(e.args.item.originalItem);
                    var url = '/Equipement/Vehicules/getModels/'+ e.args.item.originalItem.SMMarkID ;
                   
                    var modelsource =
                        {
                        datatype: "json",
                        datafields: [
                            { name: 'SMModelID' },
                            { name: 'SMModelLabel' }
                        ],
                        url: url,
                        async: true
                        };              
                    var modelAdapter = new $.jqx.dataAdapter(modelsource);
                    $("#SmModel").jqxComboBox({ source: modelAdapter});
                });


        /* **************************************************************************** */
                /******************** IMM /  CODE  / Compteur *************************/
        /* **************************************************************************** */


        $("#SupportMediumIdentification").jqxInput({width: '100%', height: 22 });                               
        $("#ICode").jqxInput({width: '48%', height: 22 });

        $("#CounterType").jqxComboBox({ source: new Array({id: 'Km', value: 'Km'},{id: 'H', value: 'H'}), autoDropDownHeight: true, width: '30%', height: '22px'});
                

         /* **************************************************************************** */
                /******************** Conducteur *************************/
        /* **************************************************************************** */

        var url = '/Equipement/Vehicules/getAllPersons';
                var conducteursource =
                    {
                    datatype: "json",
                    datafields: [
                        { name: 'PersonID' },
                        { name: 'PersonName' }
                    ],
                    url: url,
                    async: true
                    };     
        var ConducteurAdapter = new $.jqx.dataAdapter(conducteursource);       
        $("#DriverID").jqxComboBox({
            source: ConducteurAdapter,height: '25px',promptText: "Conducteur par défaut...", selectedIndex: -1,displayMember: "PersonName", valueMember: "PersonID", width: '100%' ,searchMode: 'containsignorecase'});


         /* **************************************************************************** */
                /******************** Carburant *************************/
        /* **************************************************************************** */


        $("#FuelType").jqxComboBox({ source: new Array({label: 'Gasoil', value: 0},{label: 'Essence', value: '1'}), autoDropDownHeight: true, width: '100%',  selectedIndex: -1});

        $("#RefuelQuantiyAlert").jqxNumberInput({ width: '90px', height: '22px', inputMode: 'simple', digits: 3, decimalDigits: 0, spinButtons: false });            


         /* **************************************************************************** */
                /******************** designation *************************/
        /* **************************************************************************** */

        var url = '/Equipement/Vehicules/getAllAreaPark';
                var AreaParksource =
                    {
                    datatype: "json",
                    datafields: [
                        { name: 'DeliveryAreaID' },
                        { name: 'DeliveryAreaName' }
                    ],
                    url: url,
                    async: true
                    };     
        var AreaParkAdapter = new $.jqx.dataAdapter(AreaParksource);       
        $("#ParkingAreaLabel").jqxComboBox({
            source: AreaParkAdapter,height: '25px', selectedIndex: -1,displayMember: "DeliveryAreaName", valueMember: "DeliveryAreaID", width: '100%' ,searchMode: 'containsignorecase'});
        

        $("#WorkingAreaLabel").jqxComboBox({
            source: AreaParkAdapter,
            height: '25px',
            selectedIndex: -1,
            displayMember: "DeliveryAreaName",
            valueMember: "DeliveryAreaID",
            width: '100%' ,
            searchMode: 'containsignorecase'
        });
        



        function getTextElementByColor(color) {
        if (color == 'transparent' || color.hex == "") {
            return $("<div style='text-shadow: none; position: relative; padding-bottom: 15px; margin-top: 2px;'>transparent</div>");
        }
        //var element = $("<div style='text-shadow: none; position: relative; padding-bottom: 2px; margin-top: 2px;'>#" + color.hex + "</div>");
        var element = $("<div style='text-shadow: none; position: relative; padding-bottom: 15px; margin-top: 2px;'>&nbsp;</div>");
        var nThreshold = 105;
        var bgDelta = (color.r * 0.299) + (color.g * 0.587) + (color.b * 0.114);
        var foreColor = (255 - bgDelta < nThreshold) ? 'Black' : 'White';
        element.css('color', foreColor);
        element.css('background', "#" + color.hex);
        element.addClass('jqx-rc-all');
        return element;
    };

    $("#LineColor").jqxInput({value: "ffaabb"});

   

    $("#colorPicker").on('colorchange', function (event) {
        $("#dropDownButton").jqxDropDownButton('setContent', getTextElementByColor(event.args.color));
        $("#LineColor").val(e.args.color.hex);    
    });
      $("#colorPicker").jqxColorPicker({ color: "ffaabb", colorMode: 'hue', width: 220, height: 220});
   $("#dropDownButton").jqxDropDownButton({ width: 150, height: 35});
    $("#dropDownButton").jqxDropDownButton('setContent', getTextElementByColor(new $.jqx.color({ hex: "ffaabb" })));



    

                $("#Insurance").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy"});
                $("#MInsurance").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy"});
                $("#TechnicalVisit").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#TaquigraphControl").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#DriveAuthorization").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#TaquigraphControl").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#DriveAuthorization").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#WarrantyEnd").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#extinguisher").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });
                $("#ServiceStartDate").jqxDateTimeInput({ width: '100%', height: '25px', formatString: "dd/MM/yyyy" });







    /*$('#vehicleNewBtn').click(function(){
        console.log($("#vehicleform").serialize());

        return false;
    })*/


    </script>
	

@stop


