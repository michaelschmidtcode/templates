//globals
var last_movie_id;

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

function returnEmptyStringIfNull(text){
    if(text == null)
        return "";
    else
        return text; 
}

function appendTemplate(element){
    if(element.mov_id != last_movie_id){
        $( "#content" ).append( "<tr><th scope='row'>" + element.gen_name + "</th><td>" + element.mov_title_1 +
        "</td><td>" + element.mov_year + "</td><td>" + returnEmptyStringIfNull(element.per_fname) + " " + returnEmptyStringIfNull(element.per_lname) + "</td></tr>" )
    } else if(element.per_fname != null || element.per_lname){
        $( "#content" ).append( "<tr><th scope='row'></th><td></td><td></td><td>" + returnEmptyStringIfNull(element.per_fname) + " " + returnEmptyStringIfNull(element.per_lname) + "</td></tr>")
    }
    last_movie_id = element.mov_id;
}

function output(result){
    $("#content").html("");
    last_movie_id = "";
    result.forEach(element => 
       appendTemplate(element)
    );
}

function search(){
    $.ajax({
        url:"./controller/searchAndListMovies.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {start: $( "#dateInputStart" ).val(), end: $( "#dateInputEnd" ).val()},
        success:function(result){
            console.log(JSON.parse(result));
            output(JSON.parse(result));
        }
    });
}

function init(){
    $.ajax({
        url:"./controller/searchAndListMovies.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {start: "", end: ""},
        success:function(result){
            console.log(JSON.parse(result));
            output(JSON.parse(result));
        }
    });
}

init();