var theater = $("[name=theaterName] option").detach()
$("[name=city]").change(function() {
  var val = $(this).val();
  var newStr = val.replace(/\s+/g, '');
  console.log(newStr)
  $("[name=theaterName] option").detach()
  theater.filter("." + newStr).clone().appendTo("[name=theaterName]")
}).change()

$('#form2').submit(function(){
    var theater = $('#theater').find(":selected").val();
    var type = $('#ticketType').find(":selected").val();
    var movie =  $(".movie-detail-content-name").text();
    var showing = $('#showings').find(":selected").val();
    $.ajax({
        url: $('#form2').attr('action'),
        type: 'POST',
        data : $('#form2').serialize(),
        success: function(){
            if (theater == "" || type == "" || movie == "" || typeof showing === "undefined") {
                document.getElementById("mapTheater").innerHTML = "Xin Lỗi Không Có Suất Chiếu";
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
                        console.log(theater);
                        console.log(type);
                        console.log(movie);
                        console.log(showing)
                        document.getElementById("mapTheater").innerHTML = this.responseText;
                        $(document).ready(function () {
                            $(".seats").click(function (event) {
                                console.log($(this).text()); // get id of clicked li
                                var color = $(event.target).css("background-color");
                                if(color === "rgb(230, 202, 196)"){
                                    $(this).css("background-color", "rgb(185,222,160)");
                                }
                                else{
                                    $(this).css("background-color", "rgb(230,202,196)");
                                }
                            });
                        });
                    }
                };
                xmlhttp.open("GET","booking.php?theater="+theater+"&type="+type+"&movie="+movie,true);
                xmlhttp.send();
            }
        }
    });
    return false;
});

var showing = $("[name=showings] option").detach()
$("[name=theaterName]").change(function() {
    var val = $(this).find(":selected").text();
    var newStr = val.replace(/\s+/g, '');
    console.log(newStr)
    $("[name=showings] option").detach()
    showing.filter("." + newStr).clone().appendTo("[name=showings]")
}).change()

var showings = $("[name=showings] option").detach()
$("[name=ticketType]").change(function() {
    var val = $(this).find(":selected").val();
    var newStr = val.replace(/\s+/g, '');
    console.log(newStr)
    $("[name=showings] option").detach()
    showings.filter("." + newStr).clone().appendTo("[name=showings]")
}).change()