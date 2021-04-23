<html>
<body style="margin:0;padding:0;">
  <div style="  
    border: 15px solid #f0f5fc;width: 100%;color:rgb(61 65 101);font-family: calibri;    box-sizing: border-box;">
  <div style="width: 100%;border-bottom:1px dashed #ddd;   box-sizing: border-box;">
    
  @yield('mail-content')
 
  <div style="border-top:1px dotted #ddd;padding-top: 10px;">
        Thanks, <br>
        {{ config('app.name') }}
        </div>
      </div>
    </div>
  </div>

  <div style="display: flex;align-items: center; text-align: center; margin:0;  box-sizing: border-box;width:100%;background:#5d83cc;padding:10px;color:#fff">
    <div style="margin: 0 auto;display: flex;">
    <img src="http://lyceex.com/images/logo.png" style="    width: 50px;margin-right:10px; "/>
    <div><div style="font-size: 20px;">Lyceex</div>
    <p style="margin: 5px 0;">@Copyright - Lyceex</p></div>
  </div>
  </div>
</div>
</body>
</html>