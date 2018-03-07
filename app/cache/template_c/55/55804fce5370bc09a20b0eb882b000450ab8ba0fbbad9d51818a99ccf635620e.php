<?php

/* index.html */
class __TwigTemplate_9cd2c3a69977b53cdb2c978a0fae06f8421341b2b610a866317521a4df28816a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"zh-CN\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
    <h1>";
        // line 8
        echo twig_escape_filter($this->env, ($context["data"] ?? null), "html", null, true);
        echo "</h1>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"zh-CN\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
    <h1>{{data}}</h1>
</body>
</html>", "index.html", "E:\\Workspace\\Person\\SmarsPHP\\app\\views\\index.html");
    }
}
