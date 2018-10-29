$(document).ready(function(){
  $(this).scrollTop(0);

  $('#sending-info-form').on('submit', function(e){
    e.preventDefault();
    var sender = $('#fsender').val();
    var receiver = $('#freceiver').val();
    var message = $('#fmessage').val();
    $.ajax({
      type: "POST",
      url: 'scripts/submit.php',
      data: {sender: sender, receiver: receiver, message: message},
      dataType: 'json',
      success: function(response) {
        var lastSerial = response.lastSerial;
        var url = window.location.href;
        var shareURL = url + 'tervehdys.php?ref=' + lastSerial;
        attachAddress(shareURL);
        $('#share-options').css('display','block');
      }
    });
  });
  var attachAddress = function(url) {
    $('#a2a_icons').attr('data-a2a-url', url);
    $('#shareable-link').attr('value', url);
  };
  $('.page-reload').click(function() {
      location.reload(true);
  });
});
function copyLink() {
  var shareableLink = document.getElementById("shareable-link");
  shareableLink.select();
  document.execCommand("copy");
}
