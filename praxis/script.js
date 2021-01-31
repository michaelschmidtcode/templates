function fillSelect(select, title, value){
    var opt = document.createElement('option');
    opt.value = value;
    opt.innerHTML = title;
    select.appendChild(opt);
}

function fillPatentientID(id = false){
    $.ajax({
        url:"./controller/returnPatientsId.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {},
        success:function(result){
            result = JSON.parse(result);
            select = document.getElementById('patients_id');
            select.innerHTML = "";
            fillSelect(select,"-","");
            result.forEach(element => fillSelect(select, element.firstname + " " + element.lastname + " " + element.svnr, element.id));
            if(id)
            select.value = id;
        }
    });
}

function appendTemplate(element){
    $( "#content" ).append( "<tr><td>" + element.firstname + " " + element.lastname +  "</td><td>"+
    element.diseasearea + "</td><td>" + element.diagnosis + "</td><td>" + element.visit + "</td></tr>");
}

function returnSelectDateRange(){
    if($("#visit").val() == "this"){
        return "für das aktuelle Monat";
    } else if($("#visit").val() == "last"){
        return "für den vorheriger Monat";
    } else {
        return "";
    }
}

function output(result){
    $("#content").html("");
    if(result.length > 0){
        $("#noPatient").hide();
        $("#tableSearch").show();
        result.forEach(element =>
           appendTemplate(element)
        );
    } else {
        if($("#patients_id" ).val()){
            $("#noPatientText").html("Für den Patienten mit der ID " + $("#patients_id" ).val() + " sind keine Diagnosen " +
            returnSelectDateRange()  + " vorhanden.");
        } else {
            $("#noPatientText").html("Es sind keine Diagnosen " + returnSelectDateRange()  + " vorhanden.");
        }
        $("#tableSearch").hide();
        $("#noPatient").show();
    }
}

function returnPeriod(){
    select = document.getElementById('visit');
    var periods = [{name:"aktuelles Monat", value:"this"}, {name:"vorheriger Monat",value:"last"}, {name:"alle Behandlungszeiträume", value:""}];
    periods.forEach(element => fillSelect(select, element.name, element.value));
}

function search(){

    $.ajax({
        url:"./controller/search.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {id: $( "#patients_id" ).val(), period: $( "#visit" ).val()},
        success:function(result){
            console.log(JSON.parse(result));
            output(JSON.parse(result));
        }
    });
}

function init() {
    fillPatentientID();
    returnPeriod();
}

init();