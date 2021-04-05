var url="app/plant/plant.php";
function showData(results) {
    $("#additionalData").load("app/plant/plant_general.html", function(){
    showloader();
    Cookies("id", 'plant_general');
    var id=Cookies.get("plantid");

        $.ajax({
            url: url,
            data: {
                action: 'selectplant',
                id: id
            },
            type: 'POST',
            success: function (results) {
                var res = JSON.parse(results);
                var plant=res['data'];
                setValues(plant);
                var currtypesel=plant['CurTypeSel'].split(',');
                for(var i=0; i<currtypesel.length; i++){
                    $("#"+currtypesel[i]).prop('checked', true);
                }
                if(plant.id==undefined)
                plant.id="";
                $("#id").val(plant.id);

                $("#savePlant").show();
                hideloader();
            },
            error: function (xhr, status, error) {
                hideloader();
                ShowErrorMessage(error);
            }
        });
    })
}