<?php

/* master.html.twig */
class __TwigTemplate_87a86df006dd2202e643b264156f3e573238b8b43873d898258852522591c01a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'headextra' => array($this, 'block_headextra'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <link href=\"/styles.css\" rel=\"stylesheet\">
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
        <meta charset=\"UTF-8\">
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 8
        $this->displayBlock('headextra', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
        <div id=\"centeredContent\">
            ";
        // line 12
        if ((isset($context["userSession"]) ? $context["userSession"] : null)) {
            // line 13
            echo "                <p>You're logged in as ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userSession"]) ? $context["userSession"] : null), "name", array()), "html", null, true);
            echo ".
                    You may <a href=\"/logout\">logout</a></p>
            ";
        } else {
            // line 16
            echo "                <p>You're not logged in. You may <a href=\"/register\">Register</a>
                or <a href=\"/login\">Login</a>.</p>
            ";
        }
        // line 19
        echo "                
            ";
        // line 20
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "        </div>
    </body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Default";
    }

    // line 8
    public function block_headextra($context, array $blocks = array())
    {
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 20,  73 => 8,  67 => 7,  60 => 21,  58 => 20,  55 => 19,  50 => 16,  43 => 13,  41 => 12,  36 => 9,  34 => 8,  30 => 7,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <link href=\"/styles.css\" rel=\"stylesheet\">
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Default{% endblock %}</title>
        {% block headextra %}{% endblock %}
    </head>
    <body>
        <div id=\"centeredContent\">
            {% if userSession %}
                <p>You're logged in as {{ userSession.name }}.
                    You may <a href=\"/logout\">logout</a></p>
            {% else %}
                <p>You're not logged in. You may <a href=\"/register\">Register</a>
                or <a href=\"/login\">Login</a>.</p>
            {% endif %}
                
            {% block content %}{% endblock %}
        </div>
    </body>
</html>
", "master.html.twig", "C:\\xampp\\htdocs\\ipd\\slimtodo\\templates\\master.html.twig");
    }
}
