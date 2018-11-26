$(document).ready(function() {
  $('#sending-info-form').on('submit', function(e){
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
        $('#share-options').css('display','block');
      }
    });
  });
  var appendURL = function(url) {
    $('#a2a_icons').attr('data-a2a-url', url);
    $('#shareable-link').attr('value', url);
  };
});
