var sel1 = document.querySelector('#sel1');
var sel2 = document.querySelector('#sel2');
var options2 = sel2.querySelectorAll('option');

function giveSelection(selValue) {
  sel2.innerHTML = '';
  for(var i = 0; i < options2.length; i++) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }
  }
}
giveSelection(sel1.value);

$('#btnDetailTheater').on('click', function () {
  document.getElementById("listTheater-detail").style.display = "block";
})
$('#form').submit(function(){
  var test = $('#sel2').find(":selected").text();
  $.ajax({
    url: $('#form').attr('action'),
    type: 'POST',
    data : $('#form').serialize(),
    success: function(){
      if (test == "") {
        document.getElementById("listTheater-detail").innerHTML = "";
        return;
      } else { 
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("listTheater-detail").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("POST","getTheaterDetail.php?q="+test,true);
          xmlhttp.send();
      }
    }
  });
  return false;
});
