//To Show Errors
function showError(field, message){
    if(!message){
        $("#"+field).addClass('is-valid').removeClass("is-invalid").siblings('invalid-feedback').text('');
    }else{
        $("#"+field).addClass('is-invalid').removeClass("is-valid").siblings('invalid-feedback').text(message);
    }
}
//Alert Message
function showMessage(type,message){
    if(type == 'success'){
        return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Oh snap!</strong>${message}.
    </div>`;
    }
    if(type == 'danger'){
        return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Congratulations!</strong>${message}.
    </div>`;
    }

}
//Reset All Classes
function resetAllClasses(form){
    $(form).each(function(){
        $(form).find(":input").removeClass("is-valid is-invalid");
    });
}


