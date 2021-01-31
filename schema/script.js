var selectedDatbase = "";

function appendTemplate(container, element, fName){
    var value = "'" + element + "'";
    $( "#" + container).append('<div class="row mt-4"><div class="col-9"><h5>'+
    element +'</h5></div>'+
    '<div class="col-3"><button type="button" onclick="'+fName+'('+ value +');" class="btn btn-primary">Auswahl</button></div></div>');
}

function appendTemplate_list(container, element){
    $( "#" + container).append('<div class="row mt-4"><div class="col-2">'+ element.Field +
    '</div><div class="col-2">'+ element.Type +'</div>'
    +'<div class="col-2">'+ element.Null +'</div>'
    +'<div class="col-2">'+ element.Key +'</div>'
    +'<div class="col-2">'+ element.Extra +'</div>'
    +'</div>');
}

function setDatabase(database){
    selectedDatbase = database;
    $("#schemaContainer").hide();
    $("#tableContainer").show();
    $("#databaseName").html(database);
    $.ajax({
        url:"./controller/tables.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {database: database},
        success:function(result){
            console.log(JSON.parse(result));
            output_tables(JSON.parse(result));
        }
    });
}

function showStructure(table){
    $("#tableContainerElements").hide();
    $("#structureContainerElements").show();
    $("#tableName").html(table);
    $.ajax({
        url:"./controller/table.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {database: selectedDatbase,table: table},
        success:function(result){
            console.log(JSON.parse(result));
            output_table(JSON.parse(result));
        }
    });
}

function output(result){
    if(result.length > 0){
        result.forEach(element =>
           appendTemplate("schemaContainer", element.Database, "setDatabase")
        );
    } 
}

function output_tables(result){
    $("#tableContainerElementsItems").html("");
    if(result.length > 0){
        result.forEach(element =>
           appendTemplate("tableContainerElementsItems", element[Object.keys(element)[0]], "showStructure")
        );
    } 
}

function output_table(result){
    $("#structureContainerElementsItems").html("");
    if(result.length > 0){
        result.forEach(element =>
           appendTemplate_list("structureContainerElementsItems", element)
        );
    } 
}

function getSchema(){
    $.ajax({
        url:"./controller/schema.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {},
        success:function(result){
            console.log(JSON.parse(result));
            output(JSON.parse(result));
        }
    });
}

function clear(){
    $("#tableContainer").hide();
    $("#schemaContainer").show();
    selectedDatbase = "";
}

function init() {
    getSchema();
}

$("#clearButton").click(function(){
    clear();
  });
init();