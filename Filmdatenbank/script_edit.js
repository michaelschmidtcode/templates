// function backToSelect(){
//     window.location = "edit.php";
// }

function backtoSelect(){
    $("#blockEdit").hide();
    $("#blockEditSelect").show();
}

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

function populate(frm, data) {   
    $.each(data, function(key, value) {  
        var ctrl = $('[name='+key+']', frm);  
        switch(ctrl.prop("type")) { 
            case "radio": case "checkbox":   
            ctrl.each(function() {
                if($(this).attr('value') == value) $(this).attr("checked",value);
            });   
            break;  
            default:
                ctrl.val(value); 
            }  
        });  
}

function returnEmptyStringIfNull(text){
    if(text == null)
        return "";
    else
        return text; 
}

function fillSelect(select, title, value){
    var opt = document.createElement('option');
    opt.value = value;
    opt.innerHTML = title;
    select.appendChild(opt);
}

function fillGenre(id = false){
    $.ajax({
        url:"./controller/getGenres.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {},
        success:function(result){
            result = JSON.parse(result);
            select = document.getElementById('movie_genre');
            select.innerHTML = "";
            result.forEach(element => fillSelect(select, element.gen_name, element.gen_id));
            if(id)
            select.value = id;
        }
    });
}

function output(result){
    $("#content").html("");
    result.forEach(element => $( "#content" ).append( "<tr><th scope='row'>" + element.gen_name + "</th><td>" + element.mov_title_1 + "</td><td>" + returnEmptyStringIfNull(element.mov_title_2) + "</td><td>" + element.mov_year + "</td></tr>" ));
}

function saveChanges(){
    $("#editMovieForm").hide();
    $("#editMovieChange").show();
    var movie = ($("#editMovieForm").serialize() + "&mov_id=" + $("#movieSelect").val());
    $.ajax({
        url:"./controller/changeMovie.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: movie,
        success:function(result){
            result = JSON.parse(result);
            output(result);
        }
    });
}

function selectMovie(){
    $("#blockEditSelect").hide();
    $("#blockEdit").show();
    $.ajax({
        url:"./controller/getMovie.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {id: $("#movieSelect").val()},
        success:function(result){
            result = JSON.parse(result)[0];
            console.log(result);
            populate($("#editMovieForm"), result);
            fillGenre(result.gen_id);
        }
    });
}

function init(){
    $.ajax({
        url:"./controller/getMovies.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {},
        success:function(result){
            result = JSON.parse(result);
            select = document.getElementById('movieSelect');
            select.innerHTML = "";
            result.forEach(element => fillSelect(select, element.mov_title_1 + " " + returnEmptyStringIfNull(element.mov_title_2) + ", " + element.mov_year, element.mov_id));
        }
    });
}

init();