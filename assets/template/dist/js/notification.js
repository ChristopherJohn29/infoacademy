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
        // Include data-id attribute so we know which notification was clicked
        notificationList += '<a href="' + notification.link + '" class="dropdown-item notification-item" data-id="' + notification.id + '">';
        notificationList += '<i class="fa fa-info-circle mr-2"></i> ' + notification.message;
        notificationList += '<span class="float-right text-muted text-sm">' + timeSince(new Date(notification.created_at)) + '</span>';
        notificationList += '</a>';
        if(index < data.length - 1) {
          notificationList += '<div class="dropdown-divider"></div>';
        }
      });
      $('#notification_items').html(notificationList);
    },
    error: function(xhr, status, error) {
      console.error("Error fetching notifications:", error);
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

// Bind click event to notification items to mark them as read
$(document).on('click', '.notification-item', function(e) {
  // Prevent the default action of following the link immediately.
  e.preventDefault();

  var notificationId = $(this).data('id');
  var link = $(this).attr('href');

  $.ajax({
    url: SITE_URL + "/notification/mark_read/" + notificationId,
    type: "POST",
    success: function(response) {
      // Optionally, update the UI or refetch notifications after marking as read.
      fetchNotifications();
      // Now navigate to the notification's link.
      window.location.href = link;
    },
    error: function(xhr, status, error) {
      console.error("Error marking notification as read:", error);
      // Optionally, still navigate to the link even if there's an error.
      window.location.href = link;
    }
  });
});
