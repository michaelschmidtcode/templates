function changeC(argument){
    if(argument == "a"){
        window.location = "index.php";
    } else if(argument == "e"){
        window.location = "edit.php";
    } else if(argument == "c"){
        window.location = "create.php";
    } else if(argument == "n"){
        window.location = "new.php";
    }
}

function output(result){
    $("#content").html("");
    result.forEach(element => $( "#content" ).append( "<tr><th scope='row'>" + element.Genre + "</th><td>" + element.Filmtitel + "</td><td>" + element.Jahr +"</td><td>" + element.Regie + "</td></tr>" ));
}

function outputSearch(result){
    $("#searchOutput").html("");
    result.forEach(element => $( "#searchOutput" ).append( "<p>" + element.Genre + " " + element.Filmtitel + " " + element.Jahr +" " + element.Regie + "</p>" ));
}

function search(){
    $.ajax({
        url:"./controller/searchNewDB.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {search: $("#movie_search").val()},
        success:function(result){
            outputSearch(JSON.parse(result));
        }
    });
}


function init(){
    $.ajax({
        url:"./controller/createDB.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {},
        success:function(result){
            output(JSON.parse(result));
        }
    });
}

init();