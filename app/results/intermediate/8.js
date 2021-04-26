//get data
function getexportcredits(results) {
    var startYear = results['startYear'];
    var endYear = results['endYear'];
    var ctdata = results['results'];
    var financesources=results['financesources'];
    var bothCurr = results['bothCurr'].split(',');
    var tableid = results['tableid'];
    var datar = [];
    switch (tableid) {       
        case "8.2.":

        for (var i = startYear; i <= endYear; i++) {
            var data = new Array();
            data['id'] = i;
            data['item'] = i.toString();
            for(var k=0; k<financesources.length; k++){
                if(financesources[k]['type']=='E'){
                    var fid=financesources[k]['id'];
                    for (var j = 0; j < bothCurr.length; j++) {
                        data['DD_'+bothCurr[j]+'_'+fid] = ctdata['DD_'+bothCurr[j]+'_'+fid+'_'+i];
                        data['Bal_'+bothCurr[j]+'_'+fid] = ctdata['Bal_'+bothCurr[j]+'_'+fid + '_' + i];
                        data['Int_'+bothCurr[j]+'_'+fid] = ctdata['Int_'+bothCurr[j]+'_'+fid + '_' + i];
                        data['Repy_'+bothCurr[j]+'_'+fid] = ctdata['Repy_'+bothCurr[j]+'_'+fid+ '_' + i];
                    }
                    datar.push(data);
                }
            }
            
        }
        break;

        case "8.3.":
        for (var i = startYear; i <= endYear; i++) {
            var data = new Array();
            data['id'] = i;
            data['item'] = i.toString();
            data['BLC'] = ctdata['BLC_' + i];
            data['OLC'] = ctdata['OLC_' + i];
            data['ILC'] = ctdata['ILC_' + i];
            data['RLC'] = ctdata['RLC_' + i];
            datar.push(data);
        }
        break;
    }
    console.log(datar);
    return datar;
}

function showData(results) {
    var bothCurr = results['bothCurr'].split(',');
    var currencies = results['currencies'];
    var financesources=results['financesources'];
    var tableid = results['tableid'];
    var cols = [];
    var columngroups = [];
    switch (tableid) {

        case "8.2.":
            for(var k=0; k<financesources.length; k++){
                if(financesources[k]['type']=='E'){
                    var fid=financesources[k]['id'];
                    for (var j = 0; j < bothCurr.length; j++) {
                        var currencyName = $.grep(currencies, function (v) {
                            return v.id === bothCurr[j];
                        })[0]['value'];
                    
                        columngroups.push({
                            text: financesources[k]['value']+' - '+currencyName + ' (Million)',
                            align: 'center',
                            name: fid+currencyName
                        });
                        cols.push({
                            name: 'DD_' + bothCurr[j]+'_'+fid,
                            columngroup: fid+currencyName,
                            map: 'DD_' + bothCurr[j]+'_'+fid,
                            text: 'Drawdowns'
                        });
                        cols.push({
                            name: 'Bal_'+bothCurr[j]+'_'+fid,
                            columngroup: fid+currencyName,
                            map: 'Bal_'+bothCurr[j]+'_'+fid,
                            text: 'Balance'
                        });
                        cols.push({
                            name: 'Int_'+bothCurr[j]+'_'+fid,
                            columngroup: fid+currencyName,
                            map: 'Int_'+bothCurr[j]+'_'+fid,
                            text: 'Interest'
                        });
                        cols.push({
                            name: 'Repy_'+bothCurr[j]+'_'+fid,
                            columngroup: fid+currencyName,
                            map: 'Repy_'+bothCurr[j]+'_'+fid,
                            text: 'Repayment'
                        });
                    }
        }
    }
        break;
        case "7.2.":

            cols.push({
                name: 'BLC',
                map: 'BLC',
                text: 'Issue'
            });
            cols.push({
                name: 'OLC',
                map: 'OLC',
                text: 'Outstanding'
            });
            cols.push({
                name: 'ILC',
                map: 'ILC',
                text: 'Interest'
            });
            cols.push({
                name: 'RLC',
                map: 'RLC',
                text: 'Repayment'
            });
        break;
    }
    if(columngroups.length==0){
        CreateGrid(cols, getexportcredits(results));
    }else{
        CreateGrid(cols, getexportcredits(results), columngroups);
    }
   
}