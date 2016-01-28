var timeout = 10; // in seconds

var msgContainer = $('#warningmsg').find('#redirecttxt'),
    msg = $('<span />').appendTo(msgContainer),
    dots = $('<span />').appendTo(msgContainer); 

var timeoutInterval = setInterval(function() {

   timeout--;

   msg.html(' in ' + timeout + ' seconds');

   if (timeout == 0) {
      clearInterval(timeoutInterval);
      window.location.replace("/");
   } 

}, 1000);

setInterval(function() {

  if (dots.html().length == 3) {
      dots.html('');
  }

  dots.html(function(i, oldHtml) { return oldHtml += '.' });
}, 500);