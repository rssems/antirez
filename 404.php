<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<!--[if ie]>
		<meta content='IE=8' http-equiv='X-UA-Compatible'/>
	<![endif]-->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>404 - Not Found</title>
</head>
<body>
  <style type="text/css">
    body { 
      text-align:center;
      font-family:helvetica,arial;
      font-size:22px;
      color:#888;
      margin:20px
    }
    #c {
      margin:0 auto;
      width:500px;
      text-align:left
    }
  </style>
  <h2><?php $websitename = get_bloginfo('name'); echo " ".$websitename ?> 
 doesn’t know this ditty.</h2>
  <img src="<?php bloginfo('template_directory'); ?>/images/404.png">
  <div id="c">
    Try this:
    <pre>get '<?php echo "".$website.$_SERVER['REQUEST_URI']; ?>' do
        "Hello World"
        end
    </pre>
  </div>
</body>
</html>