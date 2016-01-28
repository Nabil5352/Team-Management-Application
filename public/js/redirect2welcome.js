var timeout = 5; // in seconds

var msgContainer = $('#activemail').find('#activeredirecttxt'),
    msg = $('<span />').appendTo(msgContainer),
    dots = $('<span />').appendTo(msgContainer); 

var timeoutInterval = setInterval(function() {

   timeout--;

   msg.html(' in ' + timeout + ' seconds');

   if (timeout == 0) {
      clearInterval(timeoutInterval);
      window.location.replace("welcome");
   } 

}, 1000);

setInterval(function() {

  if (dots.html().length == 3) {
      dots.html('');
  }

  dots.html(function(i, oldHtml) { return oldHtml += '.' });
}, 500);