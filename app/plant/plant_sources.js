//get data
function getsources(results) {
    console.log(results);
    var id=results['id'];
    var data=results['data'];
    var cedata = results['ceData'];
    var cfdata = results['cfData'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var bothCurr=results['bothCurr'].split(',');
    var financesources=results['financesources'];
    var datar=[];
    
        for (var i=1; i<=cedata["CPeriod"]; i++){
            var data = new Array();
            data['id']=i;
            data['item']=i.toString()+":"+(startYear*1+i*1); 
            for(var j=0; j<financesources.length; j++){
                data[financesources[j]['id']]=cfdata[financesources[j]['id']+'_'+i];
            }
            datar.push(data); 
    }
return datar;
}

function showData(results) {
    $("#additionalData").load("app/data/additional.html", function(){
    var id=results['id'];
    var data=results['data'];
    var currencies=results['currencies'];
    var financesources=results['financesources'];
    var bothCurr=results['bothCurr'].split(',');
    var baseCurrency=results['baseCurrency'];

    
    var curr="";
    for(var k=0; k<bothCurr.length; k++){
        var selectedcurr="";
        var currencyName = $.grep(currencies, function(v) {
            return v.id === bothCurr[k];
        })[0]['value'];
        if(bothCurr[k]==Cookies("curr"))
            selectedcurr="selected";

        curr+="<option value="+bothCurr[k]+" "+selectedcurr+">"+currencyName+"</option>";
    }


  
        
    var tblcontrols="<tr><td class='box-shadow card backwhite'><select id='curr' class='form-control' onchange='getDataPlant(\"plant_sources\",this.value)'>"+curr+"</select></td>";

    var cols=[];
  //  tblcontrols+="<tr>";
    for(var j=0; j<financesources.length; j++){
        var fnName = $.grep(financesources, function(v) {
            return v.id === financesources[j]['id'];
        })[0]['value'];
       
        if(baseCurrency!==Cookies("curr")){
            cols.push({name:financesources[j]['id'], map: financesources[j]['id'], text:fnName, editable:true});
            tblcontrols+="<td class='box-shadow card backwhite'> \
            <div class='pure-checkbox'> \
            <input type='checkbox' class='basic' id='"+financesources[j]['id']+"' value='YES'/> \
            <label for="+financesources[j]['id']+"> "+financesources[j]['value']+"  </label> \
        </div> \
            </td>";
        }
       

        if(baseCurrency==Cookies("curr") && financesources[j]['type']=='C'){
            cols.push({name:financesources[j]['id'], map: financesources[j]['id'], text:fnName, editable:true});
            tblcontrols+="<td class='box-shadow card backwhite'> \
            <div class='pure-checkbox'> \
            <input type='checkbox' class='basic' id='"+financesources[j]['id']+"' value='YES'/> \
            <label for="+financesources[j]['id']+"> "+financesources[j]['value']+"  </label> \
        </div> \
            </td>";
        }
        
       
    }
    tblcontrols+="</tr>";
console.log(tblcontrols);
    $("#controls tbody").append(tblcontrols);
    CreateGrid(cols, getsources(results));


});

}