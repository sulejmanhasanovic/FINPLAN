//get data
function getinflation(results) {
    var cedata = results['ceData'];
    var startYear=results['startYear'];
    var endYear=results['endYear'];
    var bothCurr=results['bothCurr'].split(',');
    var datar=[];
for (var i=startYear; i<=endYear; i++){
            var data = new Array();
            data['id']=i;
            data['item']=i.toString(); 
            for(var j=0; j<bothCurr.length; j++){
                data[bothCurr[j]]=cedata[bothCurr[j]+'_'+i];
            }
            datar.push(data); 
    }
return datar;
}

function showData(results) {
console.log(results);
    $("#additionalData").load("app/data/additional.html", function(){
        var cedata=results["ceData"];
        var bothCurr=results['bothCurr'].split(',');
        var currencies=results['currencies'];

        var cols=[];
        var tblcontrols="<tr>";
        for(var j=0; j<bothCurr.length; j++){
            var currencyName = $.grep(currencies, function(v) {
                return v.id === bothCurr[j];
            })[0]['value'];

           var checkedSR="";
           var editable=true;
           var cellclassname="";
           if(cedata["RateType"+bothCurr[j]]=="SR"){ checkedSR="checked"; editable=false; cellclassname="readonly" }
           
           var checkedYR="";
           var disabled="";
           if(cedata["RateType"+bothCurr[j]]=="YR"){ checkedYR="checked"; disabled="disabled" }

           var steadyinf=cedata["SteadyInf_"+bothCurr[j]];
           if(steadyinf===undefined)
                steadyinf="";

            cols.push({name:bothCurr[j], editable:editable, cellclassname:cellclassname,  map: bothCurr[j], text:currencyName+" (%)"});
           
           tblcontrols+="<td class='box-shadow card backwhite'><b>"+currencyName+" (%)</b><br/> \
           <div class='row'> \
            <div class='col-md-6'> \
                <span class='pure-radiobutton'> \
                    <input type='radio' id='SR"+bothCurr[j]+"' name='RateType"+bothCurr[j]+"' "+checkedSR+" onclick='setRateType(this.id, false)' value='SR'/><label for='SR"+bothCurr[j]+"'>Steady Rate</label> \
                </span> \
            </div> \
            <div class='col-md-6'>\
                <input id='SteadyInf_"+bothCurr[j]+"' type='text' class='form-control' size='50' autocomplete='off' value='"+steadyinf+"' "+disabled+"/> \
            </div> \
            </div> \
           <span class='pure-radiobutton'> \
                <input type='radio' id='YR"+bothCurr[j]+"' name='RateType"+bothCurr[j]+"'  "+checkedYR+" onclick='setRateType(this.id, true)' value='YR'/><label for='YR"+bothCurr[j]+"'>Yearly Input</label> \
            </span> \
            </td><td style='width:5px'></td>";
        }

         $("#controls").append(tblcontrols);     
        CreateGrid(cols, getinflation(results));
    })
   
}

function setRateType(input, editable){
    var column=input.slice(2);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'editable', editable);
    $('#gsFlexGrid').jqxGrid('setcolumnproperty', column, 'cellclassname', editable==false ? 'readonly' : '');
    if(editable){
        $('#SteadyInf_'+column).prop('disabled', 'disabled');
    }else{
        $('#SteadyInf_'+column).removeAttr('disabled');
    }
}