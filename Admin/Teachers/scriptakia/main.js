﻿



function SaveScrollPositions() {
     var x, y;

    if (self.pageYOffset) // all except Explorer
    {
            x = self.pageXOffset;
            y = self.pageYOffset;
    }
    else if (document.documentElement && document.documentElement.scrollTop)
            // Explorer 6 Strict
    {
            x = document.documentElement.scrollLeft;
            y = document.documentElement.scrollTop;
    }
    else if (document.body) // all other Explorers
    {
            x = document.body.scrollLeft;
            y = document.body.scrollTop;
    }
    document.forms[0].ScrollXcord.value = x;
    document.forms[0].ScrollYcord.value = y;

}

function RestoreScrollPosition() {
  //var x = document.forms[0].ScrollXcord.value;
  var y = document.forms[0].ScrollYcord.value;
  window.scrollTo(0, y);
}


// -----------------------------------------
// ----------- Validation Functions --------


function trim(str)
{
  return str.replace(/^\s+|\s+$/g, '')
};

//return selected index of obj or 0 if nothing is selected
function GetSelectedIndex(obj)
{
  if (obj.length >1)
  {
    for (var i=0; i<obj.length; i++) {
	if (obj[i].checked)  return obj[i].value;
    }
  }
  if (obj.checked)
    return obj.value;

  return 0;
}

// ----------- On Submit Validation -------

function SelectNone(tableName)
{
 var table = document.getElementById(tableName);
 var tds = table.getElementsByTagName('td');

 for (var i=0; i<tds.length; i++)
 {
  if (tds[i].id !='') {
   tds[i].className = 'white';
  }
 }
}

//counts 0 as blank
function SubmitFormIfSelected(frm,selField,nextAct,msg){
  if ((selField.value=='')||(selField.value=='0')){
    alert(msg);
    return false;
  } else {
    frm.act.value = nextAct;
    frm.submit();
    return true;
  }
}

//does not count 0 as blank
function SubmitFormIfSelected2(frm,selField,nextAct,msg){
  if (selField.value==''){
    alert(msg);
    return false;
  } else {
    frm.act.value = nextAct;
    frm.submit();
    return true;
  }
}

function SubmitFormIfSelectedAndConfirm(frm,selField,nextAct,emptyMsg,confirmMsg){
  if ((selField.value=='')||(selField.value=='0')){
    alert(emptyMsg);
    return false;
  } else if (confirm(confirmMsg)) {
    frm.act.value = nextAct;
    frm.submit();
    return true;
  }
  return false;
}

//does not count 0 as blank
function CheckRequiredFields(obj,msg)
{
  result = true;
  for (i=0,n=obj.elements.length;i<n;i++)
  {
    if (obj.elements[i].getAttribute('required') == 1)
    {
      if ((obj.elements[i].value == '')) {
        var myid = obj.elements[i].getAttribute('name');
        var td = document.getElementById(myid);
        td.className = 'TableControlsTitleRequired';
        result = false;
      }else{
        var myid = obj.elements[i].getAttribute('name');
        var td = document.getElementById(myid);
        td.className = 'TableControlsTitle';
      }

    }
  }
  return result;
}

//counts 0 as blank
function CheckRequiredFieldsAndCombos(obj)
{
  result = true;
  for (i=0,n=obj.elements.length;i<n;i++)
  {
    if (obj.elements[i].getAttribute('required') == 1)
    {
      if ((obj.elements[i].value == '')||(obj.elements[i].value == 0)) {
        var myid = obj.elements[i].getAttribute('name');
        var td = document.getElementById(myid);
        td.className = 'TableControlsTitleRequired';
        result = false;
      } else {
        var myid = obj.elements[i].getAttribute('name');
        var td = document.getElementById(myid);
        td.className = 'TableControlsTitle';
      }

    }
  }

  if (!result) alert('Πρέπει να συμπληρώσετε όλα τα υποχρεωτικά πεδία!');
  return result;
}


//does not count 0 as blank
function CheckProgramPeopleReplaceForms(propertymsg,peoplemsg,gridmsg)
{
  var result = false;
  result = CheckRequiredFields(document.forms[1],propertymsg);
  if(result == false)
    return result;
  result = CheckRequiredFields(document.forms[2],peoplemsg);
  if(result == false)
    return result;
  result = CheckAtLeastOneSelected(document.forms[3].programs,gridmsg);

  return result;
}


//counts 0 as blank
function CheckRequiredFields2(obj,msg)
{
  result = true;
  for (i=0,n=obj.elements.length;i<n;i++)
  {
    if (obj.elements[i].getAttribute('required') == 1)
    {
      if ((obj.elements[i].value == '')||(obj.elements[i].value == '0')) {
        var myid = obj.elements[i].getAttribute('name');
        var td = document.getElementById(myid);
        td.className = 'TableControlsTitleRequired';
        result = false;
      }else{
        var myid = obj.elements[i].getAttribute('name');
        var td = document.getElementById(myid);
        td.className = 'TableControlsTitle';
      }

    }
  }
  return result;
}


function CheckAtLeastOneRequiredFields(obj,msg)
{
  sumReq = 0;
  for (i=0,n=obj.elements.length;i<n;i++)
  {
    if (obj.elements[i].getAttribute('required') == 1)
    {
      if ((obj.elements[i].value != '')&&(obj.elements[i].value != '0')) {
        return true;
      } else {
        sumReq++;
      }
    }
  }

//if there were no required fields return true
  if (sumReq==0){
    return true;
  } else {
    alert(msg);
    return false;
  }
}

//check if at least one of obj is checked/selected
function CheckAtLeastOneSelected(obj,msg){
  if (obj.length >1)
  {
    for (var i=0; i<obj.length; i++) {
	if (obj[i].checked)
            return true;
    }
  }
  if (obj.checked)
    return true;

  if (msg.length!=0)
    alert(msg);

  return false;
}

//checks that no 2 elements in the form have the same value
function CheckNoTwoSameItems(frm,msg){
  var arr = new Array();
  for (i=0,n=frm.elements.length;i<n;i++){
    arr.push(frm.elements[i].value);
  }
  arr.sort();
  for (i=0;i<arr.length-1;i++){
    if (arr[i]==arr[i+1]){
      alert(msg);
      return false;
    }
  }
  return true;
}

//checks if all the input boxes of a PrioritiesSelection box are filled
function CheckPrioritiesSelectionFull(obj,fieldname,msg){
  for (i=0,n=obj.elements.length; i<n; i++){
    //if form element names contains fieldname, it is 1 of the input boxes of a PrioritiesSelection. Check it
    if (obj.elements[i].getAttribute('name').indexOf(fieldname)!=-1){
      if (obj.elements[i].value==''){
        alert(msg);
        return false;
      }
    }
  }
  return true;
}


function CheckProgramPeople(frm, msgSame, msgMissing){


  for (i=0,n=frm.elements.length;i<n;i++)
  {
    if (frm.elements[i].getAttribute('required') == 1)
    {
      if ((frm.elements[i].value == '') || (frm.elements[i].value == 0)) {
        alert(msgMissing);
        return false;
      }
    }
  }

  if(frm.examRespStID.value == frm.examRespAltID.value){
    alert(msgSame);
    return false;
  }
  if(frm.techRespStID.value == frm.techRespAltID.value){
    alert(msgSame);
    return false;
  }
  return true;
}

function CheckRadioSelected(obj,msg){

   if (obj.value!=0)
    return true;

   alert(msg);
   return false;
}

function ComparePasswords(password1,password2,msg)
{
  if (password1.value==password2.value){
    var td1 = document.getElementById(password1);
    td1.className = 'TableControlsTitle';
    var td2 = document.getElementById(password2);
    td2.className = 'TableControlsTitle';
    return true;
  } else {
    alert(msg);
    password1.value = '';
    password2.value = '';
    var td1 = document.getElementById(password1.name);
    td1.className = 'TableControlsTitleRequired';
    var td2 = document.getElementById(password2.name);
    td2.className = 'TableControlsTitleRequired';
    return false;
  }
}

function validateProto(obj){
var protoNo = obj.value;
var pos=protoNo.indexOf('-');
var date = protoNo.substring(0,pos);
var id = protoNo.substring(pos+1)

var resultDate = isDate(date);

var telnr = /[0-9]/
var resultid = telnr.test(id);
  if(resultDate & resultid){
    return true;
  }else{
    alert("Ο αριθμός Πρωτοκόλλου που δώσατε δεν είναι έγκυρος");
    obj.select();
    obj.focus();
    obj.value = "";
    return false;
  }
}

// Added by Nicolas for date comparison (18/6/2007)
/*
The format string consists of the following abbreviations:

Field        | Full Form          | Short Form
-------------|--------------------|-----------------------
Year         | yyyy (4 digits)    | yy (2 digits), y (2 or 4 digits)
Month        | MMM (name or abbr.)| MM (2 digits), M (1 or 2 digits)
             | NNN (abbr.)        |
Day of Month | dd (2 digits)      | d (1 or 2 digits)
Day of Week  | EE (name)          | E (abbr)
Hour (1-12)  | hh (2 digits)      | h (1 or 2 digits)
Hour (0-23)  | HH (2 digits)      | H (1 or 2 digits)
Hour (0-11)  | KK (2 digits)      | K (1 or 2 digits)
Hour (1-24)  | kk (2 digits)      | k (1 or 2 digits)
Minute       | mm (2 digits)      | m (1 or 2 digits)
Second       | ss (2 digits)      | s (1 or 2 digits)
AM/PM        | a                  |
*/
function getDateFromFormat(val,format) {
  val=val+"";
  format=format+"";
  var i_val=0;
  var i_format=0;
  var c="";
  var token="";
  var token2="";
  var x,y;
  var now=new Date();
  var year=now.getYear();
  var month=now.getMonth()+1;
  var date=1;
  var hh=now.getHours();
  var mm=now.getMinutes();
  var ss=now.getSeconds();
  var ampm="";

  while (i_format < format.length) {
    // Get next token from format string
    c=format.charAt(i_format);
    token="";
    while ((format.charAt(i_format)==c) && (i_format < format.length)) {
    	token += format.charAt(i_format++);
			}
	// Extract contents of value based on format token
	if (token=="yyyy" || token=="yy" || token=="y") {
	    if (token=="yyyy") { x=4;y=4; }
            if (token=="yy")   { x=2;y=2; }
            if (token=="y")    { x=2;y=4; }
            	year=_getInt(val,i_val,x,y);
              	if (year==null) { return 0; }
              	i_val += year.length;
              	if (year.length==2) {
          		if (year > 70) { year=1900+(year-0); }
      			else { year=2000+(year-0); }
      			}
      		}
      	else if (token=="MMM"||token=="NNN"){
      		month=0;
      		for (var i=0; i<MONTH_NAMES.length; i++) {
      			var month_name=MONTH_NAMES[i];
      			if (val.substring(i_val,i_val+month_name.length).toLowerCase()==month_name.toLowerCase()) {
      				if (token=="MMM"||(token=="NNN"&&i>11)) {
      					month=i+1;
      					if (month>12) { month -= 12; }
      					i_val += month_name.length;
      					break;
      					}
      				}
      			}
      		if ((month < 1)||(month>12)){return 0;}
      		}
      	else if (token=="EE"||token=="E"){
      		for (var i=0; i<DAY_NAMES.length; i++) {
      			var day_name=DAY_NAMES[i];
      			if (val.substring(i_val,i_val+day_name.length).toLowerCase()==day_name.toLowerCase()) {
      				i_val += day_name.length;
      				break;
      				}
      			}
      		}
      	else if (token=="MM"||token=="M") {
      		month=_getInt(val,i_val,token.length,2);
      		if(month==null||(month<1)||(month>12)){return 0;}
      		i_val+=month.length;}
      	else if (token=="dd"||token=="d") {
      		date=_getInt(val,i_val,token.length,2);
      		if(date==null||(date<1)||(date>31)){return 0;}
      		i_val+=date.length;}
      	else if (token=="hh"||token=="h") {
      		hh=_getInt(val,i_val,token.length,2);
      		if(hh==null||(hh<1)||(hh>12)){return 0;}
      		i_val+=hh.length;}
      	else if (token=="HH"||token=="H") {
      		hh=_getInt(val,i_val,token.length,2);
      		if(hh==null||(hh<0)||(hh>23)){return 0;}
      		i_val+=hh.length;}
      	else if (token=="KK"||token=="K") {
      		hh=_getInt(val,i_val,token.length,2);
      		if(hh==null||(hh<0)||(hh>11)){return 0;}
      		i_val+=hh.length;}
      	else if (token=="kk"||token=="k") {
      		hh=_getInt(val,i_val,token.length,2);
      		if(hh==null||(hh<1)||(hh>24)){return 0;}
      		i_val+=hh.length;hh--;}
      	else if (token=="mm"||token=="m") {
      		mm=_getInt(val,i_val,token.length,2);
      		if(mm==null||(mm<0)||(mm>59)){return 0;}
      		i_val+=mm.length;}
      	else if (token=="ss"||token=="s") {
      		ss=_getInt(val,i_val,token.length,2);
      		if(ss==null||(ss<0)||(ss>59)){return 0;}
      		i_val+=ss.length;}
      	else if (token=="a") {
      		if (val.substring(i_val,i_val+2).toLowerCase()=="am") {ampm="AM";}
      		else if (val.substring(i_val,i_val+2).toLowerCase()=="pm") {ampm="PM";}
      		else {return 0;}
      		i_val+=2;}
      	else {
      		if (val.substring(i_val,i_val+token.length)!=token) {return 0;}
      		else {i_val+=token.length;}
      		}
      	}
      // If there are any trailing characters left in the value, it doesn't match
      if (i_val != val.length) { return 0; }
      // Is date valid for month?
      if (month==2) {
      	// Check for leap year
      	if ( ( (year%4==0)&&(year%100 != 0) ) || (year%400==0) ) { // leap year
      		if (date > 29){ return 0; }
      		}
      	else { if (date > 28) { return 0; } }
      	}
      if ((month==4)||(month==6)||(month==9)||(month==11)) {
      	if (date > 30) { return 0; }
      	}
      // Correct hours value
      if (hh<12 && ampm=="PM") { hh=hh-0+12; }
      else if (hh>11 && ampm=="AM") { hh-=12; }
      var newdate=new Date(year,month-1,date,hh,mm,ss);
      return newdate.getTime();
}
function _getInt(str,i,minlength,maxlength) {
  for (var x=maxlength; x>=minlength; x--) {
	var token=str.substring(i,i+x);
	if (token.length < minlength) { return null; }
	if (_isInteger(token)) { return token; }
	}
  return null;
}
function _isInteger(val) {
  var digits="1234567890";
  for (var i=0; i < val.length; i++) {
  if (digits.indexOf(val.charAt(i))==-1) { return false; }		}
  return true;
}
function compareDates(date1,dateformat1,date2,dateformat2) {
  var d1=getDateFromFormat(date1,dateformat1);
  var d2=getDateFromFormat(date2,dateformat2);
  if (d1==0 || d2==0) {
    return -1;
  }
  else if (d1 > d2) {
    return 1;
  }
  return 0;
}
/////

//gets the date difference date2 - date1. diffFormat determines the result (days, hours, minutes etc)
function dateDiff(date1, dateformat1, date2, dateformat2, diffFormat){
  var d1=getDateFromFormat(date1,dateformat1);
  var d2=getDateFromFormat(date2,dateformat2);

  msecs = d2 - d1;
  switch(diffFormat){
    case "d": //days
      return msecs / 86400000;
    case "H": //hours
      return msecs / 3600000;
    case "m": //minutes
      return msecs / 60000;
    case "s": //seconds
      return msecs / 1000;
    default:
      return msecs;
  }
}

function isDate (myDate) {
	sep ='/';

if (myDate.length !=0) {
    if (myDate.length == 10) {
        if (myDate.substring(2,3) == sep && myDate.substring(5,6) == sep) {
            var date  = myDate.substring(0,2);
            var month = myDate.substring(3,5);
            var year  = myDate.substring(6,10);
            var test = new Date(year,month-1,date);
            if (year == y2k(test.getYear()) && (month-1 == test.getMonth()) && (date == test.getDate())) {
                return true;
            }
            else {
                 return false;
            }
        }
        else {
	   return false;
        }
    }
    else {
       return false;
    }
    return true;
 }
 return false;
}

function validateDateTime(myDate)
{
	if (myDate.value.length !=0) {
	    if (myDate.value.length <= 10) {
               return isValidDate(myDate);
            } else {
		return isValidDateTime(myDate);
            }
	}
	return true;
}

function isValidDateTime (myDate) {
    sep ='/';

if (myDate.value.length !=0) {
    if (myDate.value.length <= 16) {
        if (myDate.value.substring(2,3) == sep &&
myDate.value.substring(5,6) == sep) {
            var date  = myDate.value.substring(0,2);
            var month = myDate.value.substring(3,5);
            var year  = myDate.value.substring(6,10);
            var h = myDate.value.substring(11,13);
            var m = myDate.value.substring(14,16);
            var hsep = myDate.value.substring(13,14);

            var test = new Date(year,month-1,date);
            if (year == y2k(test.getYear()) && (month-1 ==
test.getMonth()) && (date == test.getDate())) {
            if (hsep != ':') {
                alert('Η ημερομηνία πρέπει να είναι της μορφής ΗΗ/ΜΜ/ΕΕΕΕ ΩΩ:ΛΛ');
                myDate.select();
                myDate.focus();
                mydate.value="";
                return false;
            }

            if ((h > 23) || (h<0) || (m>59) || (m<0))
            {
                alert('Η Ώρα δεν είναι σωστή');
                myDate.select();
                   myDate.focus();
                return false;
            }

                return true;
            }
            else {
                alert('Η ημερομηνία δεν είναι σωστή');
                myDate.select();
                   myDate.focus();
                return false;
            }

        }
        else {
            alert('Η ημερομηνία πρέπει να είναι της μορφής ΗΗ/ΜΜ/ΕΕΕΕ ΩΩ:ΛΛ');
            myDate.select();
            myDate.focus();
            return false;
        }
    }
    else {
        alert('Η ημερομηνία πρέπει να είναι της μορφής ΗΗ/ΜΜ/ΕΕΕΕ ΩΩ:ΛΛ');
        myDate.select();
        myDate.focus();
        return false;
    }
 }
}



function validateTime(myTime)
{
	if (myTime.value.length !=0)
        {
	    if (myTime.value.length <= 5)
            {
		  var goodTime = myTime.value.match(/^(24):(00)|([01][0-9]|2[0-3]):([0-5][0-9])$/);
                  if (goodTime)
                    return true;
	    }
            alert('Η ώρα δεν είναι σωστή');
            myTime.select();
            myTime.focus();
            myTime.value = "";
            return false;
	}

}

function y2k(number) { return (number < 1000) ? number + 1900 : number; }

function isValidDate (myDate) {
	if (myDate.value=="") return true;

	sep ='/';
	var arr = myDate.value.split(sep);
	if (arr.length == 3) {
		var date = arr[0];
		var month = arr[1];
		var year = arr[2];

               if (year < 1754){
	        	alert('Η ημερομηνία δεν είναι έγκυρη');
		        myDate.select();
	        	myDate.focus();
		        return false;
		}

		if (date.length > 2 || month.length > 2 || year.length > 4){
	        	alert('Η ημερομηνία πρέπει να είναι της μορφής ΗΗ/ΜΜ/ΕΕΕΕ');
		        myDate.select();
	        	myDate.focus();
		        return false;
		}

	        var test = new Date(year,month-1,date);
        	if (year == y2k(test.getYear()) && (month-1 == test.getMonth()) && (date == test.getDate())) {
        		//add a zero to month and date if they are 1-digit numbers
	        	if (month.length == 1){
        			month = "0" + month;
        		}
	        	if (date.length == 1){
        			date = "0" + date;
        		}
	        	myDate.value = date + sep + month + sep + year;
        		return true;
	        } else {
        		alert('Η ημερομηνία δεν είναι σωστή');
		        myDate.select();
		        myDate.focus();
		        return false;
	        }
	} else {
        	alert('Η ημερομηνία πρέπει να είναι της μορφής ΗΗ/ΜΜ/ΕΕΕΕ');
	        myDate.select();
        	myDate.focus();
	        return false;
	}//if length

}

function isBeforeToday(obj,msg){
  val = obj.value;
  var arr = val.split("/");
  var today = new Date();
  var myDate = new Date();
  myDate.setFullYear(arr[2],arr[1]-1,arr[0]);
  if (myDate>today){
    alert(msg);
    obj.select();
    obj.focus();
    obj.value='';
    return false;
  } else {
    return true;
  }
}

function formatDate(obj){
  olddate = obj.value;
  newdate = "";
  var arr = olddate.split("/");
  if (arr.length==3){
    for (i=0;i<2;i++){
      if (arr[i].length > 2){
//        alert("wrong date");
        return;
      } else {
        if (arr[i].length==1){
          newdate += "0";
        }
        newdate += arr[i] + "/";
      }
    }

    if (arr[2].length==4){
      newdate += arr[2];
    } else {
//      alert("wrong date");
      return;
    }

    obj.value = newdate;
  }/* else {
    alert("wrong date");
  }*/
}



function validateEmailAddress(obj)
{
     strEmail = obj.value;
     // Note: The next expression must be all on one line...
     //       allow no spaces, linefeeds, or carriage returns!
    var goodEmail = strEmail.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,2}))$)\b/gi);
    if (goodEmail){
       return true;
    } else {
       alert('Παρακαλούμε συμπληρώστε σωστά τη διεύθυνση email!')
       obj.select();
       obj.focus();
       obj.value = "";
       return false;
    }
  }

function validateTelnr (obj)
{
  var tfld = trim(obj.value);  // value of field with whitespace trimmed off
  var telnr = /^\+?[0-9 ()-]+[0-9]$/
  if ((!telnr.test(tfld))&&(tfld.length > 0)) {
    alert("Ο αριθμός τηλεφώνου δεν είναι σωστος");
    obj.select();
    obj.focus();
    obj.value = "";
    return false;
  }

  var numdigits = 0;
  for (var j=0; j<tfld.length; j++)
    if (tfld.charAt(j)>='0' && tfld.charAt(j)<='9') numdigits++;

   if ((numdigits<10)&&(numdigits!=0)) {
    alert ("Λίγα ψηφία");
    obj.select();
    obj.focus();
    obj.value = "";
    return false;
   }

  return true;
};



function validateId(obj,type)
{
  var expr;
  var tfld = trim(obj.value);  // value of field with whitespace trimmed off

  if(type == 1){
    expr = /[Α-Ω]\d\d\d\d\d\d/;
  }
  if(type == 2){
    expr = /[A-Z]\d\d\d\d\d\d/;
  }


  if (tfld==""){
    return true;
  }
  if (tfld.length > 7) {
    if ((type==1) && (tfld.length==8)){
    //check for new ids - 2 letters and 6 digits
      expr = /[Α-Ω][Α-Ω]\d\d\d\d\d\d/;
    } else {
      alert("Πολλοί χαρακτήρες");
      obj.select();
      obj.focus();
      obj.value = "";
      return false;
    }
  }
  if(!expr.test(tfld)){
    if(type==1){
      alert("Παρακαλούμε συμπληρώστε με κεφαλαίους Ελληνικούς χαρακτήρες! Επιτρέπονται μέχρι 2 χαρακτήρες και 6 ακριβώς αριθμοί!");
    }
    if(type==2){
      alert("Ο αριθμός διαβατηρίου δεν είναι έγκυρος!");
    }

    obj.select();
    obj.focus();
    obj.value = "";
    return false;
  }
 return true;

}


function validateAM (obj,minima)

{

amval = obj.value;

if (amval.length != 6) {
        alert('O ΑMM πρέπει να έχει 6 ψηφία ');
        obj.select();
        obj.focus();
        obj.value = "";
        return false;
}



am_first =parseInt(amval.charAt(0));
  if ((am_first == 0) || (am_first == 8) || (am_first > 9) || (am_first == 0)) {
                alert('O ΑMM που δηλώσατε δεν είναι έγκυρος ');
                obj.select();
                obj.focus();
                obj.value = "";
                return false;

        }

 return true;

}

function validateAFM (obj)
{
       str = obj.value;
       if (str.length =='') return true;
       if (str.length != 9) {
           alert('Το ΑΦΜ πρέπει να έχει 9 ψηφία ');
           obj.select();
           obj.focus();
           obj.value = "";
           return false;
      }

       if (str.length == 9) {
           A1 = parseInt(str.charAt(0),10);
           A2 = parseInt(str.charAt(1),10);
           A3 = parseInt(str.charAt(2),10);
           A4 = parseInt(str.charAt(3),10);
           A5 = parseInt(str.charAt(4),10);
           A6 = parseInt(str.charAt(5),10);
           A7 = parseInt(str.charAt(6),10);
           A8 = parseInt(str.charAt(7),10);
           A9 = parseInt(str.charAt(8),10);
           S  = (256*A1)+(128*A2)+(64*A3)+(32*A4)+(16*A5)+(8*A6)+(4*A7)+(2*A8);
           Y = (S%11);
           if (Y == 10) {
               if (A9 != 0) {
                   alert('Το ΑΦΜ που δηλώσατε δεν είναι έγκυρο ');
                   obj.select();
                   obj.focus();
                   obj.value = "";
                   return false;
               }
           } else {
			   	if (A9 != Y)  {
                   alert('Το ΑΦΜ που δηλώσατε δεν είναι έγκυρο ');
                   obj.select();
                   obj.focus();
                   obj.value = "";
                   return false;
                 }
           }
       }
       return true;
}

function validateCreditCard(s) {
  var v = "0123456789";
  var w = "";
  for (var i=0; i < s.length; i++) {
    x = s.charAt(i);
    if (v.indexOf(x,0) != -1)
    w += x;
  }
  var j = w.length / 2;
  if (j < 6.5 || j > 8 || j == 7) return false;
  var k = Math.floor(j);
  var m = Math.ceil(j) - k;
  var c = 0;
  for (var i=0; i<k; i++) {
    a = w.charAt(i*2+m) * 2;
    c += a > 9 ? Math.floor(a/10 + a%10) : a;
  }
  for (var i=0; i<k+m; i++) c += w.charAt(i*2+1-m) * 1;
  return (c%10 == 0);
}


//---------------- On Key Press Validation ---------

function onKeyValidate(e,reg,msg, allowShift){
  var key;

  pattern = new RegExp(reg);
  if (document.layers)
    var key = e.which;
  else if (document.all)
    var key = e.keyCode;
  else
    var key = e.charCode;
  //alert(key);
  if (isNaN(key)) return true;

  keychar = String.fromCharCode(key);

 // check for backspace or delete, or if Ctrl was pressed
 if (allowShift){
   if(e.shiftKey) return true;
   if(e.ctrlKey)  return false;
}
else {
  if(e.shiftKey || e.ctrlKey) return false;
}

  if ( (key == 0) || (key == 9) || (key == 8) || (key == 10) || (key == 13) || (key == 16) || (key == 17) || (key == 27) || (key == 37) || (key == 40)||(key == 127))
  {
    return true;
  }
  if(key==39||key==222||key==63){
    return false;
  }
//alert(keychar);
  var t = pattern.test(keychar);
  if(!t) alert(msg);

  return t;
}



function onKeyValidate2(e,reg,msg){
  var key;

 // check for backspace or delete, or if Ctrl was pressed
 if(e.shiftKey){
    return TestKey(e,reg,msg);
}

if (e.ctrlKey){
  return true;
}

  return TestKey(e,reg,msg);
}

function TestKey(e,reg,msg){
  pattern = new RegExp(reg);

  if (document.layers)
    var key = e.which;
  else if (document.all)
    var key = e.keyCode;
  else
    var key = e.charCode;

  if (isNaN(key)) return true;

  keychar = String.fromCharCode(key);
  if ( (key == 0) || (key == 9) || (key == 8) || (key == 10) || (key == 13) || (key == 16) || (key == 17) || (key == 27) || (key == 127))
  {
    return true;
  }
  var t = pattern.test(keychar);
  if(!t) alert(msg);
  return t;
}

// -----------Disable F5 and Refresh ------------------------
function showDown(evt) {
  evt = (evt)? evt : ((event)? event : null);

  if (!evt) var evt = window.event
  if (evt.keyCode) key = evt.keyCode;
  else if (evt.which) key = evt.which;

  if (evt) {
    if (key == 8 && (evt.srcElement.type!= "text" && evt.srcElement.type!= "textarea" && evt.srcElement.type!= "password")) {
      // When backspace is pressed but not in form element
      cancelKey(evt);
    }
    else if (key == 116) {
      // When F5 is pressed
      cancelKey(evt);
    }
    else if (key == 122) {
     // When F11 is pressed
      cancelKey(evt);
    }
    else if (evt.ctrlKey && (key == 78 || key == 82)) {
      // When ctrl is pressed with R or N
      cancelKey(evt);
    }
    else if (evt.altKey && key==37 ) {
      // stop Alt left cursor
      return false;
    }
  }
}

function cancelKey(evt) {
  if (evt.preventDefault) {
    evt.preventDefault();
    evt.keyCode = 0;
    evt.returnValue = false;
    return false;
  }else {
    evt.keyCode = 0;
    evt.returnValue = false;
  }
}


// ----------------------------------------------
function RedirectHilighted(obj)
{
  formXX.selected_link.value=obj;
  formXX.submit();
}

function setSelected(frm,str){
  frm.selected.value = str;
}

function win_popup(mypage,name) {
   popupWindow=window.open(mypage,name,"location=no,menubar=no,scrollbars=yes,width=600,height=300,toolbar=no,screenX=300,screenY=300,resizable=yes");

if (!popupWindow) {
  alert('Παρουσιάστηκε πρόβλημα στην εμφάνιση αναδυόμενου παραθύρου (popup window). Παρακαλούμε όπως απενεργοποιήσετε την υπηρεσία Popup Blocking του φυλλομετρητή που χρησιμοποιείτε');
}

return false;
}

function calendar_popup(mypage,name) {

window.open(mypage,name,"location=no,menubar=no,scrollbars=no,width=396,height=270,toolbar=no,screenX=700px,screenY=430px,resizable=no");
    return false;
}

function addDatetoInput(win,frmname,ControlName,id,val){
      theform = win.document.forms[frmname];
      theformname=theform.name;
      //alert(theform.name);
      thecontrol = theform.elements[ControlName];
      //alert(thecontrol);
      //alert(ControlName);
      thecontrol.value=val;
}

function win_new(mypage,name) {
    window.open(mypage,name,"location=yes,menubar=yes,scrollbars=yes,width=800,height=600,toolbar=yes,screenX=300,screenY=300,resizable=yes");
}

function CheckRadios(obj,action)
{

  var check=new Array();
  var nam=new Array();
  var val=new Array();
   var people="";
  k=0;
  result = true;
  for (i=0,n=obj.elements.length;i<n;i++)
  {

    if (obj.elements[i].type == 'radio')
    {
      check[k]=obj.elements[i].checked;
      val[k]=obj.elements[i].value;
      nam[k]=obj.elements[i].name;
      k++;
    }

  }

  for(j=0;j<k-1;j++)
  {
    if(nam[j]==nam[j+1])
    {
      if(!check[j] && !check[j+1])
      {
        if(nam[j]=='rd1'){
          people="Υπεύθυνο Εξέτασης"
        }
         if(nam[j]=='rd2'){
          people="Τεχνικό Υπεύθυνο"
        }

        alert('Παρακαλούμε καταχωρίστε παρουσία για '+people+'!!')
        return;

      }

    }
  }


  obj.act.value=action;
  obj.submit();

}

//functions for priorities selection box
function rankthis(code, value, size, form){

  index=form.CHOICES.selectedIndex;
  form.CHOICES.selectedIndex=-1;
  for (i=1; i<=size; i++){
    b=i;
    b += '';
    inputname="RANK_"+b;
    hiddenname="fvalue_"+b;
    cutname="cut_"+i;
    alert
    document.getElementById(cutname).style.display='none';
    if (!document.getElementById(inputname).value){
      document.getElementById(inputname).value=value;
      document.getElementById(hiddenname).value=code;
      document.getElementById(cutname).style.display='';
      for (var b=document.getElementById('CHOICES').options.length-1; b>=0; b--){
        if (document.getElementById('CHOICES').options[b].value == code){
          document.getElementById('CHOICES').options[b] = null;
        }
      }
      i=size;
    }
  }

}

function deletethis(text, value, name, thisname){
  var lngth=4;
  var cutindex=thisname.substring(lngth, thisname.length);
  cutindex=parseFloat(cutindex);
  document.getElementById(name).value='';
  document.getElementById(thisname).style.display='none';
  if (cutindex > 1){
    cut1name="cut_"+(cutindex-1);
    cut2name="fvalue_"+(cutindex);
    document.getElementById(cut1name).style.display='';
    document.getElementById(cut2name).value='';
  }else{
    cut2name="fvalue_"+(cutindex);
    document.getElementById(cut2name).value='';
  }
  var i=document.getElementById('CHOICES').options.length;
  document.getElementById('CHOICES').options[i] = new Option(text, value);
  if (document.getElementById('CHOICES').options.length > 0){
    document.getElementById('CHOICES').disabled=false;
  }
}



function CheckForSameValues(obj,field2,msg){

  if(obj.value == field2){
    obj.value='';
    alert(msg);
    return false;
  }
  return true;
}

 function checkFileToUpload(RightValue,InputValue,fileSuffix)
 {
   var filename=RightValue+"."+fileSuffix;
   var pos=InputValue.lastIndexOf('\\');
   if(filename!=InputValue.substring(pos+1))
   {alert('Παρακαλούμε επιλέξτε το σωστό αρχείο');
   return false;}
   else {
     return true;
   }

   return false;
 }

