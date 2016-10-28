$(document).ready(function($) {
    		// 
    		var url = "/Equipement/vehiculesJson";
            // prepare the data
            var source = {
                datatype: "json",
                datafields: [
                    {name: 'ShortCode'},
                    {name: 'SMIdentification'},
                    {name: 'CorporateStructureLabel', map: 'corporate_structure>CorpStructLabel' },
                    {name: 'CorporateStructureLabelLocataire',map: 'sm_uses>0>locataire>CorpStructLabel'},
                    {name: 'Designation' , map: 'smclasse>SMClassLabel'},
                    {name: 'SMMarkLabel', map: 'smmark>SMMarkLabel'},
                    {name: 'SMModelLabel', map: 'smmark>s_m_models>0>SMModelLabel' },
                    {name: 'ServiceStartDate'},
                    {name: 'GpsOnBoard'},
                    {name: 'SMStatus'} 
                ],
                id: 'SupportMediumID',
                url: url
            };
            $("#table").jqxGrid({
                width: '99%',
                source: source,
                pageable: true,
                columns: [
                	{ text: 'Code', datafield: 'ShortCode' },
                	{ text: 'IMM', datafield: 'SMIdentification' },
                    { text: 'Propriétaire', datafield: 'CorporateStructureLabel' },
                    { text: 'Locataire', datafield: 'CorporateStructureLabelLocataire' },
                    { text: 'Designation', datafield: 'Designation' },
                    { text: 'Marque', datafield: 'SMMarkLabel' },
                    { text: 'Modèle', datafield: 'SMModelLabel' },
                    { text: 'Mise en circulation', datafield: 'ServiceStartDate' },
                    { text: 'GPS', datafield: 'GpsOnBoard' },
                	{ text: 'Status', datafield: 'SMStatus' }
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



      