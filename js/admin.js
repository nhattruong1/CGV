$(document).ready(function() {
    $.ajax({
    url : './data/dataMovie.php', // your php file
    type : 'POST', // type of the HTTP request
    success : function(data){
        var obj = jQuery.parseJSON(data);
        var arrName = [];
        var arrAmount = [];
        var arrColor = [];
        obj.forEach((el) => {
            arrName.push(el.name);
        })
        obj.forEach((el) => {
            arrAmount.push(el.amount);
        })
        function getRandomRgba() {
            var num = Math.round(0xffffff * Math.random());
            var r = num >> 16;
            var g = num >> 8 & 255;
            var b = num & 255;
            return 'rgb(' + r + ', ' + g + ', ' + b + ',' + 0.6 +')';
        }
        obj.forEach((el) => {
            arrColor.push(getRandomRgba());
        })
        console.log(arrColor)
        var popCanvas = document.getElementById("myChart");
        var barChart = new Chart(popCanvas, {
            type: 'bar',
            data: {
                labels: arrName,
                datasets: [{
                    label: '',
                    data: arrAmount,
                    backgroundColor: arrColor,
                }]
            }
        });
    }
});

$('.list-user').click(function() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            $('#example').DataTable();
        }
    };
    xmlhttp.open("POST","adminListUser.php",true);
    xmlhttp.send();
});
$('.list-events').click(function() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            $('.dropdown-menu').click(function () {
                $('#decriptionNewsAdd').summernote({
                    tabsize: 4,
                    height: 200
                })
            })
            $('#example').DataTable();
            $('#example').on("click", ".edit-News",function () {
                $('.decriptionNewsEdit').summernote({
                    tabsize: 4,
                    height: 200
                })
            });
        }
    };
    xmlhttp.open("POST","adminListNews.php",true);
    xmlhttp.send();
});

$('.list-admins').click(function() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            $('#example').DataTable();
        }
    };
    xmlhttp.open("POST","adminListAdmin.php",true);
    xmlhttp.send();
});
$('.list-movies-admin').click(function() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            $('#example').DataTable();
        }
    };
    xmlhttp.open("POST","adminListMovie.php",true);
    xmlhttp.send();
});
$('.list-showings').click(function() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            $('#example').DataTable();
        }
    };
    xmlhttp.open("POST","adminListShowing.php",true);
    xmlhttp.send();
});
});
