var url="app/sales/sales_salepurchase.php";
function showData(results) {
    $("#additionalData").load("app/sales/sales_salepurchasedetail.html", function(){
    var id=results['id'];
    var data=results['data'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var currencies=results['currencies'];
    var producttypes=results["producttypes"];
    var curtypesell=results['bothCurrBase'].split(",");

    var product="";
    for (var i=0; i<producttypes.length; i++){
        product+="<option value="+producttypes[i]["id"]+">"+producttypes[i]["value"]+" ("+producttypes[i]["unit"]+")</option>"
    }
    $("#Name").html("");
    $("#Name").append(product);

    var curr="";
    for(var k=0; k<curtypesell.length; k++){
        var currencyName = $.grep(currencies, function(v) {
            return v.id === curtypesell[k];
        })[0]['value'];
            curr+="<option value="+curtypesell[k]+">"+currencyName+"</option>";
    }
    
    $("#TradeCurrency").html("");
    $("#TradeCurrency").append(curr);

    $("#id").val(id);

    var datar=[];
    for (var i=startYear; i<=endYear; i++){
        var amt="";
        var pri="";
        if(data!=undefined){
            amt=data['Amt_'+i];
            pri=data['Pri_'+i];
            setValues(data);
    }

     var datarow = new Array();
     datarow['id']=i;
     datarow['item']=i.toString(); 
     datarow['Amt']=amt;
     datarow['Pri']=pri;
     datar.push(datarow); 
}

    var cols=[];
    cols.push({name:'Amt', map: 'Amt', text:'Quantity', editable:true});
    cols.push({name:'Pri', map: 'Pri', text:'Yearly Price Change in Addition to Inflation (%)', editable:true});

    CreateGrid(cols, datar);

});
}

function saveDataSalePurchase() {
    var rows = $('#gsFlexGrid').jqxGrid('getrows');
    var cols = $('#gsFlexGrid').jqxGrid('columns');
    var object = {};
    var inputs = $("#additionalData").find("input, select");
   for(var a=0; a<inputs.length; a++){
    if(inputs[a]["type"]=="radio" && inputs[a]["checked"]==true)
    object[inputs[a]["name"]]=inputs[a]["value"];

    if(inputs[a]["type"]=="text" && inputs[a]["disabled"]==false)
    object[inputs[a]["id"]]=inputs[a]["value"];

    if(inputs[a]["type"]=="checkbox" && inputs[a]["checked"]==true)
    object[inputs[a]["id"]]=inputs[a]["value"];

    if(inputs[a]["type"]=="select-one")
    object[inputs[a]["id"]]=inputs[a]["value"];
       
    if(inputs[a]["type"]=="hidden")
    object[inputs[a]["id"]]=inputs[a]["value"];
   }
 
    cols=cols.records;
    for (var i = 1; i < cols.length; i++) {
        for (var j = 0; j < rows.length; j++) {

            if(rows[j][cols[i]['datafield']] && cols[i]["editable"]==true)
            object[cols[i]['datafield'] + '_' + rows[j]['item']] = rows[j][cols[i]['datafield']];
        }
    }
    
    datanotes=$('#dataNotes').val();

    $.ajax({
        url: url,
        data: {
            'data': object,
            'datanotes':datanotes,
            'id': id,
            'action': 'edit'
        },
        type: 'POST',
        success: function (result) {
            ShowSuccessMessage("Data saved successfully");
            getDataSalesPurchases();
        },
        error: function (xhr, status, error) {
            ShowErrorMessage(error);
        }
    });
}
