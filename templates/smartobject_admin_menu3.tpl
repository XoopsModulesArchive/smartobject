<style type='text/css'>
    #buttontop {
        float: left;
        width: 100%;
        background: #e7e7e7;
        font-size: 93%;
        line-height: normal;
        margin: 0px;
    }

    #buttonbar {
        float: left;
        width: 100%;
        background: #e7e7e7 url('<{$xoops_url}>/modules/smartobject/assets/images/bg.gif') repeat-x left bottom;
        font-size: 93%;
        line-height: normal;
    }

    #buttonbar ul {
        margin: 15px 0 0;
        padding: 10px 10px 0;
        list-style: none;
    }

    #buttonbar li {
        display: inline;
        margin: 0;
        padding: 0;
    }

    #buttonbar a {
        float: left;
        background: url('<{$xoops_url}>/modules/smartobject/assets/images/left_both.gif') no-repeat left top;
        margin: 0;
        padding: 0 0 0 9px;
        border-bottom: 1px solid #000;
        text-decoration: none;
    }

    #buttonbar a span {
        float: left;
        display: block;
        background: url('<{$xoops_url}>/modules/smartobject/assets/images/right_both.gif') no-repeat right top;
        padding: 5px 15px 4px 6px;
        font-weight: bold;
        color: #765;
    }

    /* Commented Backslash Hack hides rule from IE5-Mac \*/
    #buttonbar a span {
        float: none;
    }

    /* End IE5-Mac hack */
    #buttonbar a:hover span {
        color: #333;
    }

    #buttonbar #current a {
        background-position: 0 -150px;
        border-width: 0;
    }

    #buttonbar #current a span {
        background-position: 100% -150px;
        padding-bottom: 5px;
        color: #333;
    }

    #buttonbar a:hover {
        background-position: 0% -150px;
    }

    #buttonbar a:hover span {
        background-position: 100% -150px;
    }

    #submenus {
        padding-right: 0px;
        margin-left: 0px;
        padding-left: 0px;
        float: left;
        text-align: left;
        width: 100%;
    }

    .subitem {
        float: left;
        height: 18px;
        vertical-align: middle;
    }

    #mainwrap {
        width: 100%;
        float: left;
        margin-bottom: 10px;
        border: 1px solid #;
    }

    #mainbuttons {
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        border-top: 1px solid #000;
        float: left;
        margin-left: 0px;
    }

    #submenuswraper {
        border-left: 1px solid grey;
        border-right: 1px solid grey;
        border-bottom: 1px solid grey;
        float: left;
        width: 100%;
    }
</style>

<div id="mainwrap">
    <div id="mainbuttons">
        <div id="buttontop">
            <div style="width: 100%; padding: 0;" cellspacing="0">
                <div
                        style="font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;float:left;">
                    <{foreach from=$headermenu key=itemnum item=menuitem}>
                        <a
                                class="nobutton" href="<{$menuitem.link}>"><{$menuitem.title}></a>
                        <{if
                        ($itemnum + 1) != $headermenucount}> | <{/if}> <{/foreach}></div>
                <div
                        style="font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;float:right;">
                    <{$breadcrumb}></div>
            </div>
        </div>
        <div id="buttonbar">
            <ul>
                <{foreach from=$adminmenu key=itemnum item=menuitem}> <{if
                $itemnum==$current}>
                    <li id="current"><{else}>
                    <li><{/if}>
                    <a href="../<{$menuitem.link}>"><span><{$menuitem.title}></span></a>
                    </li>
                <{/foreach}>
            </ul>
        </div>
    </div>
    <!-- end mainbuttons --> <{if $submenus}>
        <div id="submenuswraper">
            <div id="submenus"><{foreach from=$submenus key=itemnum
                item=submenuitem}>
                    <div class="subitem"><a href="<{$submenuitem.link}>"><{$submenuitem.title}></a></div>
                <{/foreach}></div>
        </div>
    <{/if}></div>
<!-- end mainwrap -->
<br style="clear: both;"/>
