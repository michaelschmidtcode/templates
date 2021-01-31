function backToCreate(){
    $("#showTheater").hide();
    $("#editTheatherForm").show();
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
            select = document.getElementById('dramaGenre');
            select.innerHTML = "";
            result.forEach(element => fillSelect(select, element.gen_name, element.gen_id));
            if(id)
                select.value = id;
        }
    });
}

function fillAutor(id = false){
    $.ajax({
        url:"./controller/getAutor.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'HTML',
        data: {},
        success:function(result){
            result = JSON.parse(result);
            select = document.getElementById('dramaAutor');
            select.innerHTML = "";
            result.forEach(element => fillSelect(select, returnEmptyStringIfNull(element.per_vName) + " " + returnEmptyStringIfNull(element.per_nName), element.per_id));
            if(id)
                select.value = id;
        }
    });
}

function output(result){
    $("#content").html("");
    result.forEach(element => $( "#content" ).append( "<tr><th scope='row'>" + element.dra_id + "</th><td>" + element.gen_name + "</td><td>"+ element.dra_name +"</td><td>" +
     returnEmptyStringIfNull(element.per_vName) + " " + returnEmptyStringIfNull(element.per_nName) + "</td><td>" + element.eve_termin + "</td></tr>" ));
}

function insertTheater(){
    if($("#dramaEvent").val() != ""){
        var theater = ($("#editTheatherForm").serialize());
        $.ajax({
            url:"./controller/insertTheater.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'HTML',
            data: theater,
            success:function(result){
                result = JSON.parse(result);
                if(result.error){
                    $("#errorMessage").html(result.message);
                    $("#showError").show();
                } else {
                    clearForm($("#editTheatherForm"));
                    fillGenre();
                    fillAutor();
                    output(result);
                    $("#showError").hide();
                    $("#editTheatherForm").hide();
                    $("#showTheater").show();
                }
            }
        });
    } else {
        $("#errorMessage").html("Bitte Erstaufführung ausfüllen");
        $("#showError").show();
    }
}

function init(){
    fillGenre();
    fillAutor();
}

init();