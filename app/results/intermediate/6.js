//get data
function getnewloans(results) {
    var startYear = results['startYear'];
    var endYear = results['endYear'];
    var ctdata = results['results'];
    var ctdatacal = results['resultscal'];
    var baseCurrency = results['baseCurrency'];
    var bothCurr = results['bothCurr'].split(',');
    var currencies = results['currencies'];
    var tableid = results['tableid'];
    var baseCurrencyName = $.grep(currencies, function (v) {
        return v.id === baseCurrency;
    })[0]['value'];
    var datar = [];
    switch (tableid) {
        case "6.1.":
            for (var i = startYear; i <= endYear; i++) {
                var data = new Array();
                data['id'] = i;
                data['item'] = i.toString();
                for (var j = 0; j < bothCurr.length; j++) {
                    data['A_'+bothCurr[j]] = ctdata['A_'+bothCurr[j]+'_'+i];
                    data['B_'+bothCurr[j]] = ctdatacal['B_'+bothCurr[j] + '_' + i];
                    data['I_'+bothCurr[j]] = ctdatacal['I_'+bothCurr[j] + '_' + i];
                    data['R_'+bothCurr[j]] = ctdatacal['R_'+bothCurr[j] + '_' + i];
                }

                data['TD'] = ctdatacal['TD_'+i];
                data['TB'] = ctdatacal['TB_'+i];
                data['TI'] = ctdatacal['TI_'+i];
                data['TR'] = ctdatacal['TR_'+i];

                datar.push(data);
            }
        break;
        
        case "6.3.":
        for (var i = startYear; i <= endYear; i++) {
            var data = new Array();
            data['id'] = i;
            data['item'] = i.toString();
            for (var j = 0; j < bothCurr.length; j++) {
                data['L_'+bothCurr[j]] = ctdata['L_'+bothCurr[j]+'_'+i];
                data['B_'+bothCurr[j]] = ctdata['B_'+bothCurr[j] + '_' + i];
                data['I_'+bothCurr[j]] = ctdata['I_'+bothCurr[j] + '_' + i];
                data['R_'+bothCurr[j]] = ctdata['R_'+bothCurr[j] + '_' + i];
            }
            datar.push(data);
        }
        break;

        case "6.4.":
        for (var i = startYear; i <= endYear; i++) {
            var data = new Array();
            data['id'] = i;
            data['item'] = i.toString();
            data['LLC'] = ctdata['LLC_' + i];
            data['BLC'] = ctdata['BLC_' + i];
            data['ILC'] = ctdata['ILC_' + i];
            data['RLC'] = ctdata['RLC_' + i];
            datar.push(data);
        }
        break;
    }
    return datar;
}

function showData(results) {
    var baseCurrency = results['baseCurrency'];
    var bothCurr = results['bothCurr'].split(',');
    var currencies = results['currencies'];
    var tableid = results['tableid'];
    var baseCurrencyName = $.grep(currencies, function (v) {
        return v.id === baseCurrency;
    })[0]['value'];
    var cols = [];
    var columngroups = [];
    switch (tableid) {
        case "6.1.":
            for (var j = 0; j < bothCurr.length; j++) {
                var currencyName = $.grep(currencies, function (v) {
                    return v.id === bothCurr[j];
                })[0]['value'];
    
                columngroups.push({
                    text: currencyName + ' (Million)',
                    align: 'center',
                    name: currencyName
                });
                cols.push({
                    name: 'A_' + bothCurr[j],
                    columngroup: currencyName,
                    map: 'A_' + bothCurr[j],
                    text: 'Drawdown'
                });
                cols.push({
                    name: 'B_'+bothCurr[j],
                    columngroup: currencyName,
                    map: 'B_'+bothCurr[j],
                    text: 'Balance'
                });
                cols.push({
                    name: 'I_'+bothCurr[j],
                    columngroup: currencyName,
                    map: 'I_'+bothCurr[j],
                    text: 'Interest'
                });
                cols.push({
                    name: 'R_'+bothCurr[j],
                    columngroup: currencyName,
                    map: 'R_'+bothCurr[j],
                    text: 'Repayment'
                });
            }

            columngroups.push({
                text: 'Total in '+baseCurrencyName + ' (Million)',
                align: 'center',
                name: 'total'
            });
            cols.push({
                name: 'TD',
                columngroup: 'total',
                map: 'TD',
                text: 'Drawdown'
            });
            cols.push({
                name: 'TB',
                columngroup: 'total',
                map: 'TB',
                text: 'Balance'
            });
            cols.push({
                name: 'TI',
                columngroup: 'total',
                map: 'TI',
                text: 'Interest'
            });
            cols.push({
                name: 'TR',
                columngroup: 'total',
                map: 'TR',
                text: 'Repayment'
            });
        break;
        case "6.2.":
            cols.push({
                name: 'SLL',
                map: 'SLL',
                text: 'Drawdowns'
            });
            cols.push({
                name: 'SLOLC',
                map: 'SLOLC',
                text: 'Balance'
            });
            cols.push({
                name: 'SLLI',
                map: 'SLLI',
                text: 'Interest'
            });
        break;
        case "6.3.":
            for (var j = 0; j < bothCurr.length; j++) {
                var currencyName = $.grep(currencies, function (v) {
                    return v.id === bothCurr[j];
                })[0]['value'];
    
                columngroups.push({
                    text: currencyName + ' (Million)',
                    align: 'center',
                    name: currencyName
                });
                cols.push({
                    name: 'L_' + bothCurr[j],
                    columngroup: currencyName,
                    map: 'L_' + bothCurr[j],
                    text: 'Drawdown'
                });
                cols.push({
                    name: 'B_'+bothCurr[j],
                    columngroup: currencyName,
                    map: 'B_'+bothCurr[j],
                    text: 'Balance'
                });
                cols.push({
                    name: 'I_'+bothCurr[j],
                    columngroup: currencyName,
                    map: 'I_'+bothCurr[j],
                    text: 'Interest'
                });
                cols.push({
                    name: 'R_'+bothCurr[j],
                    columngroup: currencyName,
                    map: 'R_'+bothCurr[j],
                    text: 'Repayment'
                });
            }
        break;
        case "6.4.":

            cols.push({
                name: 'LLC',
                map: 'LLC',
                text: 'Drawdown'
            });
            cols.push({
                name: 'BLC',
                map: 'BLC',
                text: 'Balance'
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
        CreateGrid(cols, getnewloans(results));
    }else{
         CreateGrid(cols, getnewloans(results), columngroups);
    }
   
}