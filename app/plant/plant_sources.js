//get data
function getsources(results) {
    console.log(results);
    var data = results['data'];
    var cedata = results['ceData'];
    var cfdata = results['cfData'];
    var startYear = results['startYear'];
    var financesources = results['financesources'];

    var iddata = 0;
    if (cfdata['id'])
        iddata = cfdata['id'];
    Cookies('iddata', iddata);

    var datar = [];
    for (var i = 1; i <= cedata["CPeriod"]; i++) {
        var data = new Array();
        data['id'] = i;
        data['item'] = i.toString() + ":" + (startYear * 1 + i * 1);
        for (var j = 0; j < financesources.length; j++) {
            data[financesources[j]['id']] = cfdata[financesources[j]['id'] + '_' + i];
        }
        datar.push(data);
    }
    return datar;
}

function showData(results) {
    $("#additionalData").load("app/data/additional.html", function () {
        var currencies = results['currencies'];
        var financesources = results['financesources'];
        var bothCurr = results['bothCurr'].split(',');
        var baseCurrency = results['baseCurrency'];
        var cfdata = results['cfData'];

        var curr = "";
        for (var k = 0; k < bothCurr.length; k++) {
            var selectedcurr = "";
            var currencyName = $.grep(currencies, function (v) {
                return v.id === bothCurr[k];
            })[0]['value'];
            if (bothCurr[k] == Cookies("curr"))
                selectedcurr = "selected";

            curr += "<option value=" + bothCurr[k] + " " + selectedcurr + ">" + currencyName + "</option>";
        }

        var tblcontrols = "<tr><td class='box-shadow card backwhite'><select id='cid' class='form-control' onchange='getDataPlant(\"plant_sources\",this.value)'>" + curr + "</select></td>";

        var cols = [];
        for (var j = 0; j < financesources.length; j++) {
            var fnName = $.grep(financesources, function (v) {
                return v.id === financesources[j]['id'];
            })[0]['value'];

            if (baseCurrency !== Cookies("curr")) {
                cols.push({
                    name: financesources[j]['id'],
                    map: financesources[j]['id'],
                    text: fnName,
                    editable: true
                });
                var checked='';
                var val=cfdata[financesources[j]['id']];
                if(val=='YES')
                    checked='checked';
                tblcontrols += "<td class='box-shadow card backwhite'> \
            <div class='pure-checkbox'> \
            <input type='checkbox' class='basic' id='" + financesources[j]['id'] + "' value='YES' "+checked+"/> \
            <label for=" + financesources[j]['id'] + "> " + financesources[j]['value'] + "  </label> \
            </div> \
            </td>";
            }


            if (baseCurrency == Cookies("curr") && financesources[j]['type'] == 'C') {
                cols.push({
                    name: financesources[j]['id'],
                    map: financesources[j]['id'],
                    text: fnName,
                    editable: true
                });
                var checked='';
                var val=cfdata[financesources[j]['id']];
                if(val=='YES')
                    checked='checked';
                tblcontrols += "<td class='box-shadow card backwhite'> \
            <div class='pure-checkbox'> \
            <input type='checkbox' class='basic' id='" + financesources[j]['id'] + "' value='YES' "+checked+"/> \
            <label for=" + financesources[j]['id'] + "> " + financesources[j]['value'] + "  </label> \
            </div> \
            </td>";
            }


        }
        tblcontrols += "</tr>";
        $("#controls tbody").append(tblcontrols);
        CreateGrid(cols, getsources(results));
    });

}


function enableGridColumn(input) {
    var column = input.slice(2);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'editable', editable);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'cellclassname', editable == false ? 'readonly' : '');
    if (editable) {
        $('#SteadyInf_' + column).prop('disabled', 'disabled');
    } else {
        $('#SteadyInf_' + column).removeAttr('disabled');
    }
}