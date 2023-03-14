<html>
 <head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="chatbot.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
 </head>
 <body> 
  <div class="chat-bot-full" id="ab">
   <div class=chatbot-head>
    <a href="" class="close">x</a>
    <h1 class="bot">Chatbot</h1>
   </div>
   <div class="chatbot">
    <div class="chatbot-whole">
    </div>  
   </div>  
   <div class="chatbot-bottom">
    <input type="text" placeholder="Type anything to start the bot" name="a" id="a">
    <!-- <input type="text"  id="aa"> -->
    <input type="submit" name="b" id="b" value="Send">
    <div id="c"></div>
   </div>
  </div>
  <div class="floating-bubble">
   <i class="fa-solid fa-robot" id="bot">
   </i>
  </div>
  <script>
   //toggle//
   function deselect(e) {
   $('.close').slideFadeToggle(function() {
   e.removeClass('selected');
   });    
   }

   $(function() {
   $('#bot').on('click', function() {
   if($(this).hasClass('selected')) {
   deselect($(this));               
   } else {
   $(this).addClass('selected');
   $('.chat-bot-full').slideFadeToggle();
   }
   return false;
   });
   });

   $.fn.slideFadeToggle = function(easing, callback) {
   return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
   };
   //chatbot//

   $(document).ready(function(){
   $("#b").on("click",function(){
   $value=$("#a").val();
   $msg= '<div class="chatbot-msg"><p> '+$value+' </p></div>';
   $(".chatbot-whole").append($msg);
   $("#a").val('');

   $.ajax({
   url:"chatbot1.php",
   type:"POST",
   data:{name: $value},
   success:function(result){
   $result=' <div class="chatbot-msg1"><p> '+ result +' </p></div>';
   $(".chatbot-whole").append($result);
   $(".chatbot").scrollTop($(".chatbot")[0].scrollHeight);
   
   }
   })
 
   });
   });


  </script> 
 </body>
</html>
