function HandleAjaxResult(result)
{
  alert(result.msg);
}
function HandleNoResult()
{
}
function ajaxCompleteHandler()
{
  ajaxdone=1;
}
function ajaxErrorHandler(XMLHttpRequest, textStatus, errorThrown)
{
  alert("请求数据失败，请检查网络！\ninfo:\n"+textStatus+"|"+XMLHttpRequest.status+"|"+XMLHttpRequest.readyState);
}

function ajaxGetData(urlfile,cmdtype,param,suchandler)
{
$.ajax({
  type: "POST",
  dataType: "json",
  url: urlfile,
  data: {"cmdtype":cmdtype,"param":param},
  complete :ajaxCompleteHandler,
  error :ajaxErrorHandler,
  success:function(data){suchandler(data);}
});
}