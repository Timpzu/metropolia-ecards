$(document).ready(function() {
  $('#create_form').on('submit', function(e){
    e.preventDefault();
    var user = $('#fuser').val();
    var sender = $('#fsender').val();
    var receiver = $('#freceiver').val();
    var message = $('#fmessage').val();
    var anim_id = $("input[name='animation']:checked").val();

    $.ajax({
      type: "POST",
      url: 'scripts/submit.php',
      data: {user: user, sender: sender, receiver: receiver, message: message, anim_id: anim_id},
      dataType: 'json',
      success: function(response) {
        var lastSerial = response.lastSerial;
        var url = window.location.href.split('/form.php')[0] + '/greeting.php?ref=' + lastSerial;
        appendURL(url);
        $('#main_content').attr('aria-hidden', 'true');
        $('#share-dialog').css('display','block');
        $('#share-dialog').attr('tabindex', '-1');
        $('#share-dialog').focus();
        
        const  focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
        const modal = document.querySelector('#share-dialog');

        const firstFocusableElement = modal.querySelectorAll(focusableElements)[0];
        const focusableContent = modal.querySelectorAll(focusableElements);
        const lastFocusableElement = focusableContent[focusableContent.length - 1];

        document.addEventListener('keydown', function(e) {
          let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
        
          if (!isTabPressed) {
            return;
          }
        
          if (e.shiftKey) {
            if (document.activeElement === firstFocusableElement) {
              lastFocusableElement.focus();
              e.preventDefault();
            }
          } else { 
            if (document.activeElement === lastFocusableElement) { 
              firstFocusableElement.focus();
              e.preventDefault();
            }
          }
        });

      }
    });
  });
  var appendURL = function(url) {
    $('#a2a_icons').attr('data-a2a-url', url);
    $('#share-link').attr('value', url);
  };
});
