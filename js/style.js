function tentor(){
    var x = document.getElementById('inputkatakunci');
    if(x.style.display === 'none'){
        x.style.display = 'block';
        document.getElementById('cek').name = "Tentor";
    }else{
        x.style.display = 'none';
        document.getElementById('cek').name = "bukan";
    }
}
$(document).ready(function(){
    $("#cek").click(function(){
        if($("#cek").val() === "tentor")
        {
            $("#cek").val('bukantentor');
            $("#cek").text('Bukan Tentor');
        }else {
            $("#cek").val('tentor');
            $('#cek').text('Tentor');
        }
    })
})
