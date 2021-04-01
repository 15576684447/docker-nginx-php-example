
function jsSelectItemByValue(objSelect, objItemText) {
  for (var i = 0; i < objSelect.options.length; i++) {
    if (objSelect.options[i].value == objItemText) {
      objSelect.options[i].selected = true;
      break;
    }
  }
}

function isfloat(oNum){
  if(!oNum) return false;
  var strP=/^\d+(\.\d+)?$/;
  if(!strP.test(oNum)) return false;
  try{
    if(parseFloat(oNum)!=oNum) return false;
  }catch(ex){
    return false;
  }
  return true;
}

function isNum(iNum){
  var part=/^(0|[1-9][0-9]*)$/; 
  if(!part.test(iNum)) return false;
  return true;
}

function isMobilePhone(str){
  var part=/(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
  if(!part.test(str)) return false;
  return true;
}

function isIP(str){
  var arg = /^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/;
  if (str.match(arg) == null) {
    return false;
  }
  else {
    return true;
  }
}

function ckCheckAll(ckname)
{
  var cks=document.getElementsByName(ckname);
  for (var i=0; i<cks.length; i++)
    cks[i].checked = window.event.srcElement.checked; 
}
function ckGetOneCheckedID(ckname)
{
  var rt="";
  var cks=document.getElementsByName(ckname);
  for (var i=0; i<cks.length; i++)
  {
    if(cks[i].checked)
    {
      rt=cks[i].value;
      break;
    }
  }
  return rt;
}
function ckGetAllCheckedID(ckname)
{
  var rt="";
  var cks=document.getElementsByName(ckname);
  for (var i=0; i<cks.length; i++)
  {
    if(cks[i].checked)
    {
      rt+=cks[i].value+",";
    }
  }
  rt=rt.substring(0,rt.length-1);
  return rt;
}