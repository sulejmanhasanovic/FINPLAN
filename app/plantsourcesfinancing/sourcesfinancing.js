var url="app/general/geninf.php";
$(document).ready(function () {
    createTabs();
    //getDataGenInf();
});


function createTabs(){
    $.ajax({
        url: url,
        type: 'POST',
        data:{
            action: "select"
      },
        success: function (results) {
            var res = JSON.parse(results);
            console.log(res);
            var geninf=res['geninf'];
            var currencies=res["currencies"];
            $('#studyNameTitle').html(geninf['studyName']);
            $('#id').val(geninf['id']);
            $('#studyName').val(geninf['studyName']);
            $('#startYear').val(geninf['startYear']);
            $('#endYear').val(geninf['endYear']);
            $('#Desc').val(geninf['note']);
var boxA=[];
var boxB=[];
var CurTypeSel=geninf['CurTypeSel'].split(",");
            for(var i=0; i<currencies.length;i++){
                $('#Currency').append("<option value="+currencies[i]['id']+">"+currencies[i]['value']+"</option>"); 
                if (CurTypeSel.indexOf(currencies[i]['id']) >= 0) {
                    boxB.push({"id":currencies[i]['id'], "value":currencies[i]['value']});
                }else{
                    boxA.push({"id":currencies[i]['id'], "value":currencies[i]['value']});
                }
            }
            $("#listBoxA").jqxListBox({ filterable: true, allowDrop: true, allowDrag: true, source: boxA, height: 300, theme: 'metro' });
            $("#listBoxB").jqxListBox({ allowDrop: true, allowDrag: true, source: boxB, height: 300, theme: 'metro' });
            $('#Currency').val(geninf['baseCurrency']);
            $('#studyNameTitle').html(geninf['studyName']);
        }
    })
}

function validYears(n){
    $('#'+n.id).val(n.value.replace(/[^\d,]+/g, ''));
 }