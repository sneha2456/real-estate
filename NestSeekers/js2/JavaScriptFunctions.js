function ValidateControl(ControlID,LabelID,Message)
{
  if(document.getElementById(ControlID).value == "")
   {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter " + Message;
      document.getElementById(ControlID).focus();
      return false;
   }
   else
   {
          document.getElementById(LabelID).innerHTML = "";
   }
}

function ValidateEmailID(ControlID,LabelID) 
{
  var Patteren = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  var Address = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter Email Address ";
      document.getElementById(ControlID).focus();
      return false;
  }
  else if(Patteren.test(Address) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter Valid Email Address.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
       document.getElementById(LabelID).innerHTML = "";
       return true;
  }
}	

function ValidateURL(ControlID,LabelID) 
{
  var Patteren = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;;
  var Url = document.getElementById(ControlID).value;
  if(document.getElementById(ControlID).value == "")
  {
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Please Enter URL";
      document.getElementById(ControlID).focus();
      return false;
  }
  else if(Patteren.test(Url) == false) 
  {
     document.getElementById(LabelID).innerHTML = "* Please Enter Valid URL.";
     document.getElementById(ControlID).focus();
    return false;
  }
  else
  {
       document.getElementById(LabelID).innerHTML = "";
       return true;
  }
} 


function ValidatePassword(PwdID, ConPwdID, LabelID)
{
		if(document.getElementById(PwdID).value != document.getElementById(ConPwdID).value)
		{
			document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Password & Confirm Password does not match ";
			document.getElementById(PwdID).focus();
		  return false;
		}
    else
    {
      document.getElementById(LabelID).innerHTML = "";
      return true;
    }
}

function NumbersOnly(e)
{
	var Unicode=e.charCode? e.charCode : e.keyCode;
	if (Unicode!=8)
	{ //if the key isn't the backspace key (which we should allow)
	 if (Unicode<48||Unicode>57) //if not a number
   {
      return false; //disable key press  
   }
	}
}

function CharsOnly(e)
{
  var Unicode=e.charCode? e.charCode : e.keyCode;
  if (Unicode!=8)
  { //if the key isn't the backspace key (which we should allow)
   if ((Unicode<65 || Unicode>90) && (Unicode<97 || Unicode>122)) //if not a number
   {
      return false; //disable key press  
   }
  }
}

function IsNumberOnly(evt) //  Same as Above Function (NumbersOnly)
{
  var e = event || evt; // for trans-browser compatibility
  var charCode = e.which || e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
	else
	  return true;
}

function StartEndDate(StartDate,EndDate,LabelID)
{
    //alert("ddd");
    var SDate=document.getElementById(StartDate).value;
    var EDate=document.getElementById(EndDate).value;
    //alert (date1+ "  " + date2);
    if(EDate<SDate)
    {
      //alert("Please Select Valid Date Crieteria");
      document.getElementById(LabelID).style.display = "inline";
      document.getElementById(LabelID).innerHTML = "* Enter Valid Date Crieteria";      
      document.getElementById(StartDate).focus();
      return false;
    }
    else
    {
      //alert("Proper");
      document.getElementById(LabelID).innerHTML = "";
      return true;  
    }

}

function CurrentDate(CurDate)
{
  var Today = new Date();
  var DD    = Today.getDate();
  var MM    = Today.getMonth()+1; //January is 0!
  var YYYY  = Today.getFullYear();

  if(DD<10) {
      DD='0'+DD
  } 

  if(MM<10) {
      MM='0'+MM
  } 

  Today = MM+'-'+DD+'-'+YYYY;
  //return Today;
  document.getElementById(CurDate).value = Today;
}


function ValidateAge(DOB,LabelID)
{
  var Today = new Date();
  
  var BDate = document.getElementById(DOB).value;
  var BirthDate = new Date(BDate);
  
  var CurrentYear = Today.getFullYear();
  var BirthYear = BirthDate.getFullYear();

  var MyAge = CurrentYear - BirthYear - 1;
  if(MyAge < 18)
  {
    document.getElementById(LabelID).style.display = "inline";
    document.getElementById(LabelID).innerHTML = "* You are Under Age (Below 18).";      
    document.getElementById(DOB).focus();
    return false;
  } 
  else
  {
    document.getElementById(LabelID).innerHTML = "";
    return true;  
  }
}