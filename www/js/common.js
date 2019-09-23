let API = "../api";
//const API = "https://phoenix-lms.ml/api";
let user = { id: "", type: "", name: "", email: "" };

// this is used to send requests to the server
const request = (path = "", method, data = {}) => {
    return new Promise((resolve, reject) => {
        let settings = {
            url: `${API}${path}`,
            method: method,
            data: data,
            contentType: "application/json",
            dataType: "json"
        };

        if (Object.keys(data).length > 0) {
            settings.data = JSON.stringify(data);
        }

        $.ajax(settings).done((res) => {
            if (res.error_code) {
                reject(res);
            } else {
                resolve(res);
            }
        });
    });
}

// this function will return the msg releated to each response code. See API readme for more info
const getResponseMsg = (code) => {
    let msg;
    switch (code) {

        case '-1':
            msg = "Inputs are missing!. Please fill all input fields.";
            break;
        case '0':
            msg = "Operation Succesful!.";
            break;
        case '1':
            msg = "Sorry!. Operation Failed.";
            break;
        case '2':
            msg = "Sorry!. That entry doesn't exist.";
            break;
        case '3':
            msg = "Sorry!. That entry already exists.";
            break;
        case '4':
            msg = "Invalid Request Method!.";
            break;
        case '5':
            msg = "There are records linked to this one. Please delete them first!.";
            break;
        case '6':
            msg = "Sorry!. You don't have permission to perform that action.";
            break;
        case '7':
            msg = "Invalid Credentials!.";
            break;
    }
    return msg;
}

// set user info in a global user obj
function setUser() {
    user = JSON.parse(getCookie("user"));
}

// coockie checker
const getCookie = (cname) => {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// set cookie
const setCookie = (cname, cvalue, exdays) => {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// erase cookie
const eraseCookie = (name) => document.cookie = name + '=; Max-Age=-99999999;'

// file upload reqests using ajax
const uploadRequest = (path = "", fdObject, progressBarSelector = false, progressLblSelector = false) => {
    return new Promise((resolve, reject) => {
        let ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function () {
            if (ajax.status) {
                if (ajax.status == 200 && (ajax.readyState == 4)) {
                    let res = JSON.parse(ajax.responseText);
                    if (res.error_code) {
                        reject(res);
                    } else {
                        resolve(res);
                    }
                }
            }
        };

        ajax.upload.addEventListener("progress", function (event) {
            let uploadedMB = ((event.loaded / 1024) / 1024).toFixed(2);
            let totalMB = ((event.total / 1024) / 1024).toFixed(2);
            let uploadingStatus = `Uploading... (${uploadedMB} MB of ${totalMB} MB)`;
            if (progressBarSelector) {
                $(progressLblSelector).html(uploadingStatus);
            } else {
                console.log(uploadingStatus);
            }
            let percent = Math.round((event.loaded / event.total) * 100);
            //**percent** variable can be used for modifying the length of your progress bar.
            if (progressBarSelector) {
                $(progressBarSelector).css('width', `${percent}%`);
            }

            if (percent == 100) {
                if (progressBarSelector) $(progressBarSelector).parent().fadeOut();
                if (progressLblSelector) $(progressLblSelector).fadeOut();
            }
        });

        ajax.open("POST", `${API}${path}`, true);
        // ajax.setRequestHeader('Content-Type', 'application/json');
        ajax.send(fdObject);

        if (progressBarSelector) $(progressBarSelector).parent().fadeIn();
        if (progressLblSelector) $(progressLblSelector).fadeIn();
    });
}

// extract data from query strings (get)
const getQueryVariable = (variable) => {
    let query = window.location.search.substring(1);
    let vars = query.split('&');
    for (let i = 0; i < vars.length; i++) {
        let pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }
    }
    console.log('Query variable %s not found', variable);
}
