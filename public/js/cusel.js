/* -------------------------------------

        cusel version 2.5
        last update: 31.10.11
        ��ާ֧ߧ� ��ҧ��ߧ�ԧ� ��֧ݧ֧ܧ� �ߧ� ���ڧݧ�ߧ��
        autor: Evgen Ryzhkov
        updates by:
                - Alexey Choporov
                - Roman Omelkovitch
        using libs:
                - jScrollPane
                - mousewheel
        www.xiper.net
----------------------------------------*/
function cuSel(params) {
                                                        
        jQuery(params.changedEl).each(
        function(num)
        {
        var chEl = jQuery(this),
                chElWid = chEl.outerWidth(), // ��ڧ�ڧߧ� ��֧ݧ֧ܧ��        
                chElClass = chEl.prop("class"), // �ܧݧѧ�� ��֧ݧ֧ܧ��
                chElId = chEl.prop("id"), // id
                chElName = chEl.prop("name"), // �ڧާ�
                defaultVal = chEl.val(), // �ߧѧ�ѧݧ�ߧ�� �٧ߧѧ�֧ߧڧ�
                activeOpt = chEl.find("option[value='"+defaultVal+"']").eq(0),
                defaultText = activeOpt.text(), // �ߧѧ�ѧݧ�ߧ�� ��֧ܧ��
                disabledSel = chEl.prop("disabled"), // �٧ѧҧݧ�ܧڧ��ӧѧ� �ݧ� ��֧ݧ֧ܧ�
                scrollArrows = params.scrollArrows,
                chElOnChange = chEl.prop("onchange"),
                chElTab = chEl.prop("tabindex"),
                chElMultiple = chEl.prop("multiple");
        
                //if(!chElWid2){
                //var chElWid = chEl.outerWidth(); // ��ڧ�ڧߧ� ��֧ݧ֧ܧ��
        //}        
                
                if(!chElId || chElMultiple)     return false; // �ߧ� ���ڧݧڧ٧ڧ��֧� ��֧ݧ֧ܧ� �֧�ݧ� �ߧ� �٧ѧէѧ� id
                
                if(!disabledSel)
                {
                        classDisCuselText = "", // �էݧ� ����ݧ֧اڧӧѧߧڧ� �ܧݧڧܧ� ��� �٧ѧէڧ٧ѧۧҧݧ֧ߧߧ�ާ� ��֧ݧ֧ܧ��
                        classDisCusel=""; // �էݧ� �����ާݧ֧ߧڧ� �٧ѧէڧ٧֧ۧҧݧ֧ߧߧ�ԧ� ��֧ݧ֧ܧ��
                }
                else
                {
                        classDisCuselText = "classDisCuselLabel";
                        classDisCusel="classDisCusel";
                }
                
                if(scrollArrows)
                {
                        classDisCusel+=" cuselScrollArrows";
                }
                        
                activeOpt.addClass("cuselActive");  // �ѧܧ�ڧӧߧ�ާ� ����ڧ�ߧ� ���ѧ٧� �է�ҧѧӧݧ�֧� �ܧݧѧ�� �էݧ� ���է�ӧ֧�ܧ�
        
        var optionStr = chEl.html(), // ���ڧ��� ����ڧ�ߧ��

                
        /* 
                �է֧ݧѧ֧� �٧ѧާ֧ߧ� ��֧ԧ�� option �ߧ� span, ���ݧߧ����� �����ѧߧ�� �ߧѧ�ѧݧ�ߧ�� �ܧ�ߧ����ܧ�ڧ�
        */
        
        spanStr = optionStr.replace(/option/ig,"span").replace(/value=/ig,"val="); // value �ާ֧ߧ�֧� �ߧ� val, ��.��. jquery ���ܧѧ٧�ӧѧ֧��� �ӧ����ڧߧڧާѧ�� value �� span
        
        /* 
                �էݧ� IE ������ѧӧݧ�֧� �ܧѧӧ��ܧ� �էݧ� �٧ߧѧ�֧ߧڧ�, ��.��. html() �ӧ�٧�ѧ�ѧ֧� �ܧ�� �ҧ֧� �ܧѧӧ��֧�
                ���� ����ڧ٧��ݧ� �ܧ���֧ܧ�ߧѧ� ��ҧ�ѧҧ��ܧ� value �է�ݧاߧ� �ҧ��� ����ݧ֧էߧڧ� �ѧ��ڧҧ���� option,
                �ߧѧ��ڧާ֧� <option class="country" id="ukraine" value="/ukrane/">���ܧ�ѧڧߧ�</option>
        */
        if($.browser.msie && parseInt($.browser.version) < 9)
        {
                var pattern = /(val=)(.*?)(>)/g;
                spanStr = spanStr.replace(pattern, "$1'$2'$3");
        }

        
        /* �ܧѧ�ܧѧ� ���ڧݧ�ߧ�ԧ� ��֧ݧ֧ܧ��     */
        var cuselFrame = '<div class="cusel '+chElClass+' '+classDisCusel+'"'+
                                        ' id=cuselFrame-'+chElId+
                                        ' style="width:'+chElWid+'px"'+
                                        ' tabindex="'+chElTab+'"'+
                                        '>'+
                                        '<div class="cuselFrameRight"></div>'+
                                        '<div class="cuselText">'+defaultText+'</div>'+
                                        '<div class="cusel-scroll-wrap"><div class="cusel-scroll-pane" id="cusel-scroll-'+chElId+'">'+
                                        spanStr+
                                        '</div></div>'+
                                        '<input type="hidden" id="'+chElId+'" name="'+chElName+'" value="'+defaultVal+'" />'+
                                        '</div>';
                                        
                                        
        /* ��էѧݧ�֧� ��ҧ��ߧ�� ��֧ݧ֧ܧ�, �ߧ� �֧ԧ� �ާ֧��� �ӧ��ѧӧݧ�֧� ���ڧݧ�ߧ�� */
        chEl.replaceWith(cuselFrame);
        
        /* �֧�ݧ� �ҧ�� ����֧�ݧ֧� onchange - ��֧�ݧ�֧� �֧ԧ� ���ݧ� */
        if(chElOnChange) jQuery("#"+chElId).bind('change',chElOnChange);

        
        /*
                ����ѧߧѧݧڧӧѧ֧� �ӧ����� �ӧ��ѧէѧ��ڧ� ���ڧ�ܧ�� ���ߧ�ӧ�ӧѧ��� �ߧ� ��ڧ�ݧ� �ӧڧէڧާ�� ���٧ڧ�ڧ� �� �ӧ����� ��էߧ�� ���٧ڧ�ڧ�
                ���� ��֧� ���ݧ�ܧ� ��֧�, �� �ܧ������ ��ڧ�ݧ� ����ڧ�ߧ�� �ҧ�ݧ��� ��ڧ�ݧ� �٧ѧէѧߧߧ�ԧ� ��ڧ�ݧ� �ӧڧէڧާ��
        */
        var newSel = jQuery("#cuselFrame-"+chElId),
                arrSpan = newSel.find("span"),
                defaultHeight;
                
                if(!arrSpan.eq(0).text())
                {
                        defaultHeight = arrSpan.eq(1).innerHeight();
                        arrSpan.eq(0).css("height", arrSpan.eq(1).height());
                } 
                else
                {
                        defaultHeight = arrSpan.eq(0).innerHeight();
                }
                
        
        if(arrSpan.length>params.visRows)
        {
                newSel.find(".cusel-scroll-wrap").eq(0)
                        .css({height: defaultHeight*params.visRows+"px", display : "none", visibility: "visible" })
                        .children(".cusel-scroll-pane").css("height",defaultHeight*params.visRows+"px");
        }
        else
        {
                newSel.find(".cusel-scroll-wrap").eq(0)
                        .css({display : "none", visibility: "visible" });
        }
        
        /* �ӧ��ѧӧݧ�֧� �� ����ڧ�ߧ� �է���ݧߧڧ�֧ݧ�ߧ�� ��֧ԧ� */
        
        var arrAddTags = jQuery("#cusel-scroll-"+chElId).find("span[addTags]"),
                lenAddTags = arrAddTags.length;
                
                for(i=0;i<lenAddTags;i++) arrAddTags.eq(i)
                                                                                .append(arrAddTags.eq(i).attr("addTags"))
                                                                                .removeAttr("addTags");
                                                                                
        cuselEvents();
        
        });

/* ---------------------------------------
        ���ڧӧ�٧ܧ� ���ҧ��ڧ� ��֧ݧ֧ܧ�ѧ�
------------------------------------------
*/
function cuselEvents() {
jQuery("html").unbind("click");

jQuery("html").click(
        function(e)
        {

                var clicked = jQuery(e.target),
                        clickedId = clicked.attr("id"),
                        clickedClass = clicked.prop("class");
                        
                /* �֧�ݧ� �ܧݧڧܧߧ�ݧ� ��� ��ѧާ�ާ� ��֧ݧ֧ܧ�� (��֧ܧ��) */
                if((clickedClass.indexOf("cuselText")!=-1 || clickedClass.indexOf("cuselFrameRight")!=-1) && clicked.parent().prop("class").indexOf("classDisCusel")==-1)
                {
                        var cuselWrap = clicked.parent().find(".cusel-scroll-wrap").eq(0);
                        
                        /* �֧�ݧ� �ӧ��ѧէѧ��֧� �ާ֧ߧ� ��ܧ���� - ���ܧѧ٧�ӧѧ֧� */
                        cuselShowList(cuselWrap);
                }
                /* �֧�ݧ� �ܧݧڧܧߧ�ݧ� ��� ��ѧާ�ާ� ��֧ݧ֧ܧ�� (�ܧ�ߧ�֧ۧߧ֧�) */
                else if(clickedClass.indexOf("cusel")!=-1 && clickedClass.indexOf("classDisCusel")==-1 && clicked.is("div"))
                {
        
                        var cuselWrap = clicked.find(".cusel-scroll-wrap").eq(0);
                        
                        /* �֧�ݧ� �ӧ��ѧէѧ��֧� �ާ֧ߧ� ��ܧ���� - ���ܧѧ٧�ӧѧ֧� */
                        cuselShowList(cuselWrap);
        
                }
                
                /* �֧�ݧ� �ӧ�ҧ�ѧݧ� ���٧ڧ�ڧ� �� ���ڧ�ܧ� */
                else if(clicked.is(".cusel-scroll-wrap span") && clickedClass.indexOf("cuselActive")==-1)
                {
                        var clickedVal;
                        (clicked.attr("val") == undefined) ? clickedVal=clicked.text() : clickedVal=clicked.attr("val");
                        clicked
                                .parents(".cusel-scroll-wrap").find(".cuselActive").eq(0).removeClass("cuselActive")
                                .end().parents(".cusel-scroll-wrap")
                                .next().val(clickedVal)
                                .end().prev().text(clicked.text())
                                .end().css("display","none")
                                .parent(".cusel").removeClass("cuselOpen");
                        clicked.addClass("cuselActive");
                        clicked.parents(".cusel-scroll-wrap").find(".cuselOptHover").removeClass("cuselOptHover");
                        if(clickedClass.indexOf("cuselActive")==-1)     clicked.parents(".cusel").find(".cusel-scroll-wrap").eq(0).next("input").change(); // ����ҧ� ���ѧҧѧ��ӧѧ� onchange
                }
                
                else if(clicked.parents(".cusel-scroll-wrap").is("div"))
                {
                        return;
                }
                
                /*
                        ��ܧ��ӧѧ֧� ��ѧ�ܧ����� ���ڧ�ܧ�, �֧�ݧ� �ܧݧڧܧߧ�ݧ� �ӧߧ� ���ڧ�ܧ�
                */
                else
                {
                        jQuery(".cusel-scroll-wrap")
                                .css("display","none")
                                .parent(".cusel").removeClass("cuselOpen");
                }
                

                
        });

jQuery(".cusel").unbind("keydown"); /* ����ҧ� �ߧ� �ҧ�ݧ� �էӧݧۧߧ�ԧ� ���ѧҧѧ��ӧѧߧڧ� ���ҧ��ڧ� */

jQuery(".cusel").keydown(
function(event)
{
        
        /*
                �֧�ݧ� ��֧ݧ֧ܧ� �٧ѧէڧ٧ѧۧҧݧڧ�, �� �ߧ� �ԧ� ��ѧҧ��ѧ֧� ���ݧ�ܧ� ��ѧ�
        */
        var key, keyChar;
                
        if(window.event) key=window.event.keyCode;
        else if (event) key=event.which;
        
        if(key==null || key==0 || key==9) return true;
        
        if(jQuery(this).prop("class").indexOf("classDisCusel")!=-1) return false;
                
        /*
                �֧�ݧ� �ߧѧاѧݧ� ����֧ݧܧ� �ӧߧڧ�
        */
        if(key==40)
        {
                var cuselOptHover = jQuery(this).find(".cuselOptHover").eq(0);
                if(!cuselOptHover.is("span")) var cuselActive = jQuery(this).find(".cuselActive").eq(0);
                else var cuselActive = cuselOptHover;
                var cuselActiveNext = cuselActive.next();
                        
                if(cuselActiveNext.is("span"))
                {
                        jQuery(this)
                                .find(".cuselText").eq(0).text(cuselActiveNext.text());
                        cuselActive.removeClass("cuselOptHover");
                        cuselActiveNext.addClass("cuselOptHover");
                        
                        $(this).find("input").eq(0).val(cuselActiveNext.attr("val"));
                                        
                        /* ����ܧ���ڧӧѧ֧� �� ��֧ܧ��֧ާ� ����ڧ�ߧ� */
                        cuselScrollToCurent($(this).find(".cusel-scroll-wrap").eq(0));
                        
                        return false;
                }
                else return false;
        }
        
        /*
                �֧�ݧ� �ߧѧاѧݧ� ����֧ݧܧ� �ӧӧ֧��
        */
        if(key==38)
        {
                var cuselOptHover = $(this).find(".cuselOptHover").eq(0);
                if(!cuselOptHover.is("span")) var cuselActive = $(this).find(".cuselActive").eq(0);
                else var cuselActive = cuselOptHover;
                cuselActivePrev = cuselActive.prev();
                        
                if(cuselActivePrev.is("span"))
                {
                        $(this)
                                .find(".cuselText").eq(0).text(cuselActivePrev.text());
                        cuselActive.removeClass("cuselOptHover");
                        cuselActivePrev.addClass("cuselOptHover");
                        
                        $(this).find("input").eq(0).val(cuselActivePrev.attr("val"));
                        
                        /* ����ܧ���ڧӧѧ֧� �� ��֧ܧ��֧ާ� ����ڧ�ߧ� */
                        cuselScrollToCurent($(this).find(".cusel-scroll-wrap").eq(0));
                        
                        return false;
                }
                else return false;
        }
        
        /*
                �֧�ݧ� �ߧѧاѧݧ� esc
        */
        if(key==27)
        {
                var cuselActiveText = $(this).find(".cuselActive").eq(0).text();
                $(this)
                        .removeClass("cuselOpen")
                        .find(".cusel-scroll-wrap").eq(0).css("display","none")
                        .end().find(".cuselOptHover").eq(0).removeClass("cuselOptHover");
                $(this).find(".cuselText").eq(0).text(cuselActiveText);

        }
        
        /*
                �֧�ݧ� �ߧѧاѧݧ� enter
        */
        if(key==13)
        {
                
                var cuselHover = $(this).find(".cuselOptHover").eq(0);
                if(cuselHover.is("span"))
                {
                        $(this).find(".cuselActive").removeClass("cuselActive");
                        cuselHover.addClass("cuselActive");
                }
                else var cuselHoverVal = $(this).find(".cuselActive").attr("val");
                
                $(this)
                        .removeClass("cuselOpen")
                        .find(".cusel-scroll-wrap").eq(0).css("display","none")
                        .end().find(".cuselOptHover").eq(0).removeClass("cuselOptHover");
                $(this).find("input").eq(0).change();
        }
        
        /*
                �֧�ݧ� �ߧѧاѧݧ� ����ҧ֧� �� ���� ���֧�� - ��ѧ�ܧ��ӧ֧� ���ڧ���
        */
        if(key==32 && $.browser.opera)
        {
                var cuselWrap = $(this).find(".cusel-scroll-wrap").eq(0);
                
                /* ��ѧܧ��ӧѧ֧� ���ڧ��� */
                cuselShowList(cuselWrap);
        }
                
        if($.browser.opera) return false; /* ���֧�ڧѧݧ�ߧ� �էݧ� ���֧��, ����� ���� �ߧѧاѧ�ڧڧ� �ߧ� �ܧݧѧӧڧ�� �ߧ� ����ܧ���ڧӧѧݧ��� ��ܧߧ� �ҧ�ѧ�٧֧�� */

});

/*
        ���ߧܧ�ڧ� ���ҧ��� ��� �ߧѧاѧ��� ��ڧާӧ�ݧѧ� (��� Alexey Choporov)
        ���ҧ�� �ڧէ֧� ���ܧ� ��ѧ�٧� �ާ֧اէ� �ߧѧاѧ�ڧ�ާ� ��ڧӧ�ݧ�� �ߧ� �ҧ�է֧� �ҧ�ݧ��� 0.5 ��֧�
        keypress �ߧ�ا֧� �էݧ� ���ݧ�ӧ� ��ڧާӧ�ݧ� �ߧѧاѧ��� �ܧݧѧӧڧ�
*/
var arr = [];
jQuery(".cusel").keypress(function(event)
{
        var key, keyChar;
                
        if(window.event) key=window.event.keyCode;
        else if (event) key=event.which;
        
        if(key==null || key==0 || key==9) return true;
        
        if(jQuery(this).prop("class").indexOf("classDisCusel")!=-1) return false;
        
        var o = this;
        arr.push(event);
        clearTimeout(jQuery.data(this, 'timer'));
        var wait = setTimeout(function() { handlingEvent() }, 500);
        jQuery(this).data('timer', wait);
        function handlingEvent()
        {
                var charKey = [];
                for (var iK in arr)
                {
                        if(window.event)charKey[iK]=arr[iK].keyCode;
                        else if(arr[iK])charKey[iK]=arr[iK].which;
                        charKey[iK]=String.fromCharCode(charKey[iK]).toUpperCase();
                }
                var arrOption=jQuery(o).find("span"),colArrOption=arrOption.length,i,letter;
                for(i=0;i<colArrOption;i++)
                {
                        var match = true;
                        for (var iter in arr)
                        {
                                letter=arrOption.eq(i).text().charAt(iter).toUpperCase();
                                if (letter!=charKey[iter])
                                {
                                        match=false;
                                }
                        }
                        if(match)
                        {
                                jQuery(o).find(".cuselOptHover").removeClass("cuselOptHover").end().find("span").eq(i).addClass("cuselOptHover").end().end().find(".cuselText").eq(0).text(arrOption.eq(i).text());
                        
                        /* ����ܧ���ڧӧѧ֧� �� ��֧ܧ��֧ާ� ����ڧ�ߧ� */
                        cuselScrollToCurent($(o).find(".cusel-scroll-wrap").eq(0));
                        arr = arr.splice;
                        arr = [];
                        break;
                        return true;
                        }
                }
                arr = arr.splice;
                arr = [];
        }
        if(jQuery.browser.opera && window.event.keyCode!=9) return false;
});
                                                                
}
        
jQuery(".cusel").focus(
function()
{
        jQuery(this).addClass("cuselFocus");
        
});

jQuery(".cusel").blur(
function()
{
        jQuery(this).removeClass("cuselFocus");
});

jQuery(".cusel").hover(
function()
{
        jQuery(this).addClass("cuselFocus");
},
function()
{
        jQuery(this).removeClass("cuselFocus");
});

}

function cuSelRefresh(params)
{
        /*
                ����ѧߧѧݧڧӧѧ֧� �ӧ����� �ӧ��ѧէѧ��ڧ� ���ڧ�ܧ�� ���ߧ�ӧ�ӧѧ��� �ߧ� ��ڧ�ݧ� �ӧڧէڧާ�� ���٧ڧ�ڧ� �� �ӧ����� ��էߧ�� ���٧ڧ�ڧ�
                ���� ��֧� ���ݧ�ܧ� ��֧�, �� �ܧ������ ��ڧ�ݧ� ����ڧ�ߧ�� �ҧ�ݧ��� ��ڧ�ݧ� �٧ѧէѧߧߧ�ԧ� ��ڧ�ݧ� �ӧڧէڧާ��
        */

        var arrRefreshEl = params.refreshEl.split(","),
                lenArr = arrRefreshEl.length,
                i;
        
        for(i=0;i<lenArr;i++)
        {
                var refreshScroll = jQuery(arrRefreshEl[i]).parents(".cusel").find(".cusel-scroll-wrap").eq(0);
                refreshScroll.find(".cusel-scroll-pane").jScrollPaneRemoveCusel();
                refreshScroll.css({visibility: "hidden", display : "block"});
        
                var     arrSpan = refreshScroll.find("span"),
                        defaultHeight = arrSpan.eq(0).outerHeight();
                
        
                if(arrSpan.length>params.visRows)
                {
                        refreshScroll
                                .css({height: defaultHeight*params.visRows+"px", display : "none", visibility: "visible" })
                                .children(".cusel-scroll-pane").css("height",defaultHeight*params.visRows+"px");
                }
                else
                {
                        refreshScroll
                                .css({display : "none", visibility: "visible" });
                }
        }
        
}
/*
        ���ܧ�ڧ� ��ѧ�ܧ���ڧ�/��ܧ���ڧ� ���ڧ�ܧ� 
*/
function cuselShowList(cuselWrap)
{
        var cuselMain = cuselWrap.parent(".cusel");
        
        /* �֧�ݧ� �ӧ��ѧէѧ��֧� �ާ֧ߧ� ��ܧ���� - ���ܧѧ٧�ӧѧ֧� */
        if(cuselWrap.css("display")=="none")
        {
                $(".cusel-scroll-wrap").css("display","none");
                
                cuselMain.addClass("cuselOpen");
                cuselWrap.css("display","block");
                var cuselArrows = false;
                if(cuselMain.prop("class").indexOf("cuselScrollArrows")!=-1) cuselArrows=true;
                if(!cuselWrap.find(".jScrollPaneContainer").eq(0).is("div"))
                {
                        cuselWrap.find("div").eq(0).jScrollPaneCusel({showArrows:cuselArrows});
                }
                                
                /* ����ܧ���ڧӧѧ֧� �� ��֧ܧ��֧ާ� ����ڧ�ߧ� */
                cuselScrollToCurent(cuselWrap);
                }
                else
                {
                        cuselWrap.css("display","none");
                        cuselMain.removeClass("cuselOpen");
                }
}


/*
        ���ߧܧ�ڧ� ����ܧ���ܧ� �� ��֧ܧ��֧ާ� ��ݧ֧ާ֧ߧ��
*/
function cuselScrollToCurent(cuselWrap)
{
        var cuselScrollEl = null;
        if(cuselWrap.find(".cuselOptHover").eq(0).is("span")) cuselScrollEl = cuselWrap.find(".cuselOptHover").eq(0);
        else if(cuselWrap.find(".cuselActive").eq(0).is("span")) cuselScrollEl = cuselWrap.find(".cuselActive").eq(0);

        if(cuselWrap.find(".jScrollPaneTrack").eq(0).is("div") && cuselScrollEl)
        {
                
                var posCurrentOpt = cuselScrollEl.position(),
                        idScrollWrap = cuselWrap.find(".cusel-scroll-pane").eq(0).attr("id");

                jQuery("#"+idScrollWrap)[0].scrollTo(posCurrentOpt.top);        
        
        }       
}