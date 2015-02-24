<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> snippet in your web page.


    </head>
    <body>
      
        <script language="javascript" type="text/javascript">
$(document).ready(function(){
//alert('test');

function field_validator(tip,deger) {
 
var alphanumeric = /^[a-zA-Z0-9 ğüşıöçĞÜŞİÖÇ]+$/;
var numeric_withoutspace = /^[0-9]+$/;
var numeric = /^[0-9 ]+$/;
var alphabetic = /^[a-zA-Z ğüşıöçĞÜŞİÖÇ]+$/;
var email = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
 
switch (tip) {
case 'alphanumeric':
var result = alphanumeric.test(deger);
break;
case 'numeric':
var result = numeric.test(deger);
break;
case 'numeric_withoutspace':
var result = numeric_withoutspace.test(deger);
break;
case 'alphabetic':
var result = alphabetic.test(deger);
break;
case 'email':
var result = email.test(deger);
break;
case 'creditcard':
if ((deger.length == 16) && (numeric_withoutspace.test(deger))) {
var result = true;
}
break;
}
return result;
 
}
function required_field_control(contact_form) {
var flag = 1;
 
$('#'+contact_form).find(':input:not(:checkbox)').each(function(){
//alert( $(this).attr("zorunlu"));
if ($(this).attr("zorunlu") == 'yes') {
if ($(this).val().length <= 1) {
alert($(this).attr("mesaj"));
$(this).focus();
$(this).css('background-color','#EBB5B4');
flag = 0;
return false;}
else {
 
if ($(this).attr("tip")){ //tip tanımlaması varsa
var result = field_validator($(this).attr("tip"),$(this).val());
 
if (!result) {
alert($(this).attr("mesaj2"));
$(this).focus();
$(this).css('background-color','#EBB5B4');
flag = 0;
return false;
}
}
}
}
 
});
 

if (flag) {
$('#'+contact_form).find('textarea').each(function(){
 

if (($(this).attr("zorunlu") == 'yes') && ($(this).val() == '')) {
alert($(this).attr("mesaj"));
$(this).focus();
$(this).css('background-color','#EBB5B4');
flag = 0;
return false;
}
 
});
}

if (flag) {
$('#'+contact_form).find(':checkbox').each(function(){


if (($(this).attr("zorunlu") == 'yes') && (!$(this).is(":checked")) ){
alert($(this).attr("mesaj"));
$(this).focus();
$(this).css('background-color','#EBB5B4');
flag = 0;
return false;
}

});
}
 
 
return flag;
}
 

$("#kaydet").click(function () {
 

if (required_field_control('basvuru') ) {$( "#basvuru" ).submit();}
else return false;
});

            
        });
        </script>
        
        NOT sürüm: 2.1 xxx  (checkbox kontrol eklendi. checkbox hariç inputlar kontrol ediliyor. textareadan sonra checkboxlarda kontrol ediliyor.

        
        
        <form name="basvuru" id ="basvuru" method="PSOT" action="index.php">
            <input type="text" name="adi" zorunlu="yes" mesaj="AD alanı boş bırakılamaz" />
            <input type="radio" name="cinsiyet" value="kiz"/>
            <input type="radio" name="cinsiyet" value="erkek"/>
            
            <input type="button" id="kaydet" value="KAYDET" />
        </form>        
        
        
       
    </body>
</html>
