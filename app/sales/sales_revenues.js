//get data
function showData(results) {
    var ctdata=results["ctData"];
    $("#additionalData").load("app/sales/sales_revenues.html", function(){
        $("#chartGrid").hide();
        $("#decDown").hide();
        $("#decUp").hide();
        $("#exportgrid").hide();
        setValues(ctdata);
    })
}