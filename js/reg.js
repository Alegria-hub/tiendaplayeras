function cambio(){    
    const frm = document.getElementById('premium');
    const frm2 = document.getElementById('premium2');
    if (frm.style.display === "none" && frm2.style.display === "none") {
        frm.style.display = "block";
        frm2.style.display = "block";
    }else{
        frm.style.display = "none";
        frm2.style.display = "none";
    }
}