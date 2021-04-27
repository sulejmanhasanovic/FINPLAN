//get data
function getforeigncurr(results) {
    var startYear = results['startYear'];
    var endYear = results['endYear'];
    var cadata=results['caData'];
    var cbdata=results['cbData'];
    var ccdata=results['ccData'];
    var cddata=results['cdData'];
    var chdata=results['chData'];
    var cidata=results['ciData'];
    var cldata=results['clData'];
    var ctdata=results['ctData'];
    var curTypeSel = results['curTypeSel'].split(',');
    var tableid = results['tableid'];
    var datar = [];
    switch (tableid) {       
        case "10.1.":
            for (var i = startYear; i <= endYear; i++) {
                var data = new Array();
                data['id'] = i;
                data['item'] = i.toString();
                for (var j = 0; j < curTypeSel.length; j++) {
                    data['LB_'+curTypeSel[j]] = cldata['LB_'+curTypeSel[j] + '_' + i];
                    data['LBR_'+curTypeSel[j]] = cldata['LBR_'+curTypeSel[j] + '_' + i];
                    data['LBI_'+curTypeSel[j]] = cldata['LBI_'+curTypeSel[j] + '_' + i];
                    data['OC_'+curTypeSel[j]] = cldata['OC_'+curTypeSel[j] + '_' + i];
                    data['CB_'+curTypeSel[j]] = cldata['CB_'+curTypeSel[j] + '_' + i];
                    data['FI_'+curTypeSel[j]] = cldata['FI_'+curTypeSel[j] + '_' + i];
                }
                data['Loc']=ctdata['Loc_'+i];
                datar.push(data);
            }
        break;

        case "10.2.":
            for (var i = startYear; i <= endYear; i++) {
                var data = new Array();
                data['id'] = i;
                data['item'] = i.toString();
                for (var j = 0; j < curTypeSel.length; j++) {
                    data['B1_'+curTypeSel[j]] = chdata['B_'+curTypeSel[j] + '_' + i];
                    data['B2_'+curTypeSel[j]] = cidata['B_'+curTypeSel[j] + '_' + i];
                    data['L'+curTypeSel[j]] = cadata['L_'+curTypeSel[j] + '_' + i];
                    data['B3_'+curTypeSel[j]] = cbdata['B_'+curTypeSel[j] + '_' + i];
                    data['O1_'+curTypeSel[j]] = ccdata['O_'+curTypeSel[j] + '_' + i];
                    data['E_'+curTypeSel[j]] = cddata['E_'+curTypeSel[j] + '_' + i];
                    data['O2_'+curTypeSel[j]] = cldata['O_'+curTypeSel[j] + '_' + i];
                }
                datar.push(data);
            }
        break;
    }
    console.log(datar);
    return datar;
}

function showData(results) {
    var curTypeSel = results['curTypeSel'].split(',');
    var currencies = results['currencies'];
    var tableid = results['tableid'];
    var cols = [];
    var columngroups = [];
    switch (tableid) {
        case "10.1.":
            for (var j = 0; j < curTypeSel.length; j++) {
                var currencyName = $.grep(currencies, function (v) {
                    return v.id === curTypeSel[j];
                })[0]['value'];
                columngroups.push({
                    text: currencyName+' (Million)',
                    align: 'center',
                    name: currencyName
                });
                cols.push({
                    name: 'FI_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'FI_'+curTypeSel[j],
                    text: 'Investments'
                });
                cols.push({
                    name: 'LB_' + curTypeSel[j],
                    columngroup: currencyName,
                    map: 'LB_' + curTypeSel[j],
                    text: 'Loan and bonds'
                });
                cols.push({
                    name: 'LBR_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'LBR_'+curTypeSel[j],
                    text: 'Loan and bonds repayments'
                });
                cols.push({
                    name: 'LBI_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'LBI_'+curTypeSel[j],
                    text: 'Interest charges'
                });
                cols.push({
                    name: 'OC_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'OC_'+curTypeSel[j],
                    text: 'Operating costs'
                });
                cols.push({
                    name: 'CB_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'CB_'+curTypeSel[j],
                    text: 'Cash balance'
                });
                cols.push({
                    name: 'Loc',
                    map: 'Loc',
                    text: 'Local cash'
                });
            }
        break;

        case "10.2.":
            for (var j = 0; j < curTypeSel.length; j++) {
                var currencyName = $.grep(currencies, function (v) {
                    return v.id === curTypeSel[j];
                })[0]['value'];
                columngroups.push({
                    text: currencyName+' (Million)',
                    align: 'center',
                    name: currencyName
                });
                cols.push({
                    name: 'B1_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'B1_'+curTypeSel[j],
                    text: 'Export credit'
                });
                cols.push({
                    name: 'B2_' + curTypeSel[j],
                    columngroup: currencyName,
                    map: 'B2_' + curTypeSel[j],
                    text: 'New loans'
                });
                cols.push({
                    name: 'L_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'L_'+curTypeSel[j],
                    text: 'Old loans'
                });
                cols.push({
                    name: 'B3_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'B3_'+curTypeSel[j],
                    text: 'Old bonds'
                });
                cols.push({
                    name: 'O1_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'O1_'+curTypeSel[j],
                    text: 'New bonds'
                });
                cols.push({
                    name: 'E_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'E_'+curTypeSel[j],
                    text: 'Equity'
                });
                cols.push({
                    name: 'O2_'+curTypeSel[j],
                    columngroup: currencyName,
                    map: 'O2_'+curTypeSel[j],
                    text: 'Total'
                });
            }
        break;
    }
    CreateGrid(cols, getforeigncurr(results), columngroups);
}