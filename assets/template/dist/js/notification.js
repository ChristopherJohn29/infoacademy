// Global variables to store fetched notifications and state.
var notificationsData = []; // stores the full list from AJAX
var notificationsLimit = 5; // limit to display initially
var showingAll = false;     // flag to indicate full list is shown

function fetchNotifications() {
  $.ajax({
    url: SITE_URL + "/notification/get_notifications",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      // Store the full notifications list.
      notificationsData = data;

      // Count only unread notifications (read_status == 0)
      var unreadCount = 0;
      $.each(data, function(index, notification) {
        if (notification.read_status == 0) {
          unreadCount++;
        }
      });
      $('#notification_count').text(unreadCount);
      $('#notification_header').text(unreadCount + ' Unread Notification' + (unreadCount !== 1 ? 's' : ''));

      // Build the notifications list
      buildNotificationList();
    },
    error: function(xhr, status, error) {
      console.error("Error fetching notifications:", error);
    }
  });
}

function buildNotificationList() {
  // Decide whether to show all notifications or just a limited number.
  var listData = (!showingAll && notificationsData.length > notificationsLimit) 
                   ? notificationsData.slice(0, notificationsLimit)
                   : notificationsData;
                   
  var notificationList = '';
  $.each(listData, function(index, notification) {
    notificationList += '<a href="' + notification.link + '" class="dropdown-item notification-item" data-id="' + notification.id + '">';
    notificationList += '<i class="fa fa-info-circle mr-2"></i> ' + notification.message;
    notificationList += '<span class="float-right text-muted text-sm">' + timeSince(new Date(notification.created_at)) + '</span>';
    notificationList += '</a>';
    if(index < listData.length - 1) {
      notificationList += '<div class="dropdown-divider"></div>';
    }
  });
  
  // Append the "See All Notifications" (or "Show Less") link if total exceeds the limit.
  if (notificationsData.length > notificationsLimit) {
    notificationList += '<div class="dropdown-divider"></div>';
    if (!showingAll) {
      notificationList += '<a href="#" class="dropdown-item dropdown-footer" id="see_all_notifications">See All Notifications</a>';
    } else {
      notificationList += '<a href="#" class="dropdown-item dropdown-footer" id="see_all_notifications">Show Less</a>';
    }
  }
  
  $('#notification_items').html(notificationList);
}

// Handle click on the "See All Notifications" link.
$(document).on('click', '#see_all_notifications', function(e) {
  e.preventDefault();
  showingAll = !showingAll; // Toggle state
  buildNotificationList();  // Rebuild the list to show all or limited notifications
});

// Poll every 5 seconds (adjust as needed)
setInterval(fetchNotifications, 5000);

// Initial call on page load
$(document).ready(function() {
  fetchNotifications();
});

// Utility: Convert a timestamp into a "time ago" format.
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

      console.log(response);
      return false;
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