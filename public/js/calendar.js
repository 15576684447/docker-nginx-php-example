var cookie_date='cookie_date';
    var _year;
    var _month;
    var _dateStr;
    var cookie_str;
    var cookie_fd;
    
    //标记点击事件和掠过时间
    var last_target=0;
    var last_over_target=0;

var DateChangeFlag=0;


function getCookie(c_name){
　　　　if (document.cookie.length>0){　　//先查询cookie是否为空，为空就return ""
　　　　　　c_start=document.cookie.indexOf(c_name + "=")　　//通过String对象的indexOf()来检查这个cookie是否存在，不存在就为 -1　　
　　　　　　if (c_start!=-1){ 
　　　　　　　　c_start=c_start + c_name.length+1　　//最后这个+1其实就是表示"="号啦，这样就获取到了cookie值的开始位置
　　　　　　　　c_end=document.cookie.indexOf(";",c_start)　　//其实我刚看见indexOf()第二个参数的时候猛然有点晕，后来想起来表示指定的开始索引的位置...这句是为了得到值的结束位置。因为需要考虑是否是最后一项，所以通过";"号是否存在来判断
　　　　　　　　if (c_end==-1) c_end=document.cookie.length　　
　　　　　　　　return unescape(document.cookie.substring(c_start,c_end))　　//通过substring()得到了值。想了解unescape()得先知道escape()是做什么的，都是很重要的基础，想了解的可以搜索下，在文章结尾处也会进行讲解cookie编码细节
　　　　　　} 
　　　　}
　　　　return ""
　　}　　

function setCookie(c_name, value, expiredays){
　　　　var exdate=new Date();
　　　　exdate.setDate(exdate.getDate() + expiredays);
　　　　document.cookie=c_name+ "=" + escape(value) + ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
　　}

/*************可以返回数据的cgi*******************/
/*
function createXHR()  
    {  
        var xhr;  
        try  
        {  
            xhr = new ActiveXObject("Msxml2.XMLHTTP");  
        }  
        catch(e)  
        {  
            try  
            {  
                xhr = new ActiveObject("Microsoft.XMLHTTP");  
            }  
            catch(E)  
            {  
                xhr = false;  
            }  
        }  
      
        if(!xhr && typeof XMLHttpRequest != 'undefined')  
        {  
            xhr = new XMLHttpRequest();  
        }  
        return xhr;  
    }  
      
    function sender(val)  
    {  
        xhr = createXHR();  
        if(xhr)  
        {  
            xhr.onreadystatechange = callbackFunction;  
            xhr.open("GET","/cgi-bin/dsl/cgi_Playback.cgi?command="+val+"&"+Math.random());  //调用login.cgi程序，val为需要传递的参数  
            xhr.send(null);  
        }  
        else  
        {  
            alert("浏览器不支持，请更换浏览器！");  
        }  
    }  
      
    function callbackFunction()  
    {  
        if(xhr.readyState == 4)  
        {  
            if(xhr.status == 200)  
            {  
                //var returnValue = xhr.responseText;//服务器printf返回的结果
                //alert(returnValue);
            }  
            else  
            {  
                alert("页面出现异常！");  
            }  
        }  
    }  

    function sendCommand(string)
    {
        sender(string);
    }
	*/

/*
var AFBaseURL = "/cgi-bin/dsl/cgi_test.cgi?command=";


function sendCommand(commandURL)
{   
    httpGet("html", AFBaseURL+commandURL, null, clearAjaxImg);
}
*/

var CurrentDate;

(function(){
  /*
   * 用于记录日期，显示的时候，根据dateObj中的日期的年月显示
   */
  var dateObj = (function(){
    var _date = new Date();    // 默认为当前系统时间
     // alert(_date);
    return {
      getDate : function(){
        return _date;
      },
      setDate : function(date) {
        _date = date;
      }
    };
  })();
 
  // 设置calendar div中的html部分
  //renderHtml();
  // 表格中显示日期

  showCalendarData();
  // 绑定事件

  bindEvent();

 
  /**
   * 渲染html结构
   */
  function renderHtml() {
    var calendar = document.getElementById("calendar");
    var titleBox = document.createElement("div");  // 标题盒子 设置上一月 下一月 标题
    var bodyBox = document.createElement("div");  // 表格区 显示数据
 
    // 设置标题盒子中的html
    titleBox.className = 'calendar-title-box';
    titleBox.innerHTML = "<span class='prev-month' id='prevMonth'></span>" +
      "<span class='calendar-title' id='calendarTitle'></span>" +
      "<span id='nextMonth' class='next-month'></span>";
    calendar.appendChild(titleBox);    // 添加到calendar div中
    // 设置表格区的html结构
    bodyBox.className = 'calendar-body-box';
    var _headHtml = "<tr>" + 
              "<th>日</th>" +
              "<th>一</th>" +
              "<th>二</th>" +
              "<th>三</th>" +
              "<th>四</th>" +
              "<th>五</th>" +
              "<th>六</th>" +
            "</tr>";
    var _bodyHtml = "";
 
    // 一个月最多31天，所以一个月最多占6行表格
    for(var i = 0; i < 6; i++) {  
      _bodyHtml += "<tr>" +
              "<td></td>" +
              "<td></td>" +
              "<td></td>" +
              "<td></td>" +
              "<td></td>" +
              "<td></td>" +
              "<td></td>" +
            "</tr>";
    }
    bodyBox.innerHTML = "<table id='calendarTable' class='calendar-table'>" +
              _headHtml + _bodyHtml +
              "</table>";
    // 添加到calendar div中
    calendar.appendChild(bodyBox);
  }
 
  /**
   * 表格中显示数据，并设置类名
   */

    
  function showCalendarData() {
      //setCookie(cookie_date, "20171208", null);
      /*
     _year = dateObj.getDate().getFullYear();
     _month = dateObj.getDate().getMonth() + 1;
     _dateStr = getDateStr(dateObj.getDate());*/
      //alert(_year);
      //alert(_month);
      //alert(_dateStr);
      //_dateStr为20171001的数据格式

      if((cookie_str=getCookie(cookie_date)))
          {
              //alert("cookie="+cookie_str);
              _year=cookie_str.substr(0,4);
              _month=cookie_str.substr(4,2);
              _dateStr=cookie_str;
          }
      else
          {
              _year = dateObj.getDate().getFullYear();
             _month = dateObj.getDate().getMonth() + 1;
             _dateStr = getDateStr(dateObj.getDate());
          }
      /*获取当前时间作为全局变量*/
      CurrentDate="";
      CurrentDate+=_dateStr;
	  DateChangeFlag=1;
	  /****************************************************************************************************/
	  //parent.date=CurrentDate;
	  //parent.date=CurrentDate;
      //alert(CurrentDate);
    // 设置顶部标题栏中的 年、月信息
    var calendarTitle = document.getElementById("calendarTitle");
    var titleStr = _dateStr.substr(0,4) + "年" + _dateStr.substr(4,2) + "月";
    calendarTitle.innerHTML = titleStr;
 
    // 设置表格中的日期数据
    var _table = document.getElementById("calendarTable");
    var _tds = _table.getElementsByTagName("td");
    var _firstDay = new Date(_year, _month - 1, 1);  // 当前月第一天
    for(var i = 0; i < _tds.length; i++) {
      var _thisDay = new Date(_year, _month - 1, i + 1 - _firstDay.getDay());
      var _thisDayStr = getDateStr(_thisDay);
      _tds[i].innerHTML = _thisDay.getDate();
      //_tds[i].data = _thisDayStr;
      _tds[i].setAttribute('data', _thisDayStr);
      if(_thisDayStr == getDateStr(new Date())) {    // 当前天
          //alert(_thisDayStr);
        _tds[i].className = 'currentDay';//如果是当天，就把class置为currentDay
      }else if(_thisDayStr.substr(0, 6) == getDateStr(_firstDay).substr(0, 6)) {
        _tds[i].className = 'currentMonth';//如果是当前月,就把class置为currentMonth
      }else {    // 如果是其他月就把class置为otherMonth
        _tds[i].className = 'otherMonth';
      }
       
        if(_thisDayStr==cookie_str)
            {
                _tds[i].style.backgroundColor="#ccc";
                last_target=_tds[i];
            }
        
    }

  }
 
    
    function ReshowCalendarData() {
     _year = dateObj.getDate().getFullYear();
     _month = dateObj.getDate().getMonth() + 1;
     _dateStr = getDateStr(dateObj.getDate());
     
      /*获取当前时间作为全局变量*/
      CurrentDate="";
      CurrentDate+=_dateStr;
      //alert(CurrentDate);
    // 设置顶部标题栏中的 年、月信息
    var calendarTitle = document.getElementById("calendarTitle");
    var titleStr = _dateStr.substr(0,4) + "年" + _dateStr.substr(4,2) + "月";
    calendarTitle.innerHTML = titleStr;
 
    // 设置表格中的日期数据
    var _table = document.getElementById("calendarTable");
    var _tds = _table.getElementsByTagName("td");
    var _firstDay = new Date(_year, _month - 1, 1);  // 当前月第一天
    for(var i = 0; i < _tds.length; i++) {
      var _thisDay = new Date(_year, _month - 1, i + 1 - _firstDay.getDay());
      var _thisDayStr = getDateStr(_thisDay);
      _tds[i].innerHTML = _thisDay.getDate();
      //_tds[i].data = _thisDayStr;
      _tds[i].setAttribute('data', _thisDayStr);
      if(_thisDayStr == getDateStr(new Date())) {    // 当前天
        _tds[i].className = 'currentDay';//如果是当天，就把class置为currentDay
      }else if(_thisDayStr.substr(0, 6) == getDateStr(_firstDay).substr(0, 6)) {
        _tds[i].className = 'currentMonth';//如果是当前月,就把class置为currentMonth
      }else {    // 如果是其他月就把class置为otherMonth
        _tds[i].className = 'otherMonth';
      }
    }
  }
    
    
  /**
   * 绑定上个月下个月事件
   */


    
  function bindEvent() {
    var prevMonth = document.getElementById("prevMonth");
    var nextMonth = document.getElementById("nextMonth");
    var prevYear = document.getElementById("prevYear");
    var nextYear = document.getElementById("nextYear");
    addEvent(prevMonth, 'click', toPrevMonth);
    addEvent(nextMonth, 'click', toNextMonth);
    addEvent(prevYear, 'click', toPrevYear);
    addEvent(nextYear, 'click', toNextYear);
    /*为每个日期绑定点击事件*/
    var table = document.getElementById("calendarTable");
    var tds = table.getElementsByTagName('td');
    for(var i = 0; i < tds.length; i++) {
      addEvent(tds[i], 'click', function(e){
        //console.log(e.target.getAttribute('data'));
//鼠标点击事件
//当有新的日期按下，就把前一个日期回复原样，新的日期改变特征，当日特征除外
          //alert(e.target.className);
          
          var Ev= e || window.event;
       if((e.target.className=="currentMonth")||(e.target.className=="currentDay"))//当前月
		   {
			if(last_target!=0)
			{
			if(last_target.getAttribute("data")==getDateStr(new Date()))
				{
					last_target.style.backgroundColor="white";
				}
			else
				{
					//last_target.style.color="black";
					last_target.style.backgroundColor="white";
				}
			}
			e.target.style.backgroundColor="#ccc";
			last_target=e.target;
			   
			  setCookie(cookie_date,e.target.getAttribute("data")); //sendCommand("Playback&Changedate&Date="+e.target.getAttribute("data"));
			  //alert(e.target.getAttribute('data'));
			   /*获取当前时间作为全局变量*/
			   CurrentDate="";
			   CurrentDate+=e.target.getAttribute("data");
			   //将父界面对应的变量设置为该值
			   /****************************************************************************/
			   //parent.date=CurrentDate;
			   //parent.date=CurrentDate;
			   DateChangeFlag=1;
		   }
          //alert(e.target.getAttribute('data'));
		  //alert("hello");
      });
//鼠标略过事件，鼠标略过时，日期背景变化
        addEvent(tds[i],'mouseover',function(e)
                {
            var Ev= e || window.event;
            if((e.target.className=="currentMonth")||(e.target.className=="currentDay")||(e.target.className=="otherMonth"))
                {
                    if(last_over_target!=0)
                        {
                            if(last_over_target!=last_target)
                                last_over_target.style.backgroundColor="white";
                        }
                    e.target.style.backgroundColor="#ccc";
                    last_over_target=e.target;
                }
                
            
        });
    //MouseOut,鼠标移出事件
        addEvent(tds[i],'mouseout',function(e)
                {
                if(last_over_target!=last_target)
                    last_over_target.style.backgroundColor="white";
        });
        
    }
  }
 
  /**
   * 绑定事件
   */
    
    function addEvent(dom, eType, func) {
    if(dom.addEventListener) {  // DOM 2.0
      dom.addEventListener(eType, function(e){
        func(e);
      }, false);
    } else if(dom.attachEvent){  // IE5+
      dom.attachEvent('on' + eType, function(e){
        func(e);
      });
    } else {  // DOM 0
      dom['on' + eType] = function(e) {
        func(e);
      }
    }
  }
    
    /*
  function addEvent(dom, eType, func) {
    if(dom.addEventListener) {  // DOM 2.0
      dom.addEventListener(eType, function(e){
        func(e);
      });
    } else if(dom.attachEvent){  // IE5+
      dom.attachEvent('on' + eType, function(e){
        func(e);
      });
    } else {  // DOM 0
      dom['on' + eType] = function(e) {
        func(e);
      }
    }
  }
 */
  /**
   * 点击上个月图标触发
   */
  function toPrevMonth() {
      last_target.style.backgroundColor="white";
    var date = dateObj.getDate();
    dateObj.setDate(new Date(date.getFullYear(), date.getMonth() - 1, 1));
      
      //last_target=0;
      //alert(dateObj.getDate());
    ReshowCalendarData();
  }
 
  /**
   * 点击下个月图标触发
   */
  function toNextMonth() {
      last_target.style.backgroundColor="white";
    var date = dateObj.getDate();
    dateObj.setDate(new Date(date.getFullYear(), date.getMonth() + 1, 1));
      
      //last_target=0;
      //alert(dateObj.getDate());
    ReshowCalendarData();
  }
 
    
    function toPrevYear()
    {
        last_target.style.backgroundColor="white";
    var date = dateObj.getDate();
    dateObj.setDate(new Date(date.getFullYear()-1, date.getMonth(), 1));
        
        //last_target=0;
        //alert(dateObj.getDate());
    ReshowCalendarData();
    } 
    
    function toNextYear()
    {
        last_target.style.backgroundColor="white";
    var date = dateObj.getDate();
        
    dateObj.setDate(new Date(date.getFullYear()+1, date.getMonth(), 1));
        
        //last_target=0;
        //alert(dateObj.getDate());
    ReshowCalendarData();
    }
  /**
   * 日期转化为字符串， 4位年+2位月+2位日
   */
  function getDateStr(date) {
    var _year = date.getFullYear();
    var _month = date.getMonth() + 1;    // 月从0开始计数
    var _d = date.getDate();
     
    _month = (_month > 9) ? ("" + _month) : ("0" + _month);
    _d = (_d > 9) ? ("" + _d) : ("0" + _d);
    return _year + _month + _d;
  }
})();
