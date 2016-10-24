$(document).ready(function($) {
    		// 
    		var url = "/Equipement/vehiculesJson";
            // prepare the data
            var source = {
                datatype: "json",
                datafields: [
                    {name: 'ICode'},
                    {name: 'SupportMediumIdentification'},
                    {name: 'CorporateStructureLabel', map: 'corporate_structure>CorporateStructureLabel' },
                    {name: 'CorporateStructureLabelLocataire',map: 'sm_uses>0>sm_uses>CorporateStructureLabel'},
                    {name: 'Designation' , map: 'classes>SmClassLabel'},
                    {name: 'SMMarkLabel', map: 'mark>SMMarkLabel'},
                    {name: 'SMModelLabel', map: 'mark>s_m_models>0>SMModelLabel' },
                    {name: 'ServiceStartDate'},
                    {name: 'GpsOnBoard'},
                    {name: 'SmStatus'} 
                ],
                id: 'SupportMediumID',
                url: url
            };
            $("#table").jqxGrid({
                width: '99%',
                source: source,
                pageable: true,
                columns: [
                	{ text: 'Code', datafield: 'ICode' },
                	{ text: 'IMM', datafield: 'SupportMediumIdentification' },
                    { text: 'Propriétaire', datafield: 'CorporateStructureLabel' },
                    { text: 'Locataire', datafield: 'CorporateStructureLabelLocataire' },
                    { text: 'Designation', datafield: 'Designation' },
                    { text: 'Marque', datafield: 'SMMarkLabel' },
                    { text: 'Modèle', datafield: 'SMModelLabel' },
                    { text: 'Mise en circulation', datafield: 'ServiceStartDate' },
                    { text: 'GPS', datafield: 'GpsOnBoard' },
                	{ text: 'Status', datafield: 'SmStatus' }
                ]
            });


            $("#vehicleNewBtn").on('mousedown', function (e)
                {
                    $("#vehicledialog").jqxWindow('open');
                           
                        return false;
                });

        

            var wdwheight = 760;
                $("#vehicledialog").jqxWindow({
                    title: 'Fiche véhicule / Engin',
                    theme: "fresh",
                    resizable: false,
                    height:wdwheight, 
                    width: 800,
                    maxHeight: 900,
                    autoOpen: false,
                    isModal: true,
                    autoOpen: false,
                    modalOpacity: 0.4
                });
    	});



      