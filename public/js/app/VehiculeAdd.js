$(document).ready(function($){
      /* **************************************************************************** */
                /******************** Script Ajout Vehicule *************************/
        /* **************************************************************************** */


        //$("#SmCorpStructLabel").jqxInput({width: '100%', height: 22 , theme: 'bootstrap'});

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

        //$("#SmClassLabel").jqxInput({width: '100%', height: 22});
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
})