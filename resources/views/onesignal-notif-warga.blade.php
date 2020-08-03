<!DOCTYPE html>
<html lang="en">
 <head>
  <title>One Signal Test</title>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}',
        }
    });
   });


  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    //Init APP ID
    OneSignal.init({
      appId: "f9cbb71a-cad1-44d0-9996-d5964a40a982",
    });
  });
</script>
</head>
<body>
  <h1>One Signal Test Warga</h1>

  <script>
    OneSignal.push(function() {
    //Store Players ID To DB
    OneSignal.on('subscriptionChange', function(isSubscribed) {

      if (isSubscribed) {

        OneSignal.getUserId( function(userId) {
           $.ajax({
                  url: "https://research.edi-indonesia.co.id/storePlayerIds",
                  type: "POST",
                  data: {
                    include_player_ids:userId,
                    user_id : '4'
                    } ,
                  success: function (response) {
                      console.log(response);
                  },
                  error: function(jqXHR, textStatus, errorThrown) {
                     console.log(textStatus, errorThrown);
                  }
              });
        });
        
      }
    });
  });

    // let external_user_id = "1";

    // OneSignal.push(function() {
    //   OneSignal.setExternalUserId(external_user_id);
    // });

    OneSignal.push(function() {
      OneSignal.sendTags({
        role: 'warga',
        idUser : '110',
      }, function(tagsSent) {
       console.log(tagsSent);
      });

      
    });
  </script>

  <script>
    OneSignal.push(function(){
        OneSignal.on('notificationDisplay', function(event) {
          console.log('OneSignal notification displayed:', event);
          console.log('OneSignal notification id:', event.id);
          console.log('OneSignal notification title:', event.heading);
          console.log('OneSignal notification content:', event.content);
          console.log('OneSignal notification url:', event.url);
          console.log('OneSignal notification icon:', event.icon);

        });
    });
  </script>
</body>
</html>
