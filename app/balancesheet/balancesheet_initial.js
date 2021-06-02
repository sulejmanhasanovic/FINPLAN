//get data
function showData(results) {
    var ctdata=results["ctData"];
    $("#additionalData").load("app/balancesheet/balancesheet_initial.html", function(){
        $("#chartGrid").hide();
        $("#decDown").hide();
        $("#decUp").hide();
        $("#exportgrid").hide();
        
        setValues(ctdata);
    })
}

function calculateNetFxdAsst(n){
    $("#NetFxdAsst").val( ($("#GrossFixedAssets").val()*1) - ($("#LessDepreciation").val()*1) + ($("#ConsumerContribution").val()*1));
    $('#' + n.id).val(n.value.replace(/[^\d,-]+/g, ''));
}