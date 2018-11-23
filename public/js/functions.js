$(document).ready(function() {
  $(this).scrollTop(0);

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
        var url = window.location.href.split('/form.php')[0];
        var shareURL = url + '/greeting.php?ref=' + lastSerial;
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
$('#form-previews input').on('change', function() {
  $('.card-preview').find('.card-preview-img').removeClass('border');
  if ($(this).is(':checked')) {
    $(this).closest('.card-preview').find('.card-preview-img').addClass('border');
  }
});
function copyLink() {
  var shareableLink = document.getElementById("shareable-link");
  shareableLink.select();
  document.execCommand("copy");
}
