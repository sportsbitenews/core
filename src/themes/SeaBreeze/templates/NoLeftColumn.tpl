<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" lang="{lang}" dir="{langdirection}">
    <head>{include file="includes/head.tpl"}</head>
    <body class="noleftcol">
        {include file="includes/userheader.tpl"}
        <div id="pagewidth">
            <div id="wrapper" class="z-clearfix">
                <div id="maincol">
                    <div id="box_content">{$maincontent}</div>
                </div>
                <div id="rightcol">{blockposition name=right}</div>
            </div>
        </div>
        {include file="includes/footer.tpl"}
    </body>
</html>
