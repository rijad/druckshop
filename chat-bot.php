<!DOCTYPE html>
<html>
<head>
  <link href="../css/style.css" type="text/css" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <!--  <script type="text/javascript" src="../js/bot.js"></script> -->
  <script type="text/javascript" src="../js/onload.js"></script>
  <title></title>
</head> 
<body>

<!-- Display Enabled Bots -->
<div id='tags'> 

  <a href="https://www.facebook.com/messages/t/LeadKast" target="_blank"> FaceBook Messenger </a> 

  <a href="http://chatbot.trantorglobal.com/qrcode/" target="_blank"> View QR Code </a>

</div>
<!-- Display Enabled Bots ends -->


<!-- Outer Container -->
<div id='bodybox'> 
  <div class="chatbotHeader"> 
    <h3 id="chatlog8" class="inreoduction">&nbsp;</h3> 
    <span id="close" onclick="closeBot();">X</span>
  </div>
  <div class="chatBotWrapper">  
  <!-- inner Container -->
        <div id='chatborder'> 
          <div class="chatBotInner">
                  

                  <!-- Display answered questions -->
                  <div class="answered" style="display: none;" id="answered_1">

                   <div class="botPic"><img src="../images/admin.png" height="50px" width="50px" style="float:left;" class="admin" id="admin" name="admin_1"></div>
                   <div class="botQuestion"> <p id="question" class="question" name="question_1"></p>
                    <iframe id="ans_video" class="video" name="ansvideo_1" autoplay="false" width="250px" scrolling="no" frameborder="0"></iframe>
                  </div>
                   <div class="userResponse"> <p id="response" class="response" name="response_1"></p> <div class="userPic"><img src="../images/user.png" height="50px" width="50px" style="float: right;" class="user" id="user" name="user_1" /></div>
                    <div class='append_clone_response'></div>
                  </div><!-- response ends -->

                  </div>  
                  <!-- Display answered questions -->
                   
                <!-- Load New Question -->
                
                <div class="window" id="window_1">
                       <div class="botPic"><img src="../images/admin.png" height="50px" width="50px" class="admin" id="ad" name="ad_1"></div>
                       <div class="botQuestion">
                       <p id="chatlog" name="chatlog_1" class="chatlog" name="ad_1">&nbsp;</p>
                       <input type="text" name="input_1" id="input" class="chatbox" placeholder="Type here to talk to me." onfocus="placeHolder(this)" style="display:none;">
                       <iframe id="video" class="video" name="video_1" autoplay="false" width="250px" scrolling="no" frameborder="0" style="display: none;"></iframe>
                       <p id="button" name="button_1" class="button"></p>
                       <div class='append_clone'></div>
                     </div>
                 </div>
           
                 <!-- Load New Question ends-->

                 <!-- Typing Gif -->
                <div class="typing" id="typing"><span>Typing</span> <img src="../images/typing3.gif" /></div>
                 
              <!-- Lead Form and submit message-->
                  <div id="final" class="form" style="display:none;"> 
                    <p> Please Submit your Details. </p>
                    <form>
                      Name  <br/ > <input type="text" value="Name" id="lead_name" name="lead_name"><br/ >
                      Email<br/ ><input type="text" value="Email" id="lead_email" name="lead_email"><br/ >
                      Phone<br/ ><input type="text" value="Phone" id="lead_phone" name="lead_phone"><br/ > <br/ >
                      <button type="button" onclick="javascript:submit_bot();">Submit</button><br/ >
                    </form>

                  <div id="result" style="display:none;">Thank You! For your details.
                    <br>
                    Our Team Will Get Back to you soon.</div>
                </div>
                <!-- Lead Form and submit message ends -->
            </div>
        </div> <!-- inner Container ends -->
     </div> 
</div>  <!-- Outer Container ends -->
<?php 
if(isset($_GET['id']) && isset($_GET['name'])){
   $id = $_GET['id'];
   $name = $_GET['name'];

?>
<script type="text/javascript">
  displayBot(<?php echo $id ?>,'<?php echo $name ?>');
</script>

<?php }

?>

</body>
</html>