<style>
    .form-control{
        border: none;
        border-bottom: 3px solid var(--main);
        border-radius: 0px;
    }
</style>
<div class="container-fluid p-0 ">
    <div class="container-sm m-cent rounded  ps-4 pe-4  " style=" margin-bottom: 4em!important;">
        <div class="container-fluid p-0  bg-white border border-2  shadow-sm ">
                <div class="col-lg-6 m-cent pt-4" style="margin-bottom: 4em!important;">
                    <center>
                    <h1 class="text-main" style="font-size: 48px;"><i class="fa-duotone fa-users"></i></h1>
                    <h1 class=" text-main text-dark text-strongest">เข้าสู่ระบบ</h1>
                    </center>
                    <div class="container-fluid ps-0 pe-0  "  >
                        <div class="col-lg-8 m-cent">
                            <div class=" mb-3">
                                    <label class="text-secondary" >ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control form-control-lg   text-or"  id="user" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class=" mb-3">
                                    <label class="text-secondary">รหัสผ่าน</label>
                                    <input type="password" class="form-control  form-control-lg    text-or" id="pass" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <center>
                                    <div id="capcha" class="g-recaptcha" data-theme="light" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                </center>
                                <br>
                                <button class="btn bg-main   text-white  ps-4 pe-4  pt-2 pb-2 w-100 d-inline" id="btn_regis" ><i class="fa-solid fa-arrow-right"></i>&nbsp;เข้าสู่ระบบ</button>
                                
                                <center><p class="text-secondary  mt-3"   ><a href="?page=register" class="text-secondary " style="text-decoration: none;"><i class="fa-regular fa-user-plus"></i>&nbsp;สมัครสมาชิก</a></p></center>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script type="text/javascript">

    var onloadCallback = function() {
    grecaptcha.render('capcha', {
        'sitekey' : '<?php echo $conf['sitekey'];?>'
    });
    };
    $("#btn_regis").click(function(e) {
          e.preventDefault();
          var formData = new FormData();
          formData.append('user', $("#user").val());
          formData.append('pass', $("#pass").val());
          captcha = grecaptcha.getResponse();
          formData.append('captcha', captcha);
          $('#btn_regis').attr('disabled', 'disabled');
          $.ajax({
              type: 'POST',
              url: 'system/login.php',
              data:formData,
              contentType: false,
              processData: false,
          }).done(function(res){
              
              result = res;
              console.log(result);
              grecaptcha.reset();
              if(res.status == "success"){
                  Swal.fire({
                      icon: 'success',
                      title: 'สำเร็จ',
                      text: result.message
                  }).then(function() {
                          window.location = "?page=home";
                  });
              }
              if(res.status == "fail"){
                  Swal.fire({
                      icon: 'error',
                      title: 'ผิดพลาด',
                      text: result.message
                  });
                  $('#btn_regis').removeAttr('disabled');
              }
          }).fail(function(jqXHR){
              console.log(jqXHR);
            //   res = jqXHR.responseJSON;
              grecaptcha.reset();
              Swal.fire({
                  icon: 'error',
                  title: 'เกิดข้อผิดพลาด',
                  text: res.message
              })
              //console.clear();
              $('#btn_regis').removeAttr('disabled');
          });
    });
    $(function(){
        function rescaleCaptcha(){
            var width = $('.g-recaptcha').parent().width();
            var scale;
            if (width < 302) {
            scale = width / 302;
            } else{
            scale = 1.0; 
            }

            $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
            $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
            $('.g-recaptcha').css('transform-origin', '0 0');
            $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
        }

    rescaleCaptcha();
    $( window ).resize(function() { rescaleCaptcha(); });

    });
</script>