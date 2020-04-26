$('.info').click(function() {
    var user = ($('.userEmail').text());
    if (user == "") {
        document.getElementById("content-info").innerHTML = "";
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
                document.getElementById("content-info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","userInfomation.php?user="+user,true);
        xmlhttp.send();
    }
});

$('.changeInfo').click(function() {
    var user = ($('.userEmail').text());
    if (user == "") {
        document.getElementById("content-info").innerHTML = "";
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
                document.getElementById("content-info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","userInfomationEdit.php?user="+user,true);
        xmlhttp.send();
    }
});

$('.changePass').click(function() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content-info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","changePass.php",true);
        xmlhttp.send();
});

$('.history').click(function() {
    var user = ($('.userEmail').text());
    if (user == "") {
        document.getElementById("content-info").innerHTML = "";
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
                document.getElementById("content-info").innerHTML = this.responseText;
                $('#historyBooking').dataTable();
            }
        };
        xmlhttp.open("POST","bookingHistory.php?user="+user,true);
        xmlhttp.send();
    }
});