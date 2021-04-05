function showData(results) {
    console.log(results);
    $("#additionalData").load("app/plant/plant_depdec.html", function(){
        var currencies=results['currencies'];
        var cfdatadep=results['cfDataDep'];
        var cfdatadec=results['cfDataDec']
        var bothCurr=results['bothCurr'].split(',');
        for(var j=0; j<bothCurr.length; j++){
            var currencyName = $.grep(currencies, function(v) {
                return v.id === bothCurr[j];
            })[0]['value'];
            $("#decommisioning tbody").append("<tr><td><span lang='en'>Total amount "+currencyName+"</span><input id='"+bothCurr[j]+"_famount' name='"+bothCurr[j]+"_famount' type='text' class='form-control' size='4' autocomplete='off' /><span lang='en' class='small text-mutted pull-right'>Million</span></td></tr>")
        }
     setValues(cfdatadep);
     setValues(cfdatadec);
    })
}