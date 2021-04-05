//get data
function getproduction(results) {
    console.log(results);
    var id=results['id'];
    var data=results['data'];
    var cedata = results['ceData'];
    var cfdata = results['cfData'];
   // var producttypes=results['producttypes'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var curTypeSel=data[id]['CurTypeSel'].split(',');
    var datar=[];
    
    for(var j=0; j<curTypeSel.length; j++){
        for (var i=cedata['FOyear']; i<=endYear; i++){
            var data = new Array();
            data['id']=i;
            data['item']=i.toString(); 
             data[curTypeSel[j]]=cfdata[curTypeSel[j]+'_'+i];
            datar.push(data); 
        }
    }
    return datar;
}

function showData(results) {
    var id=results['id'];
    var data=results['data'];
    var producttypes=results['producttypes'];
    console.log(producttypes);
    var curTypeSel=data[id]['CurTypeSel'].split(',');
    var cols=[];
    for(var j=0; j<curTypeSel.length; j++){
        var prodrow = $.grep(producttypes, function(v) {
            return v.id === curTypeSel[j];
        });
var prodName=prodrow[0]['value']+ " ("+ prodrow[0]['unit'] +")"

     cols.push({name:curTypeSel[j], map: curTypeSel[j], text:prodName, editable:true});
    }
    CreateGrid(cols, getproduction(results))
}