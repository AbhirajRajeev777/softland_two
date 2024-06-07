$().ready(function(){$("#SubmtBtn").click(function(){$(".error").hide();var hasError=!1;var emailReg=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;var userName=$("#userName").val();var CompName=$("#CompName").val();var userPhone=$("#userPhone").val();var emailaddressVal=$("#userEmail").val();var userMsg=$("#userMsg").val();if(userName==''&&CompName==''&&userPhone==''&&emailaddressVal==''&&userMsg==''){hasError=!0}
else if(!emailReg.test(emailaddressVal)){hasError=!0}
if(hasError==!0){$("#userName").attr("required",!0);$("#CompName").attr("required",!0);$("#userPhone").attr("required",!0);$("#userEmail").attr("required",!0);$("#userMsg").attr("required",!0);if(!emailReg.test(emailaddressVal)){alert("Please Enter the valid Email Address");$("#userEmail").attr("required",!0);return!1}
return $("#contackform").valid()}
return!0;if($("#contact-form").valid()==!0)
{return!0}
return!1})})