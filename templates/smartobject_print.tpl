<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>"/>
    <meta http-equiv="content-language" content="<{$xoops_langcode}>"/>
    <meta name="robots" content="<{$xoops_meta_robots}>"/>
    <meta name="keywords" content="<{$xoops_meta_keywords}>"/>
    <meta name="description" content="<{$xoops_meta_description}>"/>
    <meta name="rating" content="<{$xoops_meta_rating}>"/>
    <meta name="author" content="<{$xoops_meta_author}>"/>
    <meta name="copyright" content="<{$xoops_meta_copyright}>"/>
    <meta name="generator" content="XOOPS"/>
    <title><{$smartobject_print_pageTitle}></title>

    <link rel="stylesheet" media="all" href="<{$xoops_url}>/modules/system/style.css" type="text/css">
    <link rel="stylesheet" media="all" href="<{$xoops_url}>/modules/smartobject/assets/css/print.css" type="text/css">

    <style>
        #container {
            width: <{$smartobject_print_width}>px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>

<body onload="self.print();">
<div id="container">
    <{if $smartobject_print_title}>
        <h2><{$smartobject_print_title}></h2>
    <{/if}>
    <{if $smartobject_print_dsc}>
        <h3><{$smartobject_print_dsc}></h3>
    <{/if}>

    <div id="smartobject_printer_friendly_content"><{$smartobject_print_content}></div>

    <div id="print_close"><a href="javascript:window.close();">Close this window</a></div>
</div>
</body>
</html>
