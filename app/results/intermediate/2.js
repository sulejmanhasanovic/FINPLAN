//get data
function getoldloans(results) {
    var ctdata = results['results'];
    var startYear = results['startYear'];
    var endYear = results['endYear'];
    var bothCurr = results['bothCurr'].split(',');
    var tableid = results['tableid'];
    var datar = [];
    if (tableid == '2.1.') {
        for (var i = startYear; i <= endYear; i++) {

            var data = new Array();
            data['id'] = i;
            data['item'] = i.toString();
            for (var j = 0; j < bothCurr.length; j++) {
                data['LN_' + bothCurr[j]] = ctdata['LN_' + bothCurr[j] + '_' + i];
                data['L_' + bothCurr[j]] = ctdata['L_' + bothCurr[j] + '_' + i];
                data['I_' + bothCurr[j]] = ctdata['I_' + bothCurr[j] + '_' + i];
                data['R_' + bothCurr[j]] = ctdata['R_' + bothCurr[j] + '_' + i];
            }
            datar.push(data);
        }
    } else {
        for (var i = startYear; i <= endYear; i++) {

            var data = new Array();
            data['id'] = i;
            data['item'] = i.toString();
            data['LNL'] = ctdata['LNL_' + i];
            data['LL'] = ctdata['LL_' + i];
            data['IL'] = ctdata['IL_' + i];
            data['RL'] = ctdata['RL_' + i];
            datar.push(data);
        }
    }
    return datar;
}

function showData(results) {
    var bothCurr = results['bothCurr'].split(',');
    var currencies = results['currencies'];
    var tableid = results['tableid'];
    var cols = [];
    var columngroups = [];
    if (tableid == '2.1.') {
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
                name: 'LN_' + bothCurr[j],
                columngroup: currencyName,
                map: 'LN_' + bothCurr[j],
                text: 'Committed Drawdown'
            });
            cols.push({
                name: 'L_' + bothCurr[j],
                columngroup: currencyName,
                map: 'L_' + bothCurr[j],
                text: 'Outstanding'
            });
            cols.push({
                name: 'I_' + bothCurr[j],
                columngroup: currencyName,
                map: 'I_' + bothCurr[j],
                text: 'Interest'
            });
            cols.push({
                name: 'R_' + bothCurr[j],
                columngroup: currencyName,
                map: 'R_' + bothCurr[j],
                text: 'Repayments'
            });
        }
    } else {
        cols.push({
            name: 'LNL',
            map: 'LNL',
            text: 'Committed Drawdown'
        });
        cols.push({
            name: 'L',
            map: 'L',
            text: 'Outstanding'
        });
        cols.push({
            name: 'I',
            map: 'I',
            text: 'Interest'
        });
        cols.push({
            name: 'R',
            map: 'R',
            text: 'Repayments'
        });
    }
    CreateGrid(cols, getoldloans(results), columngroups);
}