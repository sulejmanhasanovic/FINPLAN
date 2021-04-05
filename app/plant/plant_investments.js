//get data
function getinvestments(results) {
    console.log(results);
    var id=results['id'];
    var data=results['data'];
    var cedata = results['ceData'];
    var cfdata = results['cfData'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var bothCurr=results['bothCurr'].split(',');
    var datar=[];
    
        for (var i=1; i<=cedata["CPeriod"]; i++){
            var data = new Array();
            data['id']=i;
            data['item']=i.toString()+":"+(startYear*1+i*1); 
            for(var j=0; j<bothCurr.length; j++){
                data[bothCurr[j]]=cfdata[bothCurr[j]+'_'+i];
            }
            datar.push(data); 
    }
return datar;
}

function showData(results) {
    var id=results['id'];
    var data=results['data'];
    var currencies=results['currencies'];
    var bothCurr=results['bothCurr'].split(',');
    var cols=[];
    for(var j=0; j<bothCurr.length; j++){
        var currencyName = $.grep(currencies, function(v) {
            return v.id === bothCurr[j];
        })[0]['value'];
        cols.push({name:bothCurr[j], map: bothCurr[j], text:currencyName, editable:true});
    }
    CreateGrid(cols, getinvestments(results))
}