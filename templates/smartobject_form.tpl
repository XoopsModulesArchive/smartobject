<!-- <a href='#' onclick='new Effect.Combo("caption_row");'>Click here to view full form</a> //-->

<{$form.javascript}>
<form name="<{$form.name}>" action="<{$form.action}>" method="<{$form.method}>" <{$form.extra}>>
    <table style="width: 100%;" class="outer" cellspacing="1">
        <tr>
            <th colspan="2"><{$form.title}></th>
        </tr>
        <!-- start of form elements loop -->
        <{foreach item=element from=$form.elements}>
            <{if $element.hidden != true}>
                <tr id="<{$element.name}>_row">
                    <td class="head"><{$element.caption}>
                        <{if $element.description}>
                            <div style="font-weight: normal;"><{$element.description}></div>
                        <{/if}>
                    </td>
                    <td class="<{cycle values="even,odd"}>"><{$element.body}></td>
                </tr>
            <{else}>
                <{$element.body}>
            <{/if}>
        <{/foreach}>
        <!-- end of form elements loop -->
    </table>
</form>

<!--
<script type="text/javascript">
    <!--
    hideElement("caption_row");
    //-->
</script>
//-->
