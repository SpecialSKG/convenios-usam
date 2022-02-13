//var baseurl = 'http://192.168.0.15/convenios-usam/';
var baseurl = 'http://localhost/convenios-usam/';

$(document).ready(function () {
  $('#tabla').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

/* Alertas */
/*toastr.options = {
  "closeButton": false,
  "debug": true,
  "newestOnTop": true,
  "progressBar": true,
  "rtl": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}*/

/* Sidebar */
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
});

/* Reloj */

function show5(){
  if (!document.layers&&!document.all&&!document.getElementById)
    return

  var Digital=new Date()
  var hours=Digital.getHours()
  var minutes=Digital.getMinutes()
  var seconds=Digital.getSeconds()

  var dn="PM"
  if (hours<12)dn="AM"
  if (hours>12)hours=hours-12
  if (hours==0)hours=12

  if (minutes<=9)minutes="0"+minutes
  if (seconds<=9)seconds="0"+seconds
  //change font size here to your desire
  myclock = "<i class='inline-icon material-icons'>schedule</i>"+hours+":"+minutes+" "+dn+"</font>";
  if (document.layers){
    document.layers.liveclock.document.write(myclock)
    document.layers.liveclock.document.close()
  }else if (document.all){
    liveclock.innerHTML=myclock
  }else if (document.getElementById){
    document.getElementById("liveclock").innerHTML=myclock
    setTimeout("show5()",1000)
  }

  }
  window.onload=show5();