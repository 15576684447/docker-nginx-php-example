/* -------------------------------------

        cusel version 2.5
        last update: 31.10.11
        §ã§Þ§Ö§ß§Ñ §à§Ò§í§é§ß§à§Ô§à §ã§Ö§Ý§Ö§Ü§ä §ß§Ñ §ã§ä§Ú§Ý§î§ß§í§Û
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
                chElWid = chEl.outerWidth(), // §ê§Ú§â§Ú§ß§Ñ §ã§Ö§Ý§Ö§Ü§ä§Ñ        
                chElClass = chEl.prop("class"), // §Ü§Ý§Ñ§ã§ã §ã§Ö§Ý§Ö§Ü§ä§Ñ
                chElId = chEl.prop("id"), // id
                chElName = chEl.prop("name"), // §Ú§Þ§ñ
                defaultVal = chEl.val(), // §ß§Ñ§é§Ñ§Ý§î§ß§à§Ö §Ù§ß§Ñ§é§Ö§ß§Ú§Ö
                activeOpt = chEl.find("option[value='"+defaultVal+"']").eq(0),
                defaultText = activeOpt.text(), // §ß§Ñ§é§Ñ§Ý§î§ß§í§Û §ä§Ö§Ü§ã§ä
                disabledSel = chEl.prop("disabled"), // §Ù§Ñ§Ò§Ý§à§Ü§Ú§â§à§Ó§Ñ§ß §Ý§Ú §ã§Ö§Ý§Ö§Ü§ä
                scrollArrows = params.scrollArrows,
                chElOnChange = chEl.prop("onchange"),
                chElTab = chEl.prop("tabindex"),
                chElMultiple = chEl.prop("multiple");
        
                //if(!chElWid2){
                //var chElWid = chEl.outerWidth(); // §ê§Ú§â§Ú§ß§Ñ §ã§Ö§Ý§Ö§Ü§ä§Ñ
        //}        
                
                if(!chElId || chElMultiple)     return false; // §ß§Ö §ã§ä§Ú§Ý§Ú§Ù§Ú§â§å§Ö§Þ §ã§Ö§Ý§Ö§Ü§ä §Ö§ã§Ý§Ú §ß§Ö §Ù§Ñ§Õ§Ñ§ß id
                
                if(!disabledSel)
                {
                        classDisCuselText = "", // §Õ§Ý§ñ §à§ä§ã§Ý§Ö§Ø§Ú§Ó§Ñ§ß§Ú§ñ §Ü§Ý§Ú§Ü§Ñ §á§à §Ù§Ñ§Õ§Ú§Ù§Ñ§Û§Ò§Ý§Ö§ß§ß§à§Þ§å §ã§Ö§Ý§Ö§Ü§ä§å
                        classDisCusel=""; // §Õ§Ý§ñ §à§æ§à§â§Þ§Ý§Ö§ß§Ú§ñ §Ù§Ñ§Õ§Ú§Ù§Ö§Û§Ò§Ý§Ö§ß§ß§à§Ô§à §ã§Ö§Ý§Ö§Ü§ä§Ñ
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
                        
                activeOpt.addClass("cuselActive");  // §Ñ§Ü§ä§Ú§Ó§ß§à§Þ§å §à§á§ä§Ú§à§ß§å §ã§â§Ñ§Ù§å §Õ§à§Ò§Ñ§Ó§Ý§ñ§Ö§Þ §Ü§Ý§Ñ§ã§ã §Õ§Ý§ñ §á§à§Õ§ã§Ó§Ö§ä§Ü§Ú
        
        var optionStr = chEl.html(), // §ã§á§Ú§ã§à§Ü §à§á§ä§Ú§à§ß§à§Ó

                
        /* 
                §Õ§Ö§Ý§Ñ§Ö§Þ §Ù§Ñ§Þ§Ö§ß§å §ä§Ö§Ô§à§Ó option §ß§Ñ span, §á§à§Ý§ß§à§ã§ä§î§ð §ã§à§ç§â§Ñ§ß§ñ§ñ §ß§Ñ§é§Ñ§Ý§î§ß§å§ð §Ü§à§ß§ã§ä§â§å§Ü§è§Ú§ð
        */
        
        spanStr = optionStr.replace(/option/ig,"span").replace(/value=/ig,"val="); // value §Þ§Ö§ß§ñ§Ö§Þ §ß§Ñ val, §ä.§Ü. jquery §à§ä§Ü§Ñ§Ù§í§Ó§Ñ§Ö§ä§ã§ñ §Ó§à§ã§á§â§Ú§ß§Ú§Þ§Ñ§ä§î value §å span
        
        /* 
                §Õ§Ý§ñ IE §á§â§à§ã§ä§Ñ§Ó§Ý§ñ§Ö§Þ §Ü§Ñ§Ó§í§é§Ü§Ú §Õ§Ý§ñ §Ù§ß§Ñ§é§Ö§ß§Ú§Û, §ä.§Ü. html() §Ó§à§Ù§â§Ñ§ë§Ñ§Ö§ä §Ü§à§Õ §Ò§Ö§Ù §Ü§Ñ§Ó§í§é§Ö§Ü
                §é§ä§à §á§â§à§Ú§Ù§à§ê§Ý§Ñ §Ü§à§â§â§Ö§Ü§ä§ß§Ñ§ñ §à§Ò§â§Ñ§Ò§à§ä§Ü§Ñ value §Õ§à§Ý§Ø§ß§à §Ò§í§ä§î §á§à§ã§Ý§Ö§Õ§ß§Ú§Û §Ñ§ä§â§Ú§Ò§å§ä§à§Þ option,
                §ß§Ñ§á§â§Ú§Þ§Ö§â <option class="country" id="ukraine" value="/ukrane/">§µ§Ü§â§Ñ§Ú§ß§Ñ</option>
        */
        if($.browser.msie && parseInt($.browser.version) < 9)
        {
                var pattern = /(val=)(.*?)(>)/g;
                spanStr = spanStr.replace(pattern, "$1'$2'$3");
        }

        
        /* §Ü§Ñ§â§Ü§Ñ§ã §ã§ä§Ú§Ý§î§ß§à§Ô§à §ã§Ö§Ý§Ö§Ü§ä§Ñ     */
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
                                        
                                        
        /* §å§Õ§Ñ§Ý§ñ§Ö§Þ §à§Ò§í§é§ß§í§Û §ã§Ö§Ý§Ö§Ü§ä, §ß§Ñ §Ö§Ô§à §Þ§Ö§ã§ä§à §Ó§ã§ä§Ñ§Ó§Ý§ñ§Ö§Þ §ã§ä§Ú§Ý§î§ß§í§Û */
        chEl.replaceWith(cuselFrame);
        
        /* §Ö§ã§Ý§Ú §Ò§í§Ý §á§à§è§Ö§á§Ý§Ö§ß onchange - §è§Ö§á§Ý§ñ§Ö§Þ §Ö§Ô§à §á§à§Ý§ð */
        if(chElOnChange) jQuery("#"+chElId).bind('change',chElOnChange);

        
        /*
                §å§ã§ä§Ñ§ß§Ñ§Ý§Ú§Ó§Ñ§Ö§Þ §Ó§í§ã§à§ä§å §Ó§í§á§Ñ§Õ§Ñ§ð§ë§Ú§ç §ã§á§Ú§ã§Ü§à§Ó §à§ã§ß§à§Ó§í§Ó§Ñ§ñ§ã§î §ß§Ñ §é§Ú§ã§Ý§Ö §Ó§Ú§Õ§Ú§Þ§í§ç §á§à§Ù§Ú§è§Ú§Û §Ú §Ó§í§ã§à§ä§í §à§Õ§ß§à§Û §á§à§Ù§Ú§è§Ú§Ú
                §á§â§Ú §é§Ö§Þ §ä§à§Ý§î§Ü§à §ä§Ö§Þ, §å §Ü§à§ä§à§â§í§ç §é§Ú§ã§Ý§à §à§á§ä§Ú§à§ß§à§Ó §Ò§à§Ý§î§ê§Ö §é§Ú§ã§Ý§Ñ §Ù§Ñ§Õ§Ñ§ß§ß§à§Ô§à §é§Ú§ã§Ý§Ñ §Ó§Ú§Õ§Ú§Þ§í§ç
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
        
        /* §Ó§ã§ä§Ñ§Ó§Ý§ñ§Ö§Þ §Ó §à§á§ä§Ú§à§ß§í §Õ§à§á§à§Ý§ß§Ú§ä§Ö§Ý§î§ß§í§Ö §ä§Ö§Ô§Ú */
        
        var arrAddTags = jQuery("#cusel-scroll-"+chElId).find("span[addTags]"),
                lenAddTags = arrAddTags.length;
                
                for(i=0;i<lenAddTags;i++) arrAddTags.eq(i)
                                                                                .append(arrAddTags.eq(i).attr("addTags"))
                                                                                .removeAttr("addTags");
                                                                                
        cuselEvents();
        
        });

/* ---------------------------------------
        §á§â§Ú§Ó§ñ§Ù§Ü§Ñ §ã§à§Ò§í§ä§Ú§Û §ã§Ö§Ý§Ö§Ü§ä§Ñ§Þ
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
                        
                /* §Ö§ã§Ý§Ú §Ü§Ý§Ú§Ü§ß§å§Ý§Ú §á§à §ã§Ñ§Þ§à§Þ§å §ã§Ö§Ý§Ö§Ü§ä§å (§ä§Ö§Ü§ã§ä) */
                if((clickedClass.indexOf("cuselText")!=-1 || clickedClass.indexOf("cuselFrameRight")!=-1) && clicked.parent().prop("class").indexOf("classDisCusel")==-1)
                {
                        var cuselWrap = clicked.parent().find(".cusel-scroll-wrap").eq(0);
                        
                        /* §Ö§ã§Ý§Ú §Ó§í§á§Ñ§Õ§Ñ§ð§ë§Ö§Ö §Þ§Ö§ß§ð §ã§Ü§â§í§ä§à - §á§à§Ü§Ñ§Ù§í§Ó§Ñ§Ö§Þ */
                        cuselShowList(cuselWrap);
                }
                /* §Ö§ã§Ý§Ú §Ü§Ý§Ú§Ü§ß§å§Ý§Ú §á§à §ã§Ñ§Þ§à§Þ§å §ã§Ö§Ý§Ö§Ü§ä§å (§Ü§à§ß§ä§Ö§Û§ß§Ö§â) */
                else if(clickedClass.indexOf("cusel")!=-1 && clickedClass.indexOf("classDisCusel")==-1 && clicked.is("div"))
                {
        
                        var cuselWrap = clicked.find(".cusel-scroll-wrap").eq(0);
                        
                        /* §Ö§ã§Ý§Ú §Ó§í§á§Ñ§Õ§Ñ§ð§ë§Ö§Ö §Þ§Ö§ß§ð §ã§Ü§â§í§ä§à - §á§à§Ü§Ñ§Ù§í§Ó§Ñ§Ö§Þ */
                        cuselShowList(cuselWrap);
        
                }
                
                /* §Ö§ã§Ý§Ú §Ó§í§Ò§â§Ñ§Ý§Ú §á§à§Ù§Ú§è§Ú§ð §Ó §ã§á§Ú§ã§Ü§Ö */
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
                        if(clickedClass.indexOf("cuselActive")==-1)     clicked.parents(".cusel").find(".cusel-scroll-wrap").eq(0).next("input").change(); // §é§ä§à§Ò§í §ã§â§Ñ§Ò§Ñ§ä§í§Ó§Ñ§Ý onchange
                }
                
                else if(clicked.parents(".cusel-scroll-wrap").is("div"))
                {
                        return;
                }
                
                /*
                        §ã§Ü§â§í§Ó§Ñ§Ö§Þ §â§Ñ§ã§Ü§â§í§ä§í§Ö §ã§á§Ú§ã§Ü§Ú, §Ö§ã§Ý§Ú §Ü§Ý§Ú§Ü§ß§å§Ý§Ú §Ó§ß§Ö §ã§á§Ú§ã§Ü§Ñ
                */
                else
                {
                        jQuery(".cusel-scroll-wrap")
                                .css("display","none")
                                .parent(".cusel").removeClass("cuselOpen");
                }
                

                
        });

jQuery(".cusel").unbind("keydown"); /* §é§ä§à§Ò§í §ß§Ö §Ò§í§Ý§à §Õ§Ó§Ý§Û§ß§à§Ô§à §ã§â§Ñ§Ò§Ñ§ä§í§Ó§Ñ§ß§Ú§ñ §ã§à§Ò§í§ä§Ú§ñ */

jQuery(".cusel").keydown(
function(event)
{
        
        /*
                §Ö§ã§Ý§Ú §ã§Ö§Ý§Ö§Ü§ä §Ù§Ñ§Õ§Ú§Ù§Ñ§Û§Ò§Ý§Ú§ß, §ã §ß§Ö §Ô§à §â§Ñ§Ò§à§ä§Ñ§Ö§ä §ä§à§Ý§î§Ü§à §ä§Ñ§Ò
        */
        var key, keyChar;
                
        if(window.event) key=window.event.keyCode;
        else if (event) key=event.which;
        
        if(key==null || key==0 || key==9) return true;
        
        if(jQuery(this).prop("class").indexOf("classDisCusel")!=-1) return false;
                
        /*
                §Ö§ã§Ý§Ú §ß§Ñ§Ø§Ñ§Ý§Ú §ã§ä§â§Ö§Ý§Ü§å §Ó§ß§Ú§Ù
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
                                        
                        /* §á§â§à§Ü§â§å§é§Ú§Ó§Ñ§Ö§Þ §Ü §ä§Ö§Ü§å§ë§Ö§Þ§å §à§á§ä§Ú§à§ß§å */
                        cuselScrollToCurent($(this).find(".cusel-scroll-wrap").eq(0));
                        
                        return false;
                }
                else return false;
        }
        
        /*
                §Ö§ã§Ý§Ú §ß§Ñ§Ø§Ñ§Ý§Ú §ã§ä§â§Ö§Ý§Ü§å §Ó§Ó§Ö§â§ç
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
                        
                        /* §á§â§à§Ü§â§å§é§Ú§Ó§Ñ§Ö§Þ §Ü §ä§Ö§Ü§å§ë§Ö§Þ§å §à§á§ä§Ú§à§ß§å */
                        cuselScrollToCurent($(this).find(".cusel-scroll-wrap").eq(0));
                        
                        return false;
                }
                else return false;
        }
        
        /*
                §Ö§ã§Ý§Ú §ß§Ñ§Ø§Ñ§Ý§Ú esc
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
                §Ö§ã§Ý§Ú §ß§Ñ§Ø§Ñ§Ý§Ú enter
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
                §Ö§ã§Ý§Ú §ß§Ñ§Ø§Ñ§Ý§Ú §á§â§à§Ò§Ö§Ý §Ú §ï§ä§à §à§á§Ö§â§Ñ - §â§Ñ§ã§Ü§â§í§Ó§Ö§Þ §ã§á§Ú§ã§à§Ü
        */
        if(key==32 && $.browser.opera)
        {
                var cuselWrap = $(this).find(".cusel-scroll-wrap").eq(0);
                
                /* §â§Ñ§Ü§â§í§Ó§Ñ§Ö§Þ §ã§á§Ú§ã§à§Ü */
                cuselShowList(cuselWrap);
        }
                
        if($.browser.opera) return false; /* §ã§á§Ö§è§Ú§Ñ§Ý§î§ß§à §Õ§Ý§ñ §à§á§Ö§â§Ñ, §é§ä§à§Ò §á§â§Ú §ß§Ñ§Ø§Ñ§ä§Ú§Ú§Ú §ß§Ñ §Ü§Ý§Ñ§Ó§Ú§ê§Ú §ß§Ö §á§â§à§Ü§â§å§é§Ú§Ó§Ñ§Ý§à§ã§î §à§Ü§ß§à §Ò§â§Ñ§å§Ù§Ö§â§Ñ */

});

/*
        §æ§å§ß§Ü§è§Ú§ñ §à§ä§Ò§à§â§Ñ §á§à §ß§Ñ§Ø§Ñ§ä§í§Þ §ã§Ú§Þ§Ó§à§Ý§Ñ§Þ (§à§ä Alexey Choporov)
        §à§ä§Ò§à§â §Ú§Õ§Ö§ä §á§à§Ü§Ñ §á§Ñ§å§Ù§Ñ §Þ§Ö§Ø§Õ§å §ß§Ñ§Ø§Ñ§ä§Ú§ñ§Þ§Ú §ã§Ú§Ó§à§Ý§à§Ó §ß§Ö §Ò§å§Õ§Ö§ä §Ò§à§Ý§î§ê§Ö 0.5 §ã§Ö§Ü
        keypress §ß§å§Ø§Ö§ß §Õ§Ý§ñ §à§ä§Ý§à§Ó§Ñ §ã§Ú§Þ§Ó§à§Ý§Ñ §ß§Ñ§Ø§Ñ§ä§à§Û §Ü§Ý§Ñ§Ó§Ú§ê
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
                        
                        /* §á§â§à§Ü§â§å§é§Ú§Ó§Ñ§Ö§Þ §Ü §ä§Ö§Ü§å§ë§Ö§Þ§å §à§á§ä§Ú§à§ß§å */
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
                §å§ã§ä§Ñ§ß§Ñ§Ý§Ú§Ó§Ñ§Ö§Þ §Ó§í§ã§à§ä§å §Ó§í§á§Ñ§Õ§Ñ§ð§ë§Ú§ç §ã§á§Ú§ã§Ü§à§Ó §à§ã§ß§à§Ó§í§Ó§Ñ§ñ§ã§î §ß§Ñ §é§Ú§ã§Ý§Ö §Ó§Ú§Õ§Ú§Þ§í§ç §á§à§Ù§Ú§è§Ú§Û §Ú §Ó§í§ã§à§ä§í §à§Õ§ß§à§Û §á§à§Ù§Ú§è§Ú§Ú
                §á§â§Ú §é§Ö§Þ §ä§à§Ý§î§Ü§à §ä§Ö§Þ, §å §Ü§à§ä§à§â§í§ç §é§Ú§ã§Ý§à §à§á§ä§Ú§à§ß§à§Ó §Ò§à§Ý§î§ê§Ö §é§Ú§ã§Ý§Ñ §Ù§Ñ§Õ§Ñ§ß§ß§à§Ô§à §é§Ú§ã§Ý§Ñ §Ó§Ú§Õ§Ú§Þ§í§ç
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
        §æ§å§Ü§è§Ú§ñ §â§Ñ§ã§Ü§â§í§ä§Ú§ñ/§ã§Ü§â§í§ä§Ú§ñ §ã§á§Ú§ã§Ü§Ñ 
*/
function cuselShowList(cuselWrap)
{
        var cuselMain = cuselWrap.parent(".cusel");
        
        /* §Ö§ã§Ý§Ú §Ó§í§á§Ñ§Õ§Ñ§ð§ë§Ö§Ö §Þ§Ö§ß§ð §ã§Ü§â§í§ä§à - §á§à§Ü§Ñ§Ù§í§Ó§Ñ§Ö§Þ */
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
                                
                /* §á§â§à§Ü§â§å§é§Ú§Ó§Ñ§Ö§Þ §Ü §ä§Ö§Ü§å§ë§Ö§Þ§å §à§á§ä§Ú§à§ß§å */
                cuselScrollToCurent(cuselWrap);
                }
                else
                {
                        cuselWrap.css("display","none");
                        cuselMain.removeClass("cuselOpen");
                }
}


/*
        §æ§å§ß§Ü§è§Ú§ñ §á§â§à§Ü§â§å§ä§Ü§Ú §Ü §ä§Ö§Ü§å§ë§Ö§Þ§å §ï§Ý§Ö§Þ§Ö§ß§ä§å
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