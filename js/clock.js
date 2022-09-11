/*const getHours = () => {
    const clock = document.getElementsByClassName('clock')[0]
    const date = new Date()
    const hours = date.getHours()
    const minutes = date.getMinutes()
    const seconds = date.getSeconds()
    const hour = hours < 10 ? `0${hours}` : hours
    const minute = minutes < 10 ? `0${minutes}` : minutes
    const second = seconds < 10 ? `0${seconds}` : seconds
    clock.innerHTML = `${hour}:${minute}:${second}`
  }
  
  setInterval(() => {
    getHours()
  }, 1000)*/

var xmlHttp;
function srvTime(){
    try {
        //FF, Opera, Safari, Chrome
        xmlHttp = new XMLHttpRequest();
    }
    catch (err1) {
        //IE
        try {
            xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (err2) {
            try {
                xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (eerr3) {
                //AJAX not supported, use CPU time.
                alert("AJAX not supported");
            }
        }
    }
    xmlHttp.open('HEAD',window.location.href.toString(),false);
    xmlHttp.setRequestHeader("Content-Type", "text/html");
    xmlHttp.send('');
    return xmlHttp.getResponseHeader("Date");
}

var st = srvTime();
var date = new Date(st);

/*$(function () {
  $.ajax({
    type: 'GET',
    cache: false,
    url: location.href,
    complete: function (req, textStatus) {
      var dateString = req.getResponseHeader('Date');
      if (dateString.indexOf('GMT') === -1) {
        dateString += ' GMT';
      }
      var date = new Date(dateString);
      $('#serverTime').text(date);
    }
  });
  var localDate = new Date();
  $('#localTime').text(localDate);
});*/