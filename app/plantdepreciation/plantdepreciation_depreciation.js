//get data
function getinflation(results) {
    console.log(results);
    var cedata = results['ceData'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var baseCurrency=results['baseCurrency'];
    var curTypeSel=results['curTypeSel'].split(',');
    var datar=[];
for (var i=startYear; i<=endYear; i++){
        
            var data = new Array();
            data['id']=i;
            data['item']=i.toString(); 
            data['baseCurrency']=cedata[baseCurrency+'_'+i];
            for(var j=0; j<curTypeSel.length; j++){
                data['curTypeSel'+j]=cedata[curTypeSel[j]+'_'+i];
            }
            datar.push(data); 
    }
return datar;
}

function showgrid(results) {
    var baseCurrency=results['baseCurrency'];
    var curTypeSel=results['curTypeSel'].split(',')
	// var cv = new wijmo.collections.CollectionView(getinflation(results));
	// var grid = new wijmo.grid.FlexGrid('#gsFlexGrid');
    // CreateGrid(baseCurrency, curTypeSel, cv, grid);
   // CreateGrid(baseCurrency, curTypeSel, getinflation(results))
}