$(document).ready(function() {
    $.ajax({
    url : './data/dataMovie.php', // your php file
    type : 'POST', // type of the HTTP request
    success : function(data){
        var obj = jQuery.parseJSON(data);
        var arrName = [];
        var arrAmount = [];
        obj.forEach((el) => {
            arrName.push(el.name);
        })
        obj.forEach((el) => {
            arrAmount.push(el.amount);
        })
        var popCanvas = document.getElementById("myChart");
        var barChart = new Chart(popCanvas, {
            type: 'bar',
            data: {
                labels: arrName,
                datasets: [{
                    label: '',
                    data: arrAmount,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                    ]
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
