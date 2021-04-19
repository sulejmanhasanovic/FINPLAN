//get data
function getexchangerate(results) {
    var cedata = results['ceData'];
    var startYear = results['startYear'];
    var endYear = results['endYear'];
    var curTypeSel = results['curTypeSel'].split(',');
    var datar = [];
    for (var i = startYear - 1; i <= endYear; i++) {

        var data = new Array();
        data['id'] = i;
        data['item'] = i.toString();
        for (var j = 0; j < curTypeSel.length; j++) {
            data[curTypeSel[j]] = cedata[curTypeSel[j] + '_' + i];
        }
        datar.push(data);
    }
    return datar;
}

function showData(results) {
    $("#additionalData").load("app/data/additional.html", function () {
        var cedata = results['ceData'];
        var baseCurrency = results['baseCurrency'];
        var curTypeSel = results['curTypeSel'].split(',');
        var currencies = results['currencies'];
        var baseCurrencyName = $.grep(currencies, function (v) {
            return v.id === baseCurrency;
        })[0]['value'];

        var tblcontrols = "<tr>";
        var cols = [];
        console.log(curTypeSel);
        if (results['curTypeSel'].length > 0) {
            for (var j = 0; j < curTypeSel.length; j++) {
                var currencyName = $.grep(currencies, function (v) {
                    return v.id === curTypeSel[j];
                })[0]['value'];

                var checkedSR = "";
                var editable = true;
                var cellclassname = "";
                if (cedata["RateType" + curTypeSel[j]] == "SR") {
                    checkedSR = "checked";
                    editable = false;
                    cellclassname = "readonly";
                }

                var checkedII = "";
                if (cedata["RateType" + curTypeSel[j]] == "II") {
                    checkedII = "checked";
                    editable = false;
                    cellclassname = "readonly";
                    disabled = "disabled";
                }

                var disabled = "";
                var checkedYR = "";
                if (cedata["RateType" + curTypeSel[j]] == "YR") {
                    checkedYR = "checked";
                    disabled = "disabled"
                }

                var yearlyrate = cedata["YearlyRate" + curTypeSel[j]];
                if (yearlyrate === undefined)
                    yearlyrate = "";

                tblcontrols += "<td class='box-shadow card backwhite'><b>" + baseCurrencyName + "(" + currencyName + ") (%)</b><br/> \
        <div class='row'> \
         <div class='col-md-6'> \
             <span class='pure-radiobutton'> \
                 <input type='radio' id='SR" + curTypeSel[j] + "' name='RateType" + curTypeSel[j] + "' " + checkedSR + " value='SR' onclick='setRateType(this.id,false)'/><label for='SR" + curTypeSel[j] + "'>Steady Rate</label> \
             </span> \
         </div> \
         <div class='col-md-6'>\
             <input id='YearlyRate" + curTypeSel[j] + "' type='text' class='form-control' size='50' autocomplete='off' onkeyup='onlyDecimal(this)' value='" + yearlyrate + "' " + disabled + "/> \
         </div> \
         </div> \
         <span class='pure-radiobutton'> \
         <input type='radio' id='II" + curTypeSel[j] + "' name='RateType" + curTypeSel[j] + "'  " + checkedII + " value='II' onclick='setRateType(this.id,false)'/><label for='II" + curTypeSel[j] + "'>Exchange Rate Reflects Inflation Rates</label> \
     </span> <br/>\
        <span class='pure-radiobutton'> \
             <input type='radio' id='YR" + curTypeSel[j] + "' name='RateType" + curTypeSel[j] + "'  " + checkedYR + " value='YR' onclick='setRateType(this.id,true)'/><label for='YR" + curTypeSel[j] + "'>Yearly Exchange Rate</label> \
         </span> \
         </td><td style='width:5px'></td>";

                cols.push({
                    name: curTypeSel[j],
                    editable: editable,
                    cellclassname: cellclassname,
                    map: curTypeSel[j],
                    text: baseCurrencyName + '(' + currencyName + ')'
                });
            }
            $("#controls").append(tblcontrols);
            CreateGrid(cols, getexchangerate(results));
        } else {
            $("#controls").append("No foreign currency selected");
        }
    })
}

function setRateType(input, editable) {
    var column = input.slice(2);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'editable', editable);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'cellclassname', editable == false ? 'readonly' : '');
    if (editable) {
        $('#YearlyRate' + column).prop('disabled', 'disabled');
    } else {
        $('#YearlyRate' + column).removeAttr('disabled');
    }
    if (input.substring(0, 2) == "II") {
        $('#YearlyRate' + column).prop('disabled', 'disabled');
        $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'editable', false);
        $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'cellclassname', 'readonly');
    }
}