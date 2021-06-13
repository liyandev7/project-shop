var path;
showModal=function (p){
    path=p;
    document.querySelector(".model_delete").style.display="block";
}
btnSubmitDelete=function (){

    $("#delete").attr('action',path);
    if ($("#delete").submit()){
        document.querySelector(".model_delete").style.display="none";
    }
}
closeDelete=function (){
    document.querySelector(".model_delete").style.display="none";
}
