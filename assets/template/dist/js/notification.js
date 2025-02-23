function fetchNotifications() {
    $.ajax({
      url: SITE_URL + "/notification/get_notifications",
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var count = data.length;
        $('#notification_count').text(count);
        $('#notification_header').text(count + ' Notification' + (count !== 1 ? 's' : ''));
        
        // Build the notification list dynamically
        var notificationList = '';
        $.each(data, function(index, notification) {
          notificationList += '<a href="' + notification.link + '" class="dropdown-item">';
          notificationList += '<i class="fa fa-info-circle mr-2"></i> ' + notification.message;
          notificationList += '<span class="float-right text-muted text-sm">' + timeSince(new Date(notification.created_at)) + '</span>';
          notificationList += '</a>';
          if(index < data.length - 1) {
            notificationList += '<div class="dropdown-divider"></div>';
          }
        });
        $('#notification_items').html(notificationList);
      }
    });
  }
  
  // Poll every 5 seconds (adjust as needed)
  setInterval(fetchNotifications, 5000);
  
  // Initial call on page load
  $(document).ready(function() {
    fetchNotifications();
  });
  
  // Utility: Convert timestamp into a "time ago" format
  function timeSince(date) {
    var seconds = Math.floor((new Date() - date) / 1000);
    var interval = Math.floor(seconds / 31536000);
    if (interval > 1) return interval + " years";
    interval = Math.floor(seconds / 2592000);
    if (interval > 1) return interval + " months";
    interval = Math.floor(seconds / 86400);
    if (interval > 1) return interval + " days";
    interval = Math.floor(seconds / 3600);
    if (interval > 1) return interval + " hours";
    interval = Math.floor(seconds / 60);
    if (interval > 1) return interval + " mins";
    return Math.floor(seconds) + " secs";
  }
  
$(document).on('click', '.notification-item', function(e) {
  // Prevent default link behavior if desired (or allow navigation)
  // e.preventDefault();

  var notificationId = $(this).data('id');
  
  $.ajax({
    url: SITE_URL + "/notification/mark_read/" + notificationId, // Assuming a RESTful URL scheme
    type: "POST",
    success: function(response) {
      // Optionally, update the UI or refetch notifications after marking as read.
      fetchNotifications();
    },
    error: function(xhr, status, error) {
      console.error("Error marking notification as read:", error);
    }
  });
});
  