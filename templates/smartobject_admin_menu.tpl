<style type='text/css'>
    #buttontop {
        float: left;
        width: 100%;
        background: #e7e7e7;
        line-height: normal;
        margin: 0;
    }

    #buttonbar {
        float: left;
        width: 100%;
        background: #e7e7e7 url('<{$xoops_url}>/modules/smartobject/assets/images/bg.gif') repeat-x left bottom;
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

    #submenuswrap {
        float: left;
        background: #EFEFEF;
        width: 100%;
        border-bottom: 1px solid #000000;
    }

    #submenus {
        padding: 4px 0px 4px 8px;
        float: left;
        font-size: 92%;
    }

    .subitem {
        float: left;
        padding-right: 10px;
    }

    #currentsubitem {
        float: left;
        padding-right: 10px;
        font-weight: bold;
    }

    #wrap {
        width: 100%;
        border-top: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
        float: left;
        margin-bottom: 15px;
    }
</style>

<div id="wrap">
    <div id="buttontop">
        <div style="width: 100%; padding: 0;" cellspacing="0">
            <div style="font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;float:left;">
                <{foreach from=$headermenu key=itemnum item=menuitem}>
                    <a class="nobutton" href="<{$menuitem.link}>"><{$menuitem.title}></a>
                    <{if ($itemnum + 1) != $headermenucount}>
                        |
                    <{/if}>
                <{/foreach}>
            </div>
            <div style="font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;float:right;">
                <{$breadcrumb}>
            </div>
        </div>
    </div>
    <div id="buttonbar">
        <ul>
            <{foreach from=$adminmenu key=itemnum item=menuitem}>
                <{if $itemnum==$current}>
                    <li id="current">
                        <{else}>
                    <li>
                <{/if}>
                <a href="../<{$menuitem.link}>"><span><{$menuitem.title}></span></a>
                </li>
            <{/foreach}>
        </ul>
    </div>
    <{if $submenus}>
    <div id="submenuswrap">
        <div id="submenus">
            <{foreach from=$submenus key=itemnum item=submenuitem}>
            <{if $itemnum==$currentsub}>
            <div id="currentsubitem"><{$submenuitem.title}>
                <{else}>
                <div class="subitem"><a href="<{$submenuitem.link}>"><{$submenuitem.title}></a>
                    <{/if}>
                    <{if ($itemnum + 1) != $submenuscount}>
                        |
                    <{/if}>
                </div>
                <{/foreach}>
            </div>
        </div>
        <{/if}>
    </div> <!-- end wrap -->
    <br style="clear: both;"/>
