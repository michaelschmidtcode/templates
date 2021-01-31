function backToCreate(){
    $("#showMovies").hide();
    $("#editMovieForm").show();
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

function clearForm($form)
{
    $form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
    $form.find(':checkbox, :radio').prop('checked', false);
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

function insertMovie(){
    var movie = ($("#editMovieForm").serialize());
    $.ajax({
        url:"./controller/insertMovie.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: movie,
        success:function(result){
            result = JSON.parse(result);
            if(result.error){
                $("#errorMessage").html(result.message);
                $("#showError").show();
            } else {
                clearForm($("#editMovieForm"));
                output(result);
                $("#showError").hide();
                $("#editMovieForm").hide();
                $("#showMovies").show();
            }
        }
    });
}

function init(){
    fillGenre();
}

init();