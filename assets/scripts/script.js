function cancelMeet(idMeet){
    if(window.confirm("Etes-vous sûr de vouloir annuler le rendez-vous ?")){
        $.ajax({
            method: "POST",
            url: "assets/delete/cancelMeet.php",
            data: `idMeet=${idMeet}`,
            cache: false,
            success: ((res)=>{
                if(res){
                    location.replace('/medway/patientList.php');
                }
            })
        })
    }
}