$('#btnLogout').click(function(){
    RequestLogout();
});

function RequestLogout(){
    $.ajax({
        type: "POST",
        url: "/finalHCI/Backend/logout.php",
        data:{Choice: 'Logout'},
        success:function(data){
            window.location.href = "index.php";
        },
        error:function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}