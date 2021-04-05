//get data
function getequity(results) {
    console.log(results);
    var ctdata = results['ctData'];
    var baseCurrency=results['baseCurrency'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var datar=[];
    for (var i=startYear; i<=endYear; i++){
            var data = new Array();
            data['id']=i;
            data['item']=i.toString(); 
            data['E_'+baseCurrency]=ctdata['E_'+baseCurrency+'_'+i];
            data['ER_'+baseCurrency]=ctdata['ER_'+baseCurrency+'_'+i];
            datar.push(data); 
        }
    return datar;
}

function showData(results) {
    $("#additionalData").load("app/data/additional.html", function(){
        var ctdata = results['ctData'];
        var aadata = results['aaData'];
        var currencies=results['currencies'];
        var baseCurrency=results['baseCurrency'];
        var currencyName = $.grep(currencies, function(v) {
            return v.id === baseCurrency;
        })[0]['value'];
        var tblcontrols="<tr>";
        tblcontrols+="<td class='box-shadow card backwhite'><b>"+currencyName+" (Million)</b><br/> \
        <span>Maximum dividend (%)</span> \
        <input id='DR_"+baseCurrency+"' type='text' class='form-control' size='50' autocomplete='off' value='"+ctdata['DR_'+baseCurrency]+"'/> \
        <br/>\
        <span>Initial equity</span> \
        <input id='IE_"+baseCurrency+"' type='text' class='form-control' size='50' autocomplete='off' value='"+aadata['Equity']+"' readonly/> \
        </td> \
        </tr> \
        </table>";
    var cols=[];
    cols.push({name:'E_'+baseCurrency, editable:true, map: 'E_'+baseCurrency, text:'Equity'});
    cols.push({name:'ER_'+baseCurrency, editable:true, map: 'ER_'+baseCurrency, text:'Equity returned'});

    CreateGrid(cols, getequity(results));
    $("#controls").append(tblcontrols);
    })
}