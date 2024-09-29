var flag = true;
function _submit(obj) {
    var first_name = document.querySelector("#firstName").value;
    var last_name = document.querySelector("#lastName").value;
    var email = document.querySelector("#email").value;
    var pass = document.querySelector("#password").value;
    var birthday = document.querySelector("#birthday").value;
    var gender = document.querySelector("input[type=radio]:checked");
    var image = document.querySelector("#profile_image").value;
    extension = image.split('.').pop().toLowerCase();
    var add = document.querySelectorAll("add");

    var first_name_msg = document.querySelector("#firstname_field");
    var last_name_msg = document.querySelector("#last_field");
    var email_msg = document.querySelector("#email_field");
    var password_msg = document.querySelector("#password_field");
    var dob_msg = document.querySelector("#birthday_field");
    var gender_msg = document.querySelector("#gender_field");
    var profile_msg = document.querySelector("#profile_pic");
    var address_msg = document.querySelector("#address_field");


    var alph_pattern = /^[A-Z]{1}[a-z]+[^0-9]$/;
    var email_patter = /[a-z]+[0-9]*[@]{1}[gmail]+[.](com|net)/;



    if (first_name === "") {
        flag = false;
        first_name_msg.innerHTML = "Required Field";
    }
    else {
        first_name_msg.innerHTML = "";
        if (alph_pattern.test(first_name) == false) {
            flag = false;
            first_name_msg.innerHTML = "Name Should Be Like (Ali/Tahir)";
        }
        else {
            first_name_msg.innerHTML = "";
        }
    }

    if (last_name === "") {
        flag = false;
        last_name_msg.innerHTML = "Required Field";
    }
    else {
        last_name_msg.innerHTML = "";
        if (alph_pattern.test(last_name) == false) {
            flag = false;
            last_name_msg.innerHTML = "Name Should Be Like (Ali/Tahir)";
        }
        else {
            last_name_msg.innerHTML = "";
        }
    }


    if (email === "") {
        flag = false;
        email_msg.innerHTML = "Required Field";
    }
    else {
        email_msg.innerHTML = "";
        if (email_patter.test(email) == false) {
            flag = false;
            email_msg.innerHTML = "Emial Should Be Like(example@gamil.com)";

        }
        else {
            email_msg.innerHTML = "";


        }
    }

    if (pass === "") {
        flag = false;
        password_msg.innerHTML = "Required Field";
    }
    else {
        password_msg.innerHTML = "";
    }

    if (birthday === "") {
        flag = false;
        dob_msg.innerHTML = "Required Field";
    }
    else {
        dob_msg.innerHTML = "";


    }

    if (!gender) {
        flag = false;
        gender_msg.innerHTML = "Required Field";
    }
    else {
        gender_msg.innerHTML = "";

    }

    if (add === "") {
        flag = false;
        address_msg.innerHTML = "Required Field";

    }
    else {
        address_msg.innerHTML = "";

    }

    if (image == "") {
        flag = false;
        profile_msg.innerHTML = "Required Field";
    }
    else {
        profile_msg.innerHTML = "";
        if (extension == "png" || extension == "jpg" || extension == "jpeg") {
            profile_msg.innerHTML = "";
        }
        else {
            flag = false;
            profile_msg.innerHTML = "PNG JPG JPEG Required";
        }
    }



    if (flag) {

        return true;
    }
    else {
        return false;
    }

}

function login_submit() {
    var email = document.querySelector("#email").value;
    var pass = document.querySelector("#password").value;


    var email_msg = document.querySelector("#email_msg");
    var password_msg = document.querySelector("#password_msg");

    if (email === "") {
        flag = false;
        email_msg.innerHTML = "Required Field";
    }
    else {
        email_msg.innerHTML = "";
        if (email_patter.test(email) == false) {
            flag = false;
            email_msg.innerHTML = "Emial Should Be Like(example@gamil.com)";

        }
        else {
            email_msg.innerHTML = "";


        }
    }

    if (pass === "") {
        flag = false;
        password_msg.innerHTML = "Required Field";
    }
    else {
        password_msg.innerHTML = "";
    }


    if (flag) {
        return true;
    }
    else {
        return false;
    }

}

function email_check() {
    var email = document.querySelector("#email").value;
    var btn_login = document.querySelector("#btn_login");

    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {


        if (ajax_req.status == 200 && ajax_req.readyState == 4) {

            if (ajax_req.responseText.trim() == "Email_Verified") {
                btn_login.disabled = false;
                document.getElementById("email_msg").innerHTML = " ";

            }
            else {
                btn_login.disabled = true;
                document.getElementById("email_msg").innerHTML = ajax_req.responseText;
            }
        }
    }

    ajax_req.open("POST", "../require/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=check_email&email=" + email);
}


function pass_check() {
    var password = document.querySelector("#password").value;

    var btn_change = document.querySelector("#btn_change");

    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {

        // console.log(ajax_req);
        if (ajax_req.status == 200 && ajax_req.readyState == 4) {
            console.log(ajax_req.responseText);

            if (ajax_req.responseText.trim() == "Password Match") {
                btn_change.disabled = false;
                document.getElementById("pass_msg").innerHTML = "";

            }
            else {
                btn_change.disabled = true;
                document.getElementById("pass_msg").innerHTML = ajax_req.responseText;
            }
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=check_password&pass=" + password);
}





function get_data() {

    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=show_data");

}



function approve_user(obj) {
    var id = obj.value;
    console.log(id);
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            get_data();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=approve&id=" + id);

}
function reject_user(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            get_data();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=reject&id=" + id);
}
function manage_user() {

    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=manage_user");

}
function admin(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            manage_user();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=admin&id=" + id);
}

function user(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            manage_user();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=user&id=" + id);
}

function block(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            manage_user();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=block&id=" + id);
}
function us_block(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            manage_user();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=unblock&id=" + id);
}
function view_post() {
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=view_post");

}

function add_attachment(obj) {
    var count = document.querySelector("#count").value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            console.log(ajax_req.responseText);
            document.getElementById("add_attachemnt").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=add_attachment&count=" + count);
}

function show_blog() {
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=show_blog");

}

function block_blog(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            show_blog();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=block_blog&id=" + id);
}

function unblock_blog(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            show_blog();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=unblock_blog&id=" + id);
}


function show_category() {
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=show_category");

}

function block_category(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            show_category();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=hide_category&id=" + id);

}

function unblock_category(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            show_category();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=show&id=" + id);
}

function block_post(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            view_post();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=hide_post&id=" + id);

}

function unblock_post(obj) {
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            view_post();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=show_post&id=" + id);
}

function show_comment() {
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=show_comment");
}

function comment_hide(obj) {
    var comment_id = obj.value;
    console.log(comment_id);
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            // document.getElementById("data").innerHTML = ajax_req.responseText;
            show_comment();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=comment_hide&id=" + comment_id);
}

function comment_show(obj) {
    var comment_id = obj.value;
    console.log(comment_id);
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            // document.getElementById("data").innerHTML = ajax_req.responseText;
            show_comment();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=comment_show&id=" + comment_id);
}
function get_followed() {

    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            document.getElementById("data").innerHTML = ajax_req.responseText;
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=follow_data");

}

function unfollow(obj){
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            get_followed();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=un_follow&id=" + id);
}

function follow(obj){
    var id = obj.value;
    var ajax_req = null;

    if (window.XMLHttpRequest) {
        ajax_req = new XMLHttpRequest();
    }
    else {
        ajax_req = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax_req.onreadystatechange = function () {
        if (ajax_req.status == 200) {
            get_followed();
        }
    }

    ajax_req.open("POST", "../admin/process.php");
    ajax_req.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax_req.send("action=follow&id=" + id);
}