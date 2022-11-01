function afficher(id){


   
document.getElementById("task-title").value=document.getElementById(id+"t").getAttribute("value");

document.getElementById("task-priority").value=document.getElementById(id+"p").getAttribute("value");
 let type= document.getElementById("task-type")
 if(type="bug"){
    document.getElementById('task-type-bug').checked=true;
}else{
    document.getElementById('task-type-feature').checked=true;
}
document.getElementById("task-priority").value=priority;
document.getElementById("task-date").value=document.getElementById(id+"d").getAttribute("value");
document.getElementById("task-description").value=document.getElementById(id+"ds").getAttribute("value");
document.getElementById("task-status").value = document.getElementById(id+"st").getAttribute("value");


}

