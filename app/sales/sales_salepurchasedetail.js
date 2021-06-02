var url = "app/sales/sales_salepurchase.php";

function showData(results) {
    $("#additionalData").load("app/sales/sales_salepurchasedetail.html", function () {
        var id = results['id'];
        var data = results['data'];
        var startYear = results['startYear'];
        var endYear = results['endYear'];
        var currencies = results['currencies'];
        var producttypes = results["producttypes"];
        var curtypesell = results['bothCurrBase'].split(",");
        $("#perUnit").html($("#perunitid").val());
        var selected="";
        var product = "";
        var perunits="";
        for (var i = 0; i < producttypes.length; i++) {
            selected="";
            if(producttypes[i]["id"]==$("#producttypeid").val())
                selected='selected';
            product += "<option value=" + producttypes[i]["id"] + " "+selected+">" + producttypes[i]["value"] + " (" + producttypes[i]["unit"] + ")</option>";
            perunits += "<input type='hidden' id='"+producttypes[i]["id"]+"_perunit' value='"+producttypes[i]["sunit"]+"' />";

        }
        $("#Name").html("");
        $("#Name").append(product);
        $("#perunits").append(perunits);

        var curr = "";
        for (var k = 0; k < curtypesell.length; k++) {
            var currencyName = $.grep(currencies, function (v) {
                return v.id === curtypesell[k];
            })[0]['value'];
            curr += "<option value=" + curtypesell[k] + ">" + currencyName + "</option>";
        }

        $("#TradeCurrency").html("");
        $("#TradeCurrency").append(curr);

        $("#id").val(id);

        var datar = [];
        for (var i = startYear; i <= endYear; i++) {
            var amt = "";
            var pri = "";
            if (data != undefined) {
                amt = data['Amt_' + i];
                pri = data['Pri_' + i];
            }

            var datarow = new Array();
            datarow['id'] = i;
            datarow['item'] = i.toString();
            datarow['Amt'] = amt;
            datarow['Pri'] = pri;
            datar.push(datarow);
        }

        var editableAmt = true;
        var editablePri = true;
        var cellclassnameAmt = "";
        var cellclassnamePri = "";

        if (data != undefined) {
            setValues(data);

            if (data['Amount'] == "FD") {
                editableAmt = false;
                cellclassnameAmt = "readonly";
                $("#AmountFixed").removeAttr("disabled");
            }

            var columntext=$("#"+data['Price']+"label").html();

            if (data['Price'] == "SC") {
                editablePri = false;
                cellclassnamePri = "readonly";
            } else {
                $("#PriceFixed").prop("disabled", "disabled");
            }

            if (data['Price'] == "CP") {
                columntext+=" ("+$("#TradeCurrency :selected").text()+" "+$("#perUnit").html()+")";
            }
        }

        var cols = [];
        cols.push({
            name: 'Amt',
            map: 'Amt',
            text: 'Quantity',
            editable: editableAmt,
            cellclassname: cellclassnameAmt
        });
        cols.push({
            name: 'Pri',
            map: 'Pri',
            text: columntext,
            editable: editablePri,
            cellclassname: cellclassnamePri
        });
        CreateGrid(cols, datar);
    });
}

function saveDataSalePurchase() {
    if (!(required("ClientName", "Client name is required!") &&
            required("PriceBase", "Price for first year is required!")))
        return false;

    var rows = $('#gsFlexGrid').jqxGrid('getrows');
    var cols = $('#gsFlexGrid').jqxGrid('columns');
    var object = {};
    var inputs = $("#additionalData").find("input, select");
    for (var a = 0; a < inputs.length; a++) {
        if (inputs[a]["type"] == "radio" && inputs[a]["checked"] == true)
            object[inputs[a]["name"]] = inputs[a]["value"];

        if (inputs[a]["type"] == "text" && inputs[a]["disabled"] == false)
            object[inputs[a]["id"]] = inputs[a]["value"];

        if (inputs[a]["type"] == "checkbox" && inputs[a]["checked"] == true)
            object[inputs[a]["id"]] = inputs[a]["value"];

        if (inputs[a]["type"] == "select-one")
            object[inputs[a]["id"]] = inputs[a]["value"];

        if (inputs[a]["type"] == "hidden")
            object[inputs[a]["id"]] = inputs[a]["value"];
    }

    cols = cols.records;
    for (var i = 1; i < cols.length; i++) {
        for (var j = 0; j < rows.length; j++) {

            if (rows[j][cols[i]['datafield']] && cols[i]["editable"] == true)
                object[cols[i]['datafield'] + '_' + rows[j]['item']] = rows[j][cols[i]['datafield']];
        }
    }

    datanotes = $('#dataNotes').val();
    $.ajax({
        url: url,
        data: {
            'data': object,
            'datanotes': datanotes,
            'id': id,
            'action': 'update'
        },
        type: 'POST',
        success: function (result) {
            ShowSuccessMessage("Data saved successfully");
            $("#salepurchasecontent").html("");
            getDataSalesPurchases();
        },
        error: function (xhr, status, error) {
            ShowErrorMessage(error);
        }
    });
}

function setRateType(input, editable) {
    var column = "Amt";
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'editable', editable);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'cellclassname', editable == false ? 'readonly' : '');
    if (editable) {
        $('#AmountFixed').prop('disabled', 'disabled');
    } else {
        $('#AmountFixed').removeAttr('disabled');
    }
}

function setPriceType(input, editable) {
    var column = "Pri";
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'editable', editable);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'cellclassname', editable == false ? 'readonly' : '');
    if (editable) {
        $('#PriceFixed').prop('disabled', 'disabled');
    } else {
        $('#PriceFixed').removeAttr('disabled');
    }

    var columntext=$("#"+input+"label").html();
    if(input=='CP')
        columntext+=" ("+$("#TradeCurrency :selected").text()+" "+$("#perUnit").html()+")";

    $("#gsFlexGrid").jqxGrid('setcolumnproperty', column, 'text', columntext);
}

function changeProductType(){
    $("#perUnit").html($("#"+$("#Name").val()+"_perunit").val());
}